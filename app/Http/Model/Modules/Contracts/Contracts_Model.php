<?php

namespace App\Http\Model\Modules\Contracts;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Contracts_Model extends Model {

	public function getSections($m_id){

		$modArr = null;
		$val = (int)trim($m_id,"'");
		//echo $val; exit;
		$value1=array('tbl_blk_id','tbl_blk_name');//
		$mod1= DB::table('table_blocks')->select($value1)->where('tbl_blk_m_id','=', $val)->orderBy('tbl_blk_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getFields($m_id){
		$val = (int)trim($m_id,"'");
		$Sec = $this->getSections($val);
		$object = new \stdClass();
		
		$value1=array('tbl_fld_id','tbl_fld_tbl_col_name','tbl_fld_fld_type_id','tbl_fld_col_disp_name','tbl_fld_col_disp_sht_name','tbl_fld_place_holder','tbl_fld_class');
		foreach ($Sec as $key => $value) {
			$objectFields = new \stdClass();
			$key = (int)trim($key,"'");			
			$mod1= DB::table('table_fields')->select($value1)->where('tbl_fld_disp_blk_id','=', $key)->orderBy('tbl_fld_disp_blk_id', 'asc')->orderBy('tbl_fld_disp_order','asc')->get();

			foreach ($mod1 as $key1 => $fields) {
				$objectFields->$key1 = $fields;
			}
			$object->$value = $objectFields;	
		}		

		//var_dump($object); exit;
		return $object;
	}

	public function daysOfWeek($m_id){
		$timestamp = strtotime('next Sunday');
		$days = array();
		for ($i = 0; $i < 7; $i++) {
		    $days[] = strftime('%A', $timestamp);
		    $timestamp = strtotime('+1 day', $timestamp);
		}

		return $days;
	}
}