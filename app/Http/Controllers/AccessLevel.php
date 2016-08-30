<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\AccessLevel\AccessLevel_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use Response;


class AccessLevel extends Controller
{
    protected $layout = 'modules.AccessLevel.AccessLevelRoles', $layout2 = 'modules.AccessLevel.AccessLevelAreas', $layout3 = 'modules.AccessLevel.AccessLevelSections', $layout4 = 'modules.AccessLevel.AccessLevelFields';
    var $AccessLevel_Model;

	public function __construct(){
		$this->AccessLevel_Model=new AccessLevel_Model;
	}

	public function getAccessLevel(){
		$breadcrums = $this->getBreadCrums(2);
		$roles = $this->AccessLevel_Model->getRoles();
		$allusers = $this->AccessLevel_Model->getAllUsers();
		$usertype = $this->AccessLevel_Model->getUserTypes();
		//var_dump($roles); exit;
		return view($this->layout,compact('roles','usertype','allusers','breadcrums'));
	}
	public function getAccessLevelAreas(){
		$modules = $this->AccessLevel_Model->getModules();
		return view($this->layout2,compact('modules'));
	}
	public function getAccessLevelSection(Request $request ){
		$section = $this->AccessLevel_Model->getSections($request['m_id']);
		return view($this->layout3,compact('section'));
	}
	public function getAccessLevelFields(Request $request){
		$fields = $this->AccessLevel_Model->getFields($request);
		return view($this->layout4,compact('fields'));
	}

	public function getAccessLevelFormSave(Request $request){
		$status = $this->AccessLevel_Model->saveAccessLevelForm($request);

		if($status){
			$data['status']=1;
		}else{
			$data['status']=0;	
		}
		return Response::json($data);
	}
	public function getBreadCrums($m_id){
		$data['Page_title'] = 'Access Permissions - Form';
		$data['Page_title_info'] = '';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Access Permissions';
		//$data['Breadcrums'][1]['url'] = '/';
		//$data['Breadcrums'][2]['title'] = 'Edit';

		return $data;
	}
}
