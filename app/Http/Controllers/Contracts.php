<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\Contracts\Contracts_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Http\Views;
use Response;

class Contracts extends Controller{

	protected $layout = 'modules.contracts.wel';
	protected $layout2 = 'modules.contracts.list';
	var $Contracts_Model ;

	public function __construct(){
		$this->Contracts_Model = new Contracts_Model;
	}

	public function getContractForm(Request $request, $id = null){
		if(is_null($id)){ $id = -1; }		
		$sections = $this->Contracts_Model->getSections(5);
		$moduleFields = $this->Contracts_Model->getFields(5,false,$id);
		$breadcrums = $this->getBreadCrums(5,true);
		$days = $this->Contracts_Model->daysOfWeek(5);
		return view($this->layout, compact('sections','moduleFields','breadcrums','days'));
	}

	public function getBreadCrums($m_id, $bool = false){
		$data['Page_title'] = 'Contract Info - Edit';
		$data['Page_title_info'] = 'view edit and manage contracts';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Contracts Info';
		$data['Breadcrums'][1]['url'] = '/List/Contract';
		if($bool){
			$data['Breadcrums'][2]['title'] = 'Edit';
			$data['Breadcrums'][2]['url'] = '/Form/Contract';
		}
		return $data;
	}

	public function getContractList(){
		$breadcrums = $this->getBreadCrums(5);
		$table = $this->Contracts_Model->getContractRows();
		$regions = $this->Contracts_Model->getRegions();
		$organisation = $this->Contracts_Model->getOrganisations();
		$venues = $this->Contracts_Model->getVenues();
		return view($this->layout2, compact('breadcrums','table','regions','organisation','venues'));
	}

	public function saveContractsForm(Request $request){
		$status = $this->Contracts_Model->saveForm($request , 5, false);

		if($status){
			$data['status']=1;
		}else{
			$data['status']=0;	
		}
		$data['url'] = 'List/Contract';
		return Response::json($data);
	}

	public function listRowsAjax(Request $request){
		return $this->Contracts_Model->getContractRowsAjax($request);
	}
}