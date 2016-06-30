<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\AccessLevel_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;


class AccessLevel extends Controller
{
    protected $layout = 'layouts.AccessLevelRoles', $layout2 = 'layouts.AccessLevelAreas', $layout3 = 'layouts.AccessLevelSections', $layout4 = 'layouts.AccessLevelFields';
    var $AccessLevel_Model;

	public function __construct(){
		$this->AccessLevel_Model=new AccessLevel_Model;
	}

	public function getAccessLevel(){
		$roles = $this->AccessLevel_Model->getRoles();
		$allusers = $this->AccessLevel_Model->getAllUsers();
		$usertype = array();
		//var_dump($roles); exit;
		return view($this->layout,compact('roles','usertype','allusers'));
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
		$fields = $this->AccessLevel_Model->getFields($request['blk_id']);
		return view($this->layout4,compact('fields'));
	}

	public function getAccessLevelFormSave(Request $request){
		
	}
}
