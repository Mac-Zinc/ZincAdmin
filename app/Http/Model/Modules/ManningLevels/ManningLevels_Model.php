<?php

namespace App\Http\Model\Modules\ManningLevels;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class ManningLevels_Model extends Model {

	

	public function getRegions(){
		$modArr = null;
		$value1=array('id_rgs','name_rgs');
		$mod1= DB::table('regions_rgs')->select($value1)->orderBy('name_rgs', 'asc')->get();
		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getOrganisations(){
		$modArr = null;
		$value1=array('id','name');
		$mod1= DB::table('organisation_org')->select($value1)->orderBy('name', 'asc')->get();
		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getDrivers(){
		$modArr = null; $i=0;
		$value1=array('id_usr','firstname_usr','middlename_usr','lastname_usr','LP_flag');
		$mod1= DB::table('users_usr')->select($value1)->where('level_usr','=',2)->orderBy('firstname_usr', 'asc')->get();
		foreach ($mod1 as $key => $value) {
			$modArr[$i]['id'] = $value->{$value1[0]};
			$modArr[$i]['name'] = preg_replace("/ {2,}/", " ", ($value->{$value1[1]} . ' ' . $value->{$value1[2]} . ' ' . $value->{$value1[3]})); 
			$modArr[$i]['LP'] = $value->{$value1[4]};
			$i++;
		}
		return $modArr;
	}
}