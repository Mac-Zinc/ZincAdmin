<?php

namespace App\Http\Model\Modules\Organisation;
use Illuminate\Database\Eloquent\Model;
use App\Http\Model\NewModel;
use DB;
use Auth;
class Organisation_Model extends NewModel {
	protected $ListHeaders =	array('&nbsp;','Name','Type','Region', 'Address', 'Town', 'Post Code', 'Email', 'Phone', 'Operating Hrs', 'Actions');
	protected $ListFields =		array('id','name','org_lvl','org_lvl','address','county','postcode','email','telephone','operating_time_from','operating_time_to');
	protected $table = 'organisation_org';
	protected $primaryKey = 'id';
	public function getOrganizationRows(){

		$data['table_title'] = 'Organisation List Page';
		$data['table_head']= $this->ListHeaders;
		$data['add_form_url'] = '/Form/Organisation';
		$data['search_by_placeholder'] = 'Search by Name';		
		return $data;
	}

	public function getOrganisationRowsAjax($request){

		$iDisplayLength = intval($request['length']);
				
		$iDisplayStart = intval($request['start']);
		$sEcho = intval($request['draw']);
		$orgType = array();
		$orderColumn = $this->ListFields[1]; $orderDirection = 'ASC'; // default column & direction
		if(isset($request['search_by'])){ $search_by = $request['search_by']; } else { $search_by = null; }
		if(isset($request['order'])){
			$orderDirection = $request['order'][0]['dir']; // Set order direction
			$orderColumn = $this->ListFields[$request['order'][0]['column']];
			/*switch($request['order'][0]['column']){
				case 1:
					$orderColumn = 'name';
					break;
				case 2:
					$orderColumn = 'org_lvl';
					break;
				case 2:
					$orderColumn = 'lp_number';
					break;
				case 3:
					$orderColumn = 'address';
					break;
				case 4:
					$orderColumn = 'county';
					break;
				case 5:
					$orderColumn = 'postcode';
					break;
				case 6:
					$orderColumn = 'email';
					break;	
				case 7:
					$orderColumn = 'operating_time_from';
					break;						
				default:
					# code...
					break;	
			}*/		
		}
		$iTotalRecords = DB::table($this->table);
		$mod= DB::table($this->table)->select($this->ListFields);
		if($search_by != '' || $search_by != null){
			//$iTotalRecords = $iTotalRecords->where('firstname_usr','like',"%$driverLPFilter%")->orWhere('middlename_usr','like',"%$driverLPFilter%")->orWhere('lastname_usr','like',"%$driverLPFilter%")->orWhere('lp_number','like',"%$driverLPFilter%");
			//$mod = $mod->where('firstname_usr','like',"%$driverLPFilter%")->orWhere('middlename_usr','like',"%$driverLPFilter%")->orWhere('lastname_usr','like',"%$driverLPFilter%")->orWhere('lp_number','like',"%$driverLPFilter%");
		}
		$iTotalRecords = $iTotalRecords->count();
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		
		$mod = $mod->orderBy($orderColumn, $orderDirection)->skip($iDisplayStart)->take($iDisplayLength)->get();

		$mod2 = DB::table('static_dropdown_field_values')->select('value','text')->where('field_id','120')->get();
		foreach ($mod2 as $j=>$m){
			$orgType[$m->value] = $m->text;
		}
		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		foreach ($mod as $j=>$m){
			$col = array();
			$col[] = "<input type='checkbox' value='{$m->{$this->ListFields[0]}}' />";	  
			$col[] = $m->{$this->ListFields[1]};
			$col[] = ($m->{$this->ListFields[2]} != '' || $m->{$this->ListFields[2]} != null ) ? $orgType[$m->{$this->ListFields[2]}] : 'N/A';
			$col[] = 'N/A'; //($m->{$this->ListFields[7]} != '') ? $m->{$this->ListFields[7]} : 'N/A';
			$col[] = $m->{$this->ListFields[4]};
			$col[] = $m->{$this->ListFields[5]};
			$col[] = $m->{$this->ListFields[6]};
			$col[] = ($m->{$this->ListFields[7]} != '') ? $m->{$this->ListFields[7]} : 'N/A';
			$col[] = ($m->{$this->ListFields[8]} != '') ? $m->{$this->ListFields[8]} : 'N/A';
			$col[] = $m->{$this->ListFields[9]} . "-" . $m->{$this->ListFields[10]};
			$col[] ='<a href="/Form/Organisation/'.$m->{$this->ListFields[0]}.'" class="btn btn-sm blue btn-outline menueClickHijack"><i class="fa fa-search"></i> View & Edit</a> <a href="/Delete/Organisation/'.$m->{$this->ListFields[0]}.'" class="btn btn-sm red btn-outline menueClickHijack"><i class="fa fa-unlink"></i> Delete </a>';
			
			$records["data"][] = $col;
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		  
		return json_encode($records);
	
	}

}
?>