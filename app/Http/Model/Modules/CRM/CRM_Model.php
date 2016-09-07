<?php

namespace App\Http\Model\Modules\CRM;
use Illuminate\Database\Eloquent\Model;
use App\Http\Model\NewModel;
use DB;
use Auth;
class CRM_Model extends NewModel {
	protected $ListHeaders =	array('Type', 'Full Name', 'LP Number', 'Phone Number', 'Mobile Number', 'Email address', 'Class', 'Actions');
	protected $ListFields =		array('level_usr','id_usr','firstname_usr','lp_number','email_usr','telephone_usr','mobile_usr','middlename_usr','lastname_usr','driver_class');
	protected $table = 'users_usr';
	protected $primaryKey = 'id_usr';
	protected $accessLevelDetails = array();

	public function __construct(){
		$this->accessLevelDetails = $this->getAccessLevels(1);
	}	
	public function getCRMRows(){
		$data['table_title'] = 'All Users';		
		$data['table_head']= $this->ListHeaders;
		if( $this->accessLevelDetails['addButton'] ){
			$data['add_form_url'] = '/Form/CRM';
		}		
		$data['search_by_placeholder'] = 'Search by Name or LP Number';		
		return $data;
	}
	public function getAddButtonStatus(){
		return $this->accessLevelDetails['addButton'];
	}
	public function getCRMRowsAjax($request){
		
		$iDisplayLength = intval($request['length']);
		
		$iDisplayStart = intval($request['start']);
		$sEcho = intval($request['draw']);
		$role = array();
		$driverClass = array();
		$orderColumn = 'firstname_usr'; $orderDirection = 'ASC'; // default column & direction
		if(isset($request['search_by'])){ $driverLPFilter = $request['search_by']; } else { $driverLPFilter = null; }
		if(isset($request['order'])){
			$orderDirection = $request['order'][0]['dir']; // Set order direction
			switch($request['order'][0]['column']){
				case 0:
					$orderColumn = 'level_usr';
					break;
				case 1:
					$orderColumn = 'firstname_usr';
					break;
				case 2:
					$orderColumn = 'lp_number';
					break;
				case 3:
					$orderColumn = 'telephone_usr';
					break;
				case 4:
					$orderColumn = 'mobile_usr';
					break;
				case 5:
					$orderColumn = 'email_usr';
					break;
				case 6:
					$orderColumn = 'driver_class';
					break;						
				default:
					# code...
					break;	
			}		
		}
		$iTotalRecords = DB::table($this->table);
		$mod= DB::table($this->table)->select($this->ListFields);

		if( isset($this->accessLevelDetails['listPageFilter']) ){
			$iTotalRecords = $iTotalRecords->whereRaw($this->accessLevelDetails['listPageFilter']);
			$mod= $mod->whereRaw($this->accessLevelDetails['listPageFilter']);
		}
		if($driverLPFilter != '' || $driverLPFilter != null){
			$iTotalRecords = $iTotalRecords->where('firstname_usr','like',"%$driverLPFilter%")->orWhere('middlename_usr','like',"%$driverLPFilter%")->orWhere('lastname_usr','like',"%$driverLPFilter%")->orWhere('lp_number','like',"%$driverLPFilter%");
			$mod = $mod->where('firstname_usr','like',"%$driverLPFilter%")->orWhere('middlename_usr','like',"%$driverLPFilter%")->orWhere('lastname_usr','like',"%$driverLPFilter%")->orWhere('lp_number','like',"%$driverLPFilter%");
		}
		$iTotalRecords = $iTotalRecords->count();
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		
		$mod = $mod->orderBy($orderColumn, $orderDirection)->skip($iDisplayStart)->take($iDisplayLength)->get();

		$mod2 = DB::table('roles_rls')->select('role_id','role_name')->get();
		foreach ($mod2 as $j=>$m){
			$role[$m->role_id] = $m->role_name;
		}
		$mod2 = DB::table('static_dropdown_field_values')->select('value','text')->where('field_id','63')->get();
		foreach ($mod2 as $j=>$m){
			$driverClass[$m->value] = $m->text;
		}
		$driverClass[0] = 'N/A';
		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		
		foreach ($mod as $j=>$m){
			$ty = $m->{$this->ListFields[0]};  
			$ph = $m->{$this->ListFields[5]};
			$mb = $m->{$this->ListFields[6]};
			$lp = $m->{$this->ListFields[3]};
			$fn = $m->{$this->ListFields[2]} . ' ' . $m->{$this->ListFields[7]} . ' ' . $m->{$this->ListFields[8]};
			$dc = $m->{$this->ListFields[9]};
			if( $ph == '' ){ $ph = 'N/A'; }			
			if( $mb == '' ){ $mb = 'N/A'; }
			if( $lp == '' ){ $lp = 'N/A'; }
			if ($ty == '' || is_null($ty) ) { $ty = 2;  } // this is a temp fix for `level_usr` null or blank
			if ( $dc == '' || is_null($dc) ) { $dc = 0; }
			$records["data"][] = array(           
              $role[$ty],
              $fn,
              $lp,
              $ph,
              $mb,
              $m->{$this->ListFields[4]},
              $driverClass[$dc],
              '<a href="/Form/CRM/'.$m->{$this->ListFields[1]}.'" class="btn btn-sm blue btn-outline menueClickHijack"><i class="fa fa-search"></i> View & Edit</a>',
           );
		}

		
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		  
		return json_encode($records);
	
	}
	

}
?>