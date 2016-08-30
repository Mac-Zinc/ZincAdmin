<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class SideBar_Model extends Model
{
	
	public function GenerateSideBarTemplate($id)
    {       
		$value1=array('m_id','mod_title','mod_url','mod_ico');
		$value2=array('mmgl_mod_id','mmgl_mod_grp_id');
		$value3=array('mod_grp_id','mod_grp_title');
		$mod1= DB::table('modules_mds')->select($value1)->where('device_availability','=',1)->orderBy('mod_order', 'asc')->get();
		$mod2= DB::table('mod_mod_grp_link')->select($value2)->orderBy('mmgl_mod_grp_id', 'asc')->get(); 
		$mod3= DB::table('module_groups')->select($value3)->orderBy('mod_grp_id', 'asc')->get(); 
		
		$data = array();		
		$oldGrpId =-1;

		$type = 2;

		if($type == 1 ){
			foreach ($mod1 as $key => $value) {
				$moduleNameArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
				$modURL["'{$value->{$value1[0]}}'"] = $value->{$value1[2]};
			}
			foreach ($mod3 as $key => $value) {
				$moduleGrpArr["'{$value->{$value3[0]}}'"] = $value->{$value3[1]};
			}
			foreach ($mod2 as $key => $value)
			{
				if($oldGrpId != $value->{$value2[1]}){
					if($oldGrpId != -1){
						$temp = array();					
						$temp['name'] = $moduleGrpArr["'{$oldGrpId}'"];
						$temp['url'] = 'javascript:;';
						$temp['icon'] = '';//$value->{$value1[3]};						
						$temp['class'] = 'T';
						$temp['groupModules'] = $moduleName;
						array_push($data,$temp);
					}
					$moduleName = array();
					$oldGrpId = $value->{$value2[1]};
				}			
				$modNameVal['name'] = $moduleNameArr["'{$value->{$value2[0]}}'"];
				$modNameVal['url'] = $modURL["'{$value->{$value2[0]}}'"];
				$modNameVal['class'] = 'menueClickHijack';
				$modNameVal['icon'] = '';//'menueClickHijack';
				array_push($moduleName,$modNameVal);			
			}
			if($oldGrpId != -1){
				$temp = array();
				$temp['groupName'] = $moduleGrpArr["'{$oldGrpId}'"];
				$temp['class'] = '';
				$temp['icon'] = '';//$value->{$value1[3]};
				$temp['groupModules'] = $moduleName;
				array_push($data,$temp);
				$oldGrpId = $value->{$value2[1]};
			}			
		}elseif($type == 2){
			foreach ($mod1 as $key => $value) {
				//$moduleNameArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
				//$modURL["'{$value->{$value1[0]}}'"] = $value->{$value1[2]};
				$temp = array();					
				$temp['name'] = $value->{$value1[1]};
				$temp['url'] =  $value->{$value1[2]};
				$temp['icon'] = $value->{$value1[3]};
				$temp['class'] = 'menueClickHijack';
				$temp['groupModules'] = array(); //$moduleName;
				array_push($data,$temp);
			}
		}



		return array('sidebar' => $data);
    }	
}