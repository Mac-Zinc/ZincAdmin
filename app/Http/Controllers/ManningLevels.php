<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\ManningLevels\ManningLevels_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Http\Views;
use Response;

class ManningLevels extends Controller{

	protected $layout = 'modules.ManningLevels.list';
	protected $layout1 = 'modules.ManningLevels.listRows';
	var $ManningLevels_Model ;
	var $ManningLevelsForDay = array ('','OK','RDW','SICK DAY','Holiday','Rest');
	var $ManningLevelsForDayColor  = array ('MLWhite', 'MLGreen', 'MLOrange', 'MLRed', 'MLYellow', 'MLGrey');

	public function __construct(){
		$this->ManningLevels_Model = new ManningLevels_Model;
	}

	public function getMLList(Request $request,$weekNo=null){
		
		$breadcrums = $this->getBreadCrums(6);
		$originalWeekNo = date('W');
		$weekNavURL = 'List/ManningLevels';
		$headerType = 1;
		$showNextWeek = 1;
		if(isset($weekNo)){
			$currentWeekNo = $weekNo;
		}else{
			$currentWeekNo = date('W');
		}
		if( $currentWeekNo == $originalWeekNo + 1) { $showNextWeek = 0; } 
		$currentWeekYear = date('Y');
		//$pageNo = 1; $request['pageNo'];
		$MLForDay = $this->ManningLevelsForDay;
		$MLForDayClr = $this->ManningLevelsForDayColor;
		$regions = $this->ManningLevels_Model->getRegions();
		$organisations = $this->ManningLevels_Model->getOrganisations();
		$drivers = $this->ManningLevels_Model->getDrivers(1,50);
		$allDepot = $this->ManningLevels_Model->getOrganisations();
		
		foreach ($drivers as $val) {			
		   $driverIds[] =  $val->id_usr;
		}	

		$startNEndDate = $this->getStartAndEndDate($currentWeekNo, $currentWeekYear,1);
		$ManningLevelsData = $this->ManningLevels_Model->getManningLevels($driverIds, $startNEndDate[0]['fullDate'] , $startNEndDate[20]['fullDate']);
/*
		if($currentWeekNo == 1){
			$previousWeekNo = 52;
			$previousWeekYear = $currentWeekYear - 1;
		}else{
			$previousWeekNo = $currentWeekNo - 1;
			$previousWeekYear = $currentWeekYear;
		}
		if($currentWeekNo == 52){
			$nextWeekNo = 52;
			$nextWeekYear = $currentWeekYear + 1;
		}else{
			$nextWeekNo = $currentWeekNo + 1;
			$nextWeekYear = $currentWeekYear;
		}
*/		
		
		
		return view($this->layout, compact('breadcrums','currentWeekNo', 'currentWeekYear', 'startNEndDate','regions','organisations','drivers','MLForDay','MLForDayClr','ManningLevelsData','allDepot','showNextWeek','weekNavURL','headerType'));
	}

	public function getBreadCrums($m_id, $bool = false){
		$data['Page_title'] = 'Manning Levels ';
		$data['Page_title_info'] = 'Overview';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Manning Levels';
		$data['Breadcrums'][1]['url'] = '/List/ManningLevels';
		$data['Breadcrums'][2]['title'] = 'Individual View';

		return $data;
	}

	public function saveMLQuickView(Request $request){

		$status = $this->ManningLevels_Model->saveMLQuickView($request['rowid'],$request['value']);

		if($status){
			$data['status']=1;
		}else{
			$data['status']=0;	
		}
		return Response::json($data);
	}

	public function getMLQuickView(Request $request){

		$result = $this->ManningLevels_Model->getMLQuickView($request['rowid'],$request['recLoc']);

		if($result['flag'] == true){
			$data['status'] = 1;
			$data['data'] = $result['data'];
		}else{
			$data['status']=0;	
		}
		return Response::json($data);
	}

	public function getRecords(Request $request){

		$drivers = $this->ManningLevels_Model->getDrivers($request['page'],$request['recPerPage'],$request['driverLPFilter']);
		//$pageNo = $request['page'];
		$MLForDay = $this->ManningLevelsForDay;
		$MLForDayClr = $this->ManningLevelsForDayColor;
		$allDepot = $this->ManningLevels_Model->getOrganisations();
		foreach ($drivers as $val) {			
		   $driverIds[] =  $val->id_usr;
		}
		$startNEndDate = $this->getStartAndEndDate($request['currentWeekNo'], $request['currentWeekYear'],1);
		$ManningLevelsData = $this->ManningLevels_Model->getManningLevels($driverIds, $startNEndDate[0]['fullDate'] , $startNEndDate[20]['fullDate']);
		return view($this->layout1, compact('startNEndDate','drivers','MLForDay','MLForDayClr','ManningLevelsData','allDepot'));
	
	}
	public function getRecordsDriverLPFilter(Request $request){

	}

	public function createManningLevels($specificUserId = null, $specificWeekNo = null){
		return $this->ManningLevels_Model->createManningLevels($specificUserId , $specificWeekNo);
	}
}