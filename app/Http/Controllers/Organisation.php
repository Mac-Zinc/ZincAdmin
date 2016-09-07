<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\Organisation\Organisation_Model;
use App\Http\Model\Template_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Http\Views;
use Response;

class Organisation extends Controller{

	protected $layout = 'modules.Organisation.list';
	protected $layout2 = 'modules.Organisation.form';
	var $Organisation_Model,$Template_Model;

	public function __construct(){
			$this->Organisation_Model=new Organisation_Model;							
	}

	public function getOrganisationList(){
		$breadcrums = $this->getBreadCrums(7);
		$table = $this->Organisation_Model->getOrganizationRows();

		return view($this->layout, compact('breadcrums','table'));
		
	}

	public function getOrganisationForm(Request $request, $id = null){	
		if(is_null($id)){ $id = -1; }	
		$sections = $this->Organisation_Model->getSections(7);
		$gridSections = $this->Organisation_Model->getSections(7,true);
		$moduleFields = $this->Organisation_Model->getFields(7,false,$id);
		$breadcrums = $this->getBreadCrums(7,true);		
		return view($this->layout2, compact('breadcrums','sections','gridSections','moduleFields'));		
	}

	public function getBreadCrums($m_id, $bool = false){
		$data['Page_title'] = 'Organisation ';
		$data['Page_title_info'] = 'Overview';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Organisation';
		$data['Breadcrums'][1]['url'] = '/List/Organisation';
		if($bool){
			$data['Breadcrums'][2]['title'] = 'Edit';
			$data['Breadcrums'][2]['url'] = '/Form/Organisation';
		}
		

		return $data;
	}

	public function saveOrganisationForm(Request $request){
		$status = $this->Organisation_Model->saveForm($request , 7, false);

		if($status){
			$data['status']=1;
		}else{
			$data['status']=0;	
		}
		$data['url'] = 'List/Organisation';
		return Response::json($data);
		//return Redirect::to('List/');
	}

	public function listRowsAjax(Request $request){
		return $this->Organisation_Model->getOrganisationRowsAjax($request);
	}

	public function getRelatedOrgs($org_lvl, $id, $rtn_org_type){
		return $this->Organisation_Model->getRelatedOrgs($org_lvl, $id, $rtn_org_type);
	}
}

?>