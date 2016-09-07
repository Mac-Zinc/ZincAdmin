<?php

namespace App\Http\Model\Modules\AccessLevel;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class AccessLevel_Model extends Model {

	public function getRoles(){
		$value1=array('role_id','role_name');
		$mod1= DB::table('roles_rls')->select($value1)->orderBy('role_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$roleArr["{$value->{$value1[0]}}"] = $value->{$value1[1]};
		}
		return $roleArr;
	}
	public function getUserTypes(){
		return array('Test');
	}
	public function getAllUsers(){
		$value1=array('id_usr','firstname_usr','lastname_usr','middlename_usr');
		$mod1= DB::table('users_usr')->select($value1)->orderBy('firstname_usr', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$users["{$value->{$value1[0]}}"] = $value->{$value1[1]}; // . $value->{$value1[3]} . $value->{$value1[2]} ;
		}
		return $users;
	}

	public function getModules(){
		$value1=array('m_id','mod_title');
		$mod1= DB::table('modules_mds')->select($value1)->where('is_access_editable','=','1')->orderBy('m_id', 'asc')->get();

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
		$mod1= DB::table('table_blocks')->select($value1)->where('tbl_blk_m_id','=', $val)->where('is_grid','=', '0')->orderBy('tbl_blk_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$modArr["'{$value->{$value1[0]}}'"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getFields($data){

		$modArr = null;
		$val = (int)trim($data['blk_id'],"'");
		//echo $val; exit;
		$value1=array('tbl_fld_id','tbl_fld_col_disp_name');
		$mod1= DB::table('table_fields')->select($value1)->where('tbl_fld_disp_blk_id','=', $val)->orderBy('tbl_fld_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$modArr["{$value->{$value1[0]}}"]['name'] = $value->{$value1[1]};
			$whereArray = array(
				'rmfl_type' => $data['accessType'],
				'rmfl_type_id' => (int)$data['typeValue'],
				'mfl_id' => $value->{$value1[0]}
				);
			$record = DB::table('roles_mod_field_link')->select(DB::raw('CONCAT(is_read,is_edit, is_add, is_delete, is_no_access) AS permissions'))->where($whereArray)->first();
			if (is_null($record)) {
				$modArr["{$value->{$value1[0]}}"]['flags'] = '00000';
			}else{
				$modArr["{$value->{$value1[0]}}"]['flags'] = $record->permissions;
			}
			
		}
		return $modArr;
	}

	public function saveAccessLevelForm($data){
		$returnFlag = false;
		/*var_dump($data);
		values[8]	01000
		values[9]	01000
		values[10]	11000
		typeValue	'1'
		area	'1'
		section	'1'
		$fields = $this->getFields($data['section']);*/
		foreach ($data['values'] as $key => $value) {
			$per = str_split($value);
			$dataArray = array(
				'rmfl_type' => $data['accessType'],
				'rmfl_type_id' => (int)$data['typeValue'],
				'mfl_id' => $key,
				'is_read' => $per[0],
				'is_edit' => $per[1],
				'is_add' => $per[2],
				'is_delete' => $per[3],
				'is_no_access' => $per[4],
				'is_hidden' => 0,
				'created_by' => Auth::user()->id_usr,
				'is_active' => 1,
				'is_deleted' => 0,	
				); 
			$whereArray = array(
				'rmfl_type' => $data['accessType'],
				'rmfl_type_id' => (int)$data['typeValue'],
				'mfl_id' => $key
				);
			$record = DB::table('roles_mod_field_link')->where($whereArray)->first();
		    if (is_null($record)) {
		        DB::table('roles_mod_field_link')->insert($dataArray);
		    } else {
		        DB::table('roles_mod_field_link')->where($whereArray)->update($dataArray);
		    }/**/

		}		
		$returnFlag = true;
		return $returnFlag; 
	}
}