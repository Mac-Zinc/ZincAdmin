<?php

namespace App\Http\Model\Modules\Contracts;
use Illuminate\Database\Eloquent\Model;
use App\Http\Model\NewModel;
use DB;
use Auth;
class Contracts_Model extends NewModel {

	protected $ListHeaders =	array('ID', 'Contract Name', 'Actions', 'Delete');
	protected $ListFields =		array('id','name');
	protected $table = 'contracts_info';
	protected $primaryKey = 'id';

	public function daysOfWeek($m_id){
		$timestamp = strtotime('next Sunday');
		$days = array();
		for ($i = 0; $i < 7; $i++) {
		    $days[] = strftime('%A', $timestamp);
		    $timestamp = strtotime('+1 day', $timestamp);
		}

		return $days;
	}

	public function getContractRows(){
		$data['table_title'] = 'Contracts List Page';
		$data['table_head']= $this->ListHeaders;
		$data['add_form_url'] = '/Form/Contract';
		$data['search_by_placeholder'] = 'Search by Contract Name';		
		return $data;
	}

	public function getContractRowsAjax($request){
		
		$iDisplayLength = intval($request['length']);
		 
		$iDisplayStart = intval($request['start']);
		$sEcho = intval($request['draw']);

		$orderColumn = 'name'; $orderDirection = 'ASC'; // default column & direction
		if(isset($request['search_by'])){ $search_by = $request['search_by']; } else { $search_by = null; }
		if(isset($request['order'])){
			$orderDirection = $request['order'][0]['dir']; // Set order direction
			switch($request['order'][0]['column']){
				case 0:
					$orderColumn = 'id';
					break;
				case 0:
					$orderColumn = 'name';
					break;	
				default:
					# code...
					break;	
			}		
		}
		$iTotalRecords = DB::table($this->table);
		$mod= DB::table($this->table)->select($this->ListFields);

		if($search_by != '' || $search_by != null){
			$iTotalRecords = $iTotalRecords->where('name','like',"%$search_by%");
			$mod = $mod->where('name','like',"%$search_by%");
		}

		$iTotalRecords = $iTotalRecords->count();
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		
		$mod = $mod->orderBy($orderColumn, $orderDirection)->skip($iDisplayStart)->take($iDisplayLength)->get();
		foreach ($mod as $j=>$m){
			$col = array();
			$col[] = $m->{$this->ListFields[0]};  
			$col[] = $m->{$this->ListFields[1]};	
			$col[] = '<a href="/Form/Contract/'.$m->{$this->ListFields[0]}.'" class="btn btn-sm blue btn-outline menueClickHijack"><i class="fa fa-search"></i> View</a>';	
			$col[] = '<a href="javascript:;">Delete</a>';
			$records["data"][] = $col;
		}

		
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		  
		return json_encode($records);
	}
}