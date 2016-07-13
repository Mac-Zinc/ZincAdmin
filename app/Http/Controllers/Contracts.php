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

class Contracts extends Controller{

	protected $layout = 'modules.contracts.wel';
	var $Contracts_Model ;

	public function __construct(){
		$this->Contracts_Model = new Contracts_Model;
	}

	public function getContractForm(){
		//$sections = array();		
		$sections = $this->Contracts_Model->getSections(5);
		$moduleFields = $this->Contracts_Model->getFields(5);
		$breadcrums = $this->getContractFormPageInfo(5);
		$days = $this->Contracts_Model->daysOfWeek(5);
		return view($this->layout, compact('sections','moduleFields','breadcrums','days'));
	}

	public function getContractFormPageInfo($m_id){
		$data['Page_title'] = 'Contract Info - Edit';
		$data['Page_title_info'] = 'view edit and manage contracts';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Contracts Info';
		$data['Breadcrums'][1]['url'] = '/';
		$data['Breadcrums'][2]['title'] = 'Edit';

		return $data;
	}
}