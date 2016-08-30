<?php

namespace App\Http\Model\Modules\TimeSheet;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class TimeSheet_Model extends Model {

	protected $ListHeaders =	array('&nbsp;','LP Number','First Name','Last Name', 'Shift Days', 'Timesheets', 'Weekly Progress');
	protected $ListFields =		array('id_usr','lp_number','firstname_usr','lastname_usr');
	protected $table = 'timesheet_ts';
	protected $primaryKey = 'id';
	public function getTimeSheetRows($weekNo){

		$data['table_title'] = 'TimeSheet List Page';
		$data['table_head']= $this->ListHeaders;

		if(Auth::user()->level_usr == 2 ){
			$data['add_form_url'] = '/Form/TimeSheet/'.$weekNo;
		}
		

		$data['search_by_placeholder'] = 'Search by Name Or LP Number';		
		return $data;
	}

	public function getCurrentWeekTimeSheet($startNEndDate, $usr_id, $weekNo, $yearNo){

		$value1=array('id','shift_date','shift_start_time','shift_end_time','break', 'poa', 'night_out', 'expenses');
		$modArr = null;
		for($i=0;$i<7;$i++){
			$date = $startNEndDate[$i]['fullDate'];
			$insert = array('usr_id'=>$usr_id,'mod_id'=>3,'shift_date'=>$date,'week_no'=>$weekNo, 'year_no' => $yearNo,'created_by'=>Auth::user()->id_usr );
			$mod1= DB::table('timesheet_ts')->select($value1)->where('usr_id', $usr_id)->where('shift_date', $date)->where('is_active',1)->where('is_deleted',0)->get();
			if (count($mod1) == 0) {
				$id = DB::table('timesheet_ts')->insertGetId($insert);
				$mod1= DB::table('timesheet_ts')->select($value1)->where('usr_id', $usr_id)->where('shift_date', $date)->where('is_active',1)->where('is_deleted',0)->get();
			}

		$modArr[$mod1[0]->shift_date] = $mod1;
		}
		//var_dump($modArr);
		return $modArr;
	}

	public function saveWeeklyTimeSheet($data){
		$returnFlag = false;
		for($i=0;$i<7;$i++){
			parse_str($data[$i], $dataArray);
			$mod1 = DB::table('timesheet_ts')->where('id', $dataArray['id'])->update($dataArray); // ['break' => $dataArray['break']]
			//foreach($dataArray as $key -> $value){
				//$mod1->update(['break' => $dataArray['break']]);
			//}	
			
			
		}
		$returnFlag = true;
		return $returnFlag;
	}

	public function getTimeSheetRowsAjax($request){

		$iDisplayLength = intval($request['length']);
				
		$iDisplayStart = intval($request['start']);
		$sEcho = intval($request['draw']);
		
		$orderColumn = $this->ListFields[1]; $orderDirection = 'ASC'; // default column & direction
		if(isset($request['search_by'])){ $search_by = $request['search_by']; } else { $search_by = null; }
		if(isset($request['order'])){
			$orderDirection = $request['order'][0]['dir']; // Set order direction
			$orderColumn = $this->ListFields[$request['order'][0]['column']];				
		}
		$whereArray = array (
			'week_no' => $request['currentWeekNo'] ,
			'year_no' => $request['currentWeekYear']
			); 
		$iTotalRecords = DB::table('users_usr')->where('level_usr','2'); // here we need to get list of drivers

		$mod= DB::table('users_usr')->select($this->ListFields)->where('level_usr','2');
		
		if($search_by != '' || $search_by != null){
			$iTotalRecords = $iTotalRecords->where('firstname_usr','like',"%$search_by%")->orWhere('middlename_usr','like',"%$search_by%")->orWhere('lastname_usr','like',"%$search_by%")->orWhere('lp_number','like',"%$search_by%");
			$mod = $mod->where('firstname_usr','like',"%$search_by%")->orWhere('middlename_usr','like',"%$search_by%")->orWhere('lastname_usr','like',"%$search_by%")->orWhere('lp_number','like',"%$search_by%");
		}

		$iTotalRecords = $iTotalRecords->count();
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		
		$mod = $mod->orderBy($orderColumn, $orderDirection)->skip($iDisplayStart)->take($iDisplayLength)->get();
		/*
		$orgType = array();
		$mod2 = DB::table('static_dropdown_field_values')->select('value','text')->where('field_id','120')->get();
		foreach ($mod2 as $j=>$m){
			$orgType[$m->value] = $m->text;
		}
		*/		
		
		

		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		foreach ($mod as $j=>$m){

			//$mod2 = DB::table('manning_levels')->where($whereArray)->where('usr_id',$m->{$this->ListFields[0]})->whereNotIn('mannig_lvl_day',[3,5]);			
			$numberShiftsThisWeek = 6; //mod2->count();  // changed to 6 as that is the max days that can b entered. 
			$mod2 = DB::table('timesheet_ts')->where($whereArray)->where('usr_id',$m->{$this->ListFields[0]});
			$numberTimesheetsSubmittedThisWeek = $mod2->count();
			$percentage = ($numberTimesheetsSubmittedThisWeek / $numberShiftsThisWeek) * 100;
			$progressbarClass = 'progress-bar-success';
			if ( $numberTimesheetsSubmittedThisWeek > $numberShiftsThisWeek ) { $progressbarClass = 'progress-bar-danger'; }
			$col = array();
			$col[] = "<input type='checkbox' value='{$m->{$this->ListFields[0]}}' />";	  
			$col[] = $m->{$this->ListFields[1]};
			$col[] = $m->{$this->ListFields[2]};
			$col[] = $m->{$this->ListFields[3]};
			$col[] = $numberShiftsThisWeek; // number of shifts
			$col[] = $numberTimesheetsSubmittedThisWeek; // number of timesheet submitted this week 			
			$col[] = '<div class="progress"><div class="progress-bar ' . $progressbarClass . '" role="progressbar" aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $percentage . '%">' . $percentage . '%</div></div>'; 
			
			$records["data"][] = $col;
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		  
		return json_encode($records);
	
	}
}