<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class AccessLevel_Model extends Model {

	public function getRoles(){
		$value1=array('role_id','role_name');
		$mod1= DB::table('roles_rls')->select($value1)->orderBy('role_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$roleArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $roleArr;
	}

	public function getAllUsers(){
		$value1=array('id_usr','firstname_usr','lastname_usr','middlename_usr');
		$mod1= DB::table('users_usr')->select($value1)->orderBy('firstname_usr', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$users["'{$value->{$value1[0]}}'"] = $value->{$value1[1]}; // . $value->{$value1[3]} . $value->{$value1[2]} ;
		}
		return $users;
	}

	public function getModules(){
		$value1=array('m_id','mod_title');
		$mod1= DB::table('modules_mds')->select($value1)->orderBy('m_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

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

	public function getFields($blk_id){

		$modArr = null;
		$val = (int)trim($blk_id,"'");
		//echo $val; exit;
		$value1=array('tbl_fld_id','tbl_fld_col_disp_name');
		$mod1= DB::table('table_fields')->select($value1)->where('tbl_fld_disp_blk_id','=', $val)->orderBy('tbl_fld_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function saveAccessLevelForm(){
		//$users = DB::table('users')->where([ ['status','1'], ['subscribed','<>','1'], ])->get();
	}
}