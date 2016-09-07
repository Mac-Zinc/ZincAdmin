<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\CRM\CRM_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Http\Views;
use Response;

class CRM extends Controller{
	
	protected $layout = 'modules.crm.list';
	protected $layout2 = 'modules.crm.form';
	
	var $CRM_Model;

	public function __construct(){
		$this->CRM_Model = new CRM_Model;
	}

	public function getCRMForm(Request $request, $id = null){
		if(is_null($id)){ $id = -1; }				
		$sections = $this->CRM_Model->getSections(1);
		$gridSections = $this->CRM_Model->getSections(1,true);
		$moduleFields = $this->CRM_Model->getFields(1,false,$id);
		$breadcrums = $this->getBreadCrums(1,true);
		
		return view($this->layout2, compact('breadcrums','sections','gridSections','moduleFields'));
	}

	public function getBreadCrums($m_id, $bool = false){
		$data['Page_title'] = 'CRM';
		$data['Page_title_info'] = 'view, edit and manage profiles';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'CRM';
		$data['Breadcrums'][1]['url'] = '/List/CRM';
		if($bool){
			$data['Breadcrums'][2]['title'] = 'Edit';
			if( $this->CRM_Model->getAddButtonStatus() ){ 
				$data['Breadcrums'][2]['url'] = '/Form/CRM';
			}			
		}
		return $data;
	}

	public function getCRMList(){
		$breadcrums = $this->getBreadCrums(1);
		$table = $this->CRM_Model->getCRMRows();
		$regions = $this->CRM_Model->getRegions();
		$organisation = $this->CRM_Model->getOrganisations();
		$venues = $this->CRM_Model->getVenues();
		return view($this->layout, compact('breadcrums','table','regions','organisation','venues'));
	}

	public function listRowsAjax(Request $request){
		return $this->CRM_Model->getCRMRowsAjax($request);
	}

	public function saveCRMForm(Request $request){
		$status = $this->CRM_Model->saveForm($request , 1, false); // here 1 is module id

		if($status){
			$data['status']=1;
		}else{
			$data['status']=0;	
		}
		$data['url'] = 'List/CRM';
		return Response::json($data);
		//return Redirect::to('List/');
	}
	
	public function gridSave(Request $request, $fieldID, $gPKey, $ref_id){  // gPKey : Grid Primary Key, ref_id : form pKey OR random number ,
		$status = $this->CRM_Model->gridSave($request , $fieldID, $gPKey, $ref_id);
		if($status->returnFlag){
			$data['status']=1;
			$data['returnInfo'] = $status->returnData;
			$data['query'] = $status->last_query;
		}else{
			$data['status']=0;	
		}
		return Response::json($data);
	}
}