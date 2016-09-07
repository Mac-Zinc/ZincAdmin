<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getStartAndEndDate($week, $year, $type = 0) {
    	$dto = new \DateTime();		
    	$genType = array(0=>array('-2',7),1=>array('-9',21));
    	$dto->setISODate($year, $week)->format('d');
    	$dto->modify("{$genType[$type][0]} days")->format('d');		

    	for($i=0;$i<$genType[$type][1];$i++){
    		$ret[$i]['date'] = $dto->modify('+1 days')->format('d');
    		$ret[$i]['day'] = $dto->format('D');
    		$ret[$i]['month'] = $dto->format('F');
    		$ret[$i]['fullDate'] = $dto->format('Y-m-d');
    	}
    	//var_dump($ret); exit;
    	return $ret;
    }
}
