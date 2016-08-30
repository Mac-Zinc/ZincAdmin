<?php

namespace App\Http\Model\Modules\DocumentsHub;
use Illuminate\Database\Eloquent\Model;
use App\Http\Model\NewModel;
use DB;
use Auth;
class DocumentsHub_Model extends NewModel {
	protected $ListHeaders =	array('Doc Id', 'File Name', 'Module', 'File Type', 'Owner', 'Actions');
	protected $ListFields =		array('doc_id','originalFileName','modID','modPKey','user_id');
	protected $table = 'documents_hub';
	protected $primaryKey = 'doc_id';

	public function getDocumentsHubRows(){
		$data['table_title'] = 'All Users';		
		$data['table_head']= $this->ListHeaders;		
		return $data;
	}

	public function getDocumentsHubRowsAjax($request){
		$iTotalRecords = DB::table($this->table)->count();
		$iDisplayLength = intval($request['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($request['start']);
		$sEcho = intval($request['draw']);
		$mod= DB::table($this->table)->select($this->ListFields)->skip($iDisplayStart)->take($iDisplayLength)->get();
		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$modules = array();
		$mod2 = DB::table('modules_mds')->select('m_id','mod_title')->get();
		foreach ($mod2 as $j=>$m){
			$modules[$m->m_id] = $m->mod_title;
		}
		$drivers = array();
		$mod2 = DB::table('users_usr')->select('id_usr','firstname_usr')->get();
		foreach ($mod2 as $j=>$m){
			$drivers[$m->id_usr] = $m->firstname_usr;
		}

		foreach ($mod as $j=>$m){
			$col1 = $m->{$this->ListFields[0]};  
			$col2 = $m->{$this->ListFields[1]};
			$col3 = $modules[$m->{$this->ListFields[2]}];
			$col4 = '';
			
			if( $m->{$this->ListFields[2]} == 1 ){
				$col5 = $drivers[$m->{$this->ListFields[3]}];
			}else{
				//$col5 = 'Not Resolved Yet';
			}
			
			$col6 = '<a href="javascript:void(0);" class="btn btn-sm blue btn-outline "><i class="fa fa-search"></i> Download</a> <a href="javascript:void(0);" class="btn btn-sm blue btn-outline "><i class="fa fa-search"></i> Delete</a>';
			$records["data"][] = array(           
              $col1,
              $col2,
              $col3,
              $col4,
              $col5,
              $col6,
           );
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		  
		return json_encode($records);

		
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		  
		return json_encode($records);
	
	}
}