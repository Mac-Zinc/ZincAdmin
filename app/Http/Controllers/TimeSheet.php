<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Modules\TimeSheet\TimeSheet_Model;
use JWTAuth;
use Auth;
use Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;
use App\Http\Views;
use Response;

class TimeSheet extends Controller{
	protected $layout = 'modules.TimeSheet.list';
	protected $layout2 = 'modules.TimeSheet.form';
	var $TimeSheet_Model ;

	public function __construct(){
		$this->TimeSheet_Model = new TimeSheet_Model;
	}

	public function getTimeSheetForm(Request $request,$weekNo=null){
		$originalWeekNo = date('W');
		$weekNavURL = 'Form/TimeSheet';
		$headerType = 2;
		$showNextWeek = 1;
		if(isset($weekNo)){
			$currentWeekNo = $weekNo;
		}else{
			$currentWeekNo = date('W');
		}
		if( $currentWeekNo == $originalWeekNo ) { $showNextWeek = 0; } 
		$currentWeekYear = date('Y');
		$breadcrums = $this->getBreadCrums(3,true,$weekNo);
		$usr_id = Auth::user()->id_usr;
		$startNEndDate = $this->getStartAndEndDate($currentWeekNo, $currentWeekYear);
		$currentWeekTimeSheet = $this->TimeSheet_Model->getCurrentWeekTimeSheet($startNEndDate ,$usr_id , $currentWeekNo, $currentWeekYear);
		return view($this->layout2, compact('breadcrums','currentWeekNo','startNEndDate','currentWeekYear', 'currentWeekTimeSheet','showNextWeek','weekNavURL','headerType'));
	}
	public function getBreadCrums($m_id, $bool = false, $weekNo){
			$data['Page_title'] = 'TimeSheet';
			$data['Page_title_info'] = 'view, edit and manage profiles';
			$data['Breadcrums'][0]['title'] = 'Home';
			$data['Breadcrums'][0]['url'] = '/';
			$data['Breadcrums'][1]['title'] = 'TimeSheet';
			$data['Breadcrums'][1]['url'] = '/List/TimeSheet';
			if($bool){
				$data['Breadcrums'][2]['title'] = 'Edit';
				$data['Breadcrums'][2]['url'] = '/Form/TimeSheet/'.$weekNo;
			}
			return $data;
		}

	public function getStartAndEndDate($week, $year) {
		$dto = new \DateTime();		

		$dto->setISODate($year, $week)->format('d');
		$dto->modify('-2 days')->format('d');		

		for($i=0;$i<7;$i++){
			$ret[$i]['date'] = $dto->modify('+1 days')->format('d');
			$ret[$i]['day'] = $dto->format('D');
			$ret[$i]['month'] = $dto->format('F');
			$ret[$i]['fullDate'] = $dto->format('Y-m-d');
		}
		//var_dump($ret); exit;
		return $ret;
	}

	public function saveWeeklyTimeSheet(Request $request){
		
		$status = $this->TimeSheet_Model->saveWeeklyTimeSheet($request);

		if($status){
			$data['status']=1;
		}else{
			$data['status']=0;	
		}
		return Response::json($data);
	}


	public function getTimeSheetList(Request $request,$weekNo = null){
		$originalWeekNo = date('W');
		$weekNavURL = 'List/TimeSheet';
		$headerType = 2;
		$showNextWeek = 1;
		if(isset($weekNo)){
			$currentWeekNo = $weekNo;
		}else{
			$currentWeekNo = date('W');
		}
		if( $currentWeekNo == $originalWeekNo ) { $showNextWeek = 0; } 
		$currentWeekYear = date('Y');
		$breadcrums = $this->getBreadCrums(3, false, $weekNo);
		$table = $this->TimeSheet_Model->getTimeSheetRows($currentWeekNo);
		//$regions = $this->TimeSheet_Model->getRegions();
		//$organisation = $this->TimeSheet_Model->getOrganisations();
		//$venues = $this->TimeSheet_Model->getVenues();  ,'regions','organisation','venues'
		
		$usr_id = Auth::user()->id_usr;
		$startNEndDate = $this->getStartAndEndDate($currentWeekNo, $currentWeekYear);
		return view($this->layout, compact('breadcrums','currentWeekNo','startNEndDate','currentWeekYear','table','showNextWeek','weekNavURL','headerType'));
	}

	public function listRowsAjax(Request $request){
		return $this->TimeSheet_Model->getTimeSheetRowsAjax($request);
	}
}	