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

class TimeSheet extends Controller{
	protected $layout = 'modules.TimeSheet.form';
	var $TimeSheet_Model ;

	public function __construct(){
		$this->TimeSheet_Model = new TimeSheet_Model;
	}

	public function getTimeSheet(){
		$breadcrums = $this->getTimeSheetFormPageInfo(3);
		$currentWeekNo = date('W'); 
		$currentWeekYear = date('Y');
		$startNEndDate['current'] = $this->getStartAndEndDate($currentWeekNo, $currentWeekYear);
		return view($this->layout, compact('breadcrums','currentWeekNo','startNEndDate','currentWeekYear'));//
	}
	public function getTimeSheetFormPageInfo($m_id){
		$data['Page_title'] = 'TimeSheet - Form';
		$data['Page_title_info'] = '';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'TimeSheet';
		$data['Breadcrums'][1]['url'] = '/';
		$data['Breadcrums'][2]['title'] = 'Edit';

		return $data;
	}

	public function getStartAndEndDate($week, $year) {
		$dto = new \DateTime();
		//$ret['week_start'] = $dto->setISODate($year, $week)->format('d-m-Y');
		//$ret['week_end'] = $dto->modify('+6 days')->format('d-m-Y');

		$ret[0]['date'] = $dto->setISODate($year, $week)->format('d');
		$ret[0]['day'] = $dto->format('D');
		$ret[0]['month'] = $dto->format('F');

		for($i=1;$i<=6;$i++){
			$ret[$i]['date'] = $dto->modify('+1 days')->format('d');
			$ret[$i]['day'] = $dto->format('D');
			$ret[$i]['month'] = $dto->format('F');
		}
		//var_dump($ret); exit;
		return $ret;
	}
}	