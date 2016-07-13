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

class ManningLevels extends Controller{

	protected $layout = 'modules.ManningLevels.list';
	var $ManningLevels_Model ;

	public function __construct(){
		$this->ManningLevels_Model = new ManningLevels_Model;
	}

	public function getContractForm(Request $request,$weekNo=null){
		
		$breadcrums = $this->getContractFormPageInfo(6);
		$originalWeekNo = date('W');

		if(isset($weekNo)){
			$currentWeekNo = $weekNo;
		}else{
			$currentWeekNo = date('W');
		}
		 
		$currentWeekYear = date('Y');

		$regions = $this->ManningLevels_Model->getRegions();
		$organisations = $this->ManningLevels_Model->getOrganisations();
		$drivers = $this->ManningLevels_Model->getDrivers();
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
		$startNEndDate = $this->getStartAndEndDate($currentWeekNo, $currentWeekYear);
		
		return view($this->layout, compact('breadcrums','currentWeekNo','startNEndDate','regions','organisations','drivers'));
	}

	public function getContractFormPageInfo($m_id){
		$data['Page_title'] = 'Manning Levels ';
		$data['Page_title_info'] = 'Overview';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Manning Levels';
		$data['Breadcrums'][1]['url'] = '/List/ManningLevels';
		$data['Breadcrums'][2]['title'] = 'Individual View';

		return $data;
	}
	public function getStartAndEndDate($week, $year) {
		$dto = new \DateTime();
		//$ret['week_start'] = $dto->setISODate($year, $week)->format('d-m-Y');
		//$ret['week_end'] = $dto->modify('+6 days')->format('d-m-Y');

		$dto->setISODate($year, $week)->format('d');
		$dto->modify('-8 days')->format('d');
		//$ret[1]['day'] = $dto->format('D');

		for($i=0;$i<=20;$i++){
			$ret[$i]['date'] = $dto->modify('+1 days')->format('d');
			$ret[$i]['day'] = $dto->format('D');
		}
		
		return $ret;
	}
}