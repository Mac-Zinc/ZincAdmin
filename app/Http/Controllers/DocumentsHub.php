<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\DocumentsHub\DocumentsHub_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Http\Views;
use Response;

class DocumentsHub extends Controller{

	//protected $layout2 = 'modules.contracts.wel';
	protected $layout = 'modules.DocumentsHub.list';
	var $DocumentsHub_Model ;

	public function __construct(){
		$this->DocumentsHub_Model = new DocumentsHub_Model;
	}

	public function getDocumentsHubList(){
		$breadcrums = $this->getBreadCrums(1);
		$table = $this->DocumentsHub_Model->getDocumentsHubRows();
		return view($this->layout, compact('breadcrums','table'));
	}

	public function listRowsAjax(Request $request){
		return $this->DocumentsHub_Model->getDocumentsHubRowsAjax($request);
	}

	public function getBreadCrums($m_id, $bool = false){
		$data['Page_title'] = 'Documents Hub';
		$data['Page_title_info'] = 'view all uploaded documents';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Documents Hub';
		$data['Breadcrums'][1]['url'] = '/List/Documents';
		if($bool){
			//$data['Breadcrums'][2]['title'] = 'Edit';
			//$data['Breadcrums'][2]['url'] = '/Form/CRM';
		}
		return $data;
	}

}