<?php

namespace App\Http\Model\Modules\ManningLevels;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class ManningLevels_Model extends Model {

	

	public function getRegions($regionId = null){
		$modArr = null;
		$value1=array('id_rgs','name_rgs');
		if($regionId == null){
			$mod1= DB::table('regions_rgs')->select($value1)->orderBy('name_rgs', 'asc')->get();
		}else{
			$mod1= DB::table('regions_rgs')->select($value1)->where('id_rgs',$regionId)->orderBy('name_rgs', 'asc')->get();
		}
		
		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getOrganisations($orgId = null ){
		$modArr = null;
		$value1=array('id','name');
		if($orgId == null){
			$mod1= DB::table('organisation_org')->select($value1)->orderBy('name', 'asc')->get();
		}else{
			$mod1= DB::table('organisation_org')->select($value1)->whereIn('id',$orgId)->orderBy('name', 'asc')->get();
		}
		
		foreach ($mod1 as $key => $value) {
			$modArr["{$value->{$value1[0]}}"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getDrivers($pageNo = 1, $recPerPage = 10, $driverLPFilter = ''){
		$modArr = null; $i=0;
		$value1=array('id_usr','firstname_usr','middlename_usr','lastname_usr','lp_number');
		$mod1 = DB::table('users_usr')->select($value1)->where('level_usr','=',2);
		if($driverLPFilter != '' || $driverLPFilter != null){
			$mod1 = $mod1->where('firstname_usr','like',"%$driverLPFilter%")->orWhere('middlename_usr','like',"%$driverLPFilter%")->orWhere('lastname_usr','like',"%$driverLPFilter%")->orWhere('lp_number','like',"%$driverLPFilter%");
		}
		$mod1 = $mod1->orderBy('firstname_usr', 'asc')->paginate($recPerPage);
		$mod1->setPath('List/ManningLevels/page/load');
		//->skip( ($pageNo - 1) * $recPerPage)->take($recPerPage)->orderBy('firstname_usr', 'asc')->get();
		/*
		foreach ($mod1 as $key => $value) {
			$modArr[$i]['id'] = $value->{$value1[0]};
			$modArr[$i]['name'] = preg_replace("/ {2,}/", " ", ($value->{$value1[1]} . ' ' . $value->{$value1[2]} . ' ' . $value->{$value1[3]})); 
			$modArr[$i]['LP'] = $value->{$value1[4]};
			$i++;
		}
		*/
		return $mod1;
	}

	public function getManningLevels($driverID, $fromDate=null, $toDate=null){
		$modArr = null; $i=0;
		$value1=array('id','usr_id', 'date', 'mannig_lvl_day');
		$mod1= DB::table('manning_levels')->select($value1)->whereIn('usr_id', $driverID)->whereBetween('date', array($fromDate, $toDate))->orderBy('usr_id', 'asc')->orderBy('date', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$date = explode('-', $value->{$value1[2]});			
			$modArr["{$value->{$value1[1]}}"][$date[2]]['id'] = $value->{$value1[0]};
			$modArr["{$value->{$value1[1]}}"][$date[2]]['mannig_lvl_day'] = $value->{$value1[3]};
			
		}
		return $modArr;
	}

	public function saveMLQuickView($id, $value){
		$mod1 = DB::table('manning_levels')->where('id', $id)->update(['mannig_lvl_day' => $value]);
		//var_dump($mod1);
		return true;
	}

	public function getMLQuickView($id, $loc){

		$modArr = null; $i=0; //$returnFlag = 
		$modArr['flag'] = false;
		$value1=array('id','is_locked', 'locked_usr_id', 'locked_time');
		$value1=array('id','is_locked', 'locked_usr_id', 'locked_time');
		$user_id = Auth::user()->id_usr;
		//var_dump($user_info); exit;
		if($loc == 0){
			$mod1= DB::table('manning_levels')->select($value1)->where('id', $id)->where('is_locked',1)->where('locked_usr_id',$user_id)->get();
			if (count($mod1)) {
				$new_user_data = array("is_locked" => 0, "locked_usr_id" => null, "locked_time" => null);
			    $mod2 = DB::table('manning_levels')->where('id', $id)->update($new_user_data);
			    //$modArr['flag'] = true;
			}
		}else{
			$mod1= DB::table('manning_levels')->where('id', $id)->where('is_locked',0)->get(); //->select($value1)
			if (count($mod1)) {
				$new_user_data2 = array("is_locked" => 1, "locked_usr_id" => $user_id, "locked_time" => date('Y-m-d H:i:s'));
			    $mod2 = DB::table('manning_levels')->where('id', $id)->update($new_user_data2);
			    $modArr['flag'] = true;
			    $job_type = array('FTE C1', 'FTE C2');
			    $rate = array('Day','Days','Night','Nights','Tramping');
			    $usrValues = array('id_usr','firstname_usr','middlename_usr','lastname_usr','LP_flag','preferred_depot');
			    $depotValues = array('id','name');
			    foreach ($mod1 as $key => $value) {			    	
			    	$usr = DB::table('users_usr')->select($usrValues)->where('level_usr','=',2)->where('id_usr','=',$value->usr_id)->orderBy('firstname_usr', 'asc')->get();
			    	$depot = $this->getOrganisations(array($value->depot_for_day , $usr[0]->preferred_depot ));
			    	$reg = $this->getRegions($value->region);
			    	$data['id'] = $value->id;
			    	$data['full_name'] = preg_replace("/ {2,}/", " ", ($usr[0]->{$usrValues[1]} . ' ' . $usr[0]->{$usrValues[2]} . ' ' . $usr[0]->{$usrValues[3]}));
			    	$data['start_time'] = $value->start_time;
			    	$data['job_type'] = $job_type[$value->Job_type];
			    	$data['rate'] = $rate[$value->rate_for_day];
			    	//var_dump($depot);
			    	$data['depot'] = "{$value->depot_for_day}" ; //$depot["'$value->depot_for_day'"];
			    	$data['preffered_depot'] = $depot["{$usr[0]->preferred_depot}"];
			    	$data['region'] = $reg["'$value->region'"];
			    	$data['shift_pattern'] = $value->shift_pattern_for_day;
			    	$data['timesheet'] = $value->is_timesheet;
			    	$data['self_bill'] = $value->is_self_bill;
			    	$data['invoiced'] = $value->is_invoiced;
			    }
			    $modArr['data'] = $data;
			}
		}
		//$mod1= DB::table('manning_levels')->select($value1)->whereIn('usr_id', $driverID)->whereBetween('date', array($fromDate, $toDate))->orderBy('usr_id', 'asc')->orderBy('date', 'asc')->get();

		return $modArr;
	}
}