<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use File;
use DB;
use Auth;
use Validator;
class NewModel extends Model{

	public function getSections($m_id,$grid = false, $gridBlkId = null ){

		$modArr = null;
		$val = (int)trim($m_id,"'");
		//echo $val; exit;
		$value1=array('tbl_blk_id','tbl_blk_name');//
		$mod1 = DB::table('table_blocks')->select($value1)->where('tbl_blk_m_id','=', $val);
		if($grid){
			$mod1 = $mod1->where('is_grid','=', 1);
			if($gridBlkId != null){
				$mod1 = $mod1->where('tbl_blk_id','=', $gridBlkId);
			}

		}else{
			$mod1 = $mod1->where('is_grid','=', 0);
		}
		$mod1 = $mod1->orderBy('tbl_blk_id', 'asc')->get();

		foreach ($mod1 as $key => $value) {
			$modArr["{$value->{$value1[0]}}"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getFields($m_id, $grid = false, $id, $gridTable = null, $gridPK = null, $gridBlkId = null ){  // 'asd' dummy value used in development phase
		
		$val = (int)trim($m_id,"'");
		$Sec = $this->getSections($val, $grid , $gridBlkId );
		//if ($grid) var_dump($Sec);
		$object = new \stdClass();
		$fileInclude = array('GridFiles'=>0,'datePicker'=>0);
		if(is_null($gridTable)){
			$table = $this->table;
		}else{
			$table = $gridTable;
		}
		if(is_null($gridPK)){
			$primaryKey = $this->primaryKey;
		}else{
			$primaryKey = $gridPK;
		}
		
		$savedRecord= DB::table($table)->select('*')->where("{$primaryKey}",'=', $id)->get();

		$value1=array('tbl_fld_id','tbl_fld_max_length','tbl_fld_tbl_col_name','tbl_fld_fld_type_id','tbl_fld_col_disp_name','tbl_fld_col_disp_sht_name','tbl_fld_place_holder','tbl_fld_class','advance_function');
		foreach ($Sec as $key => $value) {
			$objectFields = new \stdClass();
			
			
			$key = (int)trim($key,"'");
			$mod1 = DB::table('table_fields')->select($value1)->where('tbl_fld_disp_blk_id','=', $key);
			if( isset($this->accessLevelDetails[$key]['blocked']) && $this->accessLevelDetails[$key]['blocked'] != '' ){
				$mod1 = $mod1->whereNotIn('tbl_fld_id', $this->accessLevelDetails[$key]['blocked']);				
			}			
			$mod1 = $mod1->orderBy('tbl_fld_disp_blk_id', 'asc')->orderBy('tbl_fld_disp_order','asc')->get();

			foreach ($mod1 as $key1 => $fields) {
				if ( ! $grid ){
					if (in_array($fields->tbl_fld_id, $this->accessLevelDetails[$key]['is_read'])){
						$objectFields->{"is_read_".$fields->tbl_fld_id} = true;
					}
					if (in_array($fields->tbl_fld_id, $this->accessLevelDetails[$key]['is_edit'])){
						$objectFields->{"is_edit_".$fields->tbl_fld_id} = true;
					}
					
				}
				$objectFields->{"field_".$fields->tbl_fld_id} = $fields;
				if( in_array($fields->tbl_fld_fld_type_id, array(1,2,3,5,6,7))) {
					if(isset($savedRecord[0])){									
						if($fields->tbl_fld_tbl_col_name != 'asd'){
							$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$fields->tbl_fld_tbl_col_name};
						}
						
					}

				}elseif( in_array($fields->tbl_fld_fld_type_id, array(12,13))) {	
						$fileInclude['datePicker'] = 1;
						if(isset($savedRecord[0])){
							if($fields->tbl_fld_tbl_col_name != 'asd'){
								if($fields->tbl_fld_fld_type_id == 13 && $fields->tbl_fld_tbl_col_name != NULL){
									//$objectFields->{"displayValue_".$fields->tbl_fld_id} = date('d/m/Y', strtotime($savedRecord[0]->{$fields->tbl_fld_tbl_col_name}));
									$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$fields->tbl_fld_tbl_col_name};
								}else{
									$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$fields->tbl_fld_tbl_col_name};
								}
								
							}
							
						}
				}elseif( $fields->tbl_fld_fld_type_id == 99 ){
					$fileInclude['GridFiles'] = 1;
					$newTable = explode(':', $fields->tbl_fld_tbl_col_name);					
					$objectFields->{"gridFields_".$fields->tbl_fld_id} = $this->getFields($val, true, $id, $newTable[0], 'ref_id', $newTable[1]);
					$objectFields->{"gridFields_block_".$fields->tbl_fld_id} = $newTable[1];
					$gridFieldValues = DB::table($newTable[0])->select('*')->where('ref_id','=',$id)->get();
					$objectFields->{"gridFields_table_content_".$fields->tbl_fld_id} = $gridFieldValues;
				}elseif ($fields->tbl_fld_fld_type_id == 9 ) {
					$dropDownOptions = DB::table('static_dropdown_field_values')->select('*')->where('field_id','=',$fields->tbl_fld_id)->get();
					$objectFields->{"dropDownOptions_".$fields->tbl_fld_id} = $dropDownOptions;
					if(isset($savedRecord[0])){
						if($fields->tbl_fld_tbl_col_name != 'asd'){
							$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$fields->tbl_fld_tbl_col_name};
						}
						
					}
				}elseif ($fields->tbl_fld_fld_type_id == 4 ) {
					$dropDownOptions = DB::table('static_dropdown_field_values')->select('*')->where('field_id','=',$fields->tbl_fld_id)->get();
					$objectFields->{"dropDownOptions_".$fields->tbl_fld_id} = $dropDownOptions;
					if(isset($savedRecord[0])){
						if($fields->tbl_fld_tbl_col_name != 'asd'){
							$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$fields->tbl_fld_tbl_col_name};
						}
						
					}
				}elseif ( $fields->tbl_fld_fld_type_id == 10 ) {
					$newTable = explode(':', $fields->advance_function);
					
					$dropDownOptions = DB::table($newTable[0])->select(DB::raw("$newTable[1] as value, $newTable[2] as text"));
					if(isset($newTable[3]) && $newTable[3] != ''){ 
						$dropDownOptions = $dropDownOptions->whereRaw($newTable[3]);
					}
					$dropDownOptions = $dropDownOptions->get();
					$objectFields->{"dropDownOptions_".$fields->tbl_fld_id} = $dropDownOptions;
					if(isset($savedRecord[0])){
						if($fields->tbl_fld_tbl_col_name != 'asd'){
							$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$fields->tbl_fld_tbl_col_name};
						}
						
					}
				}elseif ( $fields->tbl_fld_fld_type_id == 11 ) {
					$newTable = explode(':', $fields->advance_function);
					//echo $fields->tbl_fld_id;
					$dropDownOptions = DB::table($newTable[0])->select(DB::raw("$newTable[1] as value, $newTable[2] as text"));
					if(isset($newTable[3]) && $newTable[3] != ''){ 
						$dropDownOptions = $dropDownOptions->whereRaw($newTable[3]);
					}
					$dropDownOptions = $dropDownOptions->get();
					$objectFields->{"dropDownOptions_".$fields->tbl_fld_id} = $dropDownOptions;
					if(isset($savedRecord[0])){
						if( ! in_array($fields->tbl_fld_tbl_col_name, array('asd'))  ){
							$newTagFieldInfo = explode( ':', $fields->tbl_fld_tbl_col_name );
							$dropDownOptionsSaved = DB::table($newTagFieldInfo[0])->join($newTable[0], $newTable[1], '=', $newTagFieldInfo[2]);

							$dropDownOptionsSaved = $dropDownOptionsSaved->select(DB::raw("$newTable[1] as value, $newTable[2] as text"));				
							$dropDownOptionsSaved = $dropDownOptionsSaved->where("$newTagFieldInfo[0].$newTagFieldInfo[1]",'=',$id);
							if(isset($newTable[3]) && $newTable[3] != ''){ 
								$dropDownOptionsSaved = $dropDownOptionsSaved->whereRaw($newTable[3]);
							}					
							$dropDownOptionsSaved = $dropDownOptionsSaved->get();
							$objectFields->{"displayValue_".$fields->tbl_fld_id} = $dropDownOptionsSaved;
						}	
					}
				}elseif ( $fields->tbl_fld_fld_type_id == 50 ) {
					if(isset($savedRecord[0])){									
						if($fields->tbl_fld_tbl_col_name != 'asd'){
							$latLngFields = explode('-', $fields->tbl_fld_tbl_col_name); //$fields->tbl_fld_tbl_col_name
							$objectFields->{"displayValue_".$fields->tbl_fld_id} = $savedRecord[0]->{$latLngFields[0]} . '|' . $savedRecord[0]->{$latLngFields[1]} ;
						}
						
					}
					

				}				
			}

			//array_push($objectFields, var)
			$object->$value = $objectFields;	
		}		
			$object->{"fileInclude"} = $fileInclude;
		//var_dump($object); exit;
		return $object;
	}

	public function saveForm($data, $m_id, $grid = false){
		$returnFlag = false;
		$value1=array('tbl_fld_id','tbl_fld_tbl_col_name','tbl_fld_fld_type_id','tbl_fld_col_disp_name','tbl_fld_col_disp_sht_name','tbl_fld_place_holder','tbl_fld_class','advance_function');
		$val = (int)trim($m_id,"'");
		$Sec = $this->getSections($val, $grid);
		$whereArray = array("{$this->primaryKey}"=>$data[$this->primaryKey]);
		$dataArray = array();
		$multiOptionMasterArray = array();
		$table = $this->table;
		foreach ($Sec as $key => $value) {
						
			$key = (int)trim($key,"'");			
			$mod1= DB::table('table_fields')->select($value1)->where('tbl_fld_disp_blk_id','=', $key)->orderBy('tbl_fld_disp_blk_id', 'asc')->orderBy('tbl_fld_disp_order','asc')->get();

			foreach ($mod1 as $key1 => $fields) {
				if($fields->tbl_fld_tbl_col_name != 'asd'){
					if( in_array($fields->tbl_fld_fld_type_id, array(1,2,3,5,6,9,10,12))){

						if(isset($data[$fields->tbl_fld_tbl_col_name]) && $data[$fields->tbl_fld_tbl_col_name] != ''){
							$dataArray[$fields->tbl_fld_tbl_col_name] = $data[$fields->tbl_fld_tbl_col_name];
						}else{
							//$dataArray[$fields->tbl_fld_tbl_col_name] = null;
						}

					}
					if( in_array($fields->tbl_fld_fld_type_id, array(7))){
						if ($data->hasFile($fields->tbl_fld_tbl_col_name)){
							$files = $data->file($fields->tbl_fld_tbl_col_name);
							$rules = array('file' => 'required|mimes:png,gif,jpeg');
							$destinationPath = "../storage/userfiles/profile/";
							$validator = Validator::make(array('file'=> $files), $rules);
							if($validator->passes()){
								$originalName = $files->getClientOriginalName();							
								$extension = '.jpeg';
								$randomString = mt_rand();
								$filename = "{$randomString}_{$originalName}{$extension}";	
								$upload_success = $files->move($destinationPath, $filename);
								$dataArray[$fields->tbl_fld_tbl_col_name] = 'profile/'.$filename;
							}
							
						}else{
							//$dataArray[$fields->tbl_fld_tbl_col_name] = null;
						}
					}
					if( in_array($fields->tbl_fld_fld_type_id, array(4))){
						if(isset($data[$fields->tbl_fld_tbl_col_name]) && $data[$fields->tbl_fld_tbl_col_name] == 'on'){
							$dataArray[$fields->tbl_fld_tbl_col_name] = 1;
						}else{
							$dataArray[$fields->tbl_fld_tbl_col_name] = 0;
						}
					}
					if( in_array($fields->tbl_fld_fld_type_id, array(13))){		
						if(isset($data[$fields->tbl_fld_tbl_col_name]) && $data[$fields->tbl_fld_tbl_col_name] != ''){
							$dataArray[$fields->tbl_fld_tbl_col_name] = $data[$fields->tbl_fld_tbl_col_name];
						}else{
							$dataArray[$fields->tbl_fld_tbl_col_name] = null;
						}				 
						
					}
					if( in_array($fields->tbl_fld_fld_type_id, array(11))){																
						$multiOptionMasterArray[]=$fields->tbl_fld_tbl_col_name;
					}
					if( in_array($fields->tbl_fld_fld_type_id, array(50))){																
						$latLngFields = explode('-', $fields->tbl_fld_tbl_col_name);
						if(isset($data[$fields->tbl_fld_tbl_col_name]) && $data[$fields->tbl_fld_tbl_col_name] != ''){
							$latLngFieldsPost = explode('|', $data[$fields->tbl_fld_tbl_col_name] );
							$dataArray[$latLngFields[0]] = $latLngFieldsPost[0];
							$dataArray[$latLngFields[1]] = $latLngFieldsPost[1];							
						}else{
							$dataArray[$latLngFields[0]] = null;
							$dataArray[$latLngFields[1]] = null;
						}
					}
				}
				
			}
		}
		$record = DB::table($table)->where($whereArray)->first();
		if (is_null($record)) {
		    $insertId = DB::table($table)->insertGetId($dataArray);
		} else {
		    DB::table($table)->where($whereArray)->update($dataArray);
		    $insertId = $data[$this->primaryKey];
		}

		
		foreach ($multiOptionMasterArray as $value) {			
			$newTable = explode( ':', $value );	
			$multiOptionWhereArray = array("{$newTable[1]}"=>$insertId);
			$multiOptionDataArray = array();
			$multiOptionDeleteWhereArray = array();
			$recordsInTable = array();
			if(isset($data[$newTable[0]])){								
				$record = DB::table($newTable[0])->where($multiOptionWhereArray)->get();
				foreach ($record as $recordRow) {
					$recordsInTable[$recordRow->id] = $recordRow->value;
				}

				$removeTheseRows = array_diff($recordsInTable, $data[$newTable[0]]);
				$addTheseRows = array_diff($data[$newTable[0]], $recordsInTable);
				$addTheseRows = array_map('intval', $addTheseRows);				

				foreach ($data[$newTable[0]] as $val){
					if(in_array($val, $addTheseRows)){
						$multiOptionDataArray[] = array("$newTable[1]"=>$insertId,"$newTable[2]"=>$val);
					}					
				}
				
				//if (is_null($record)) {
				    DB::table($newTable[0])->insert($multiOptionDataArray);
				    DB::table($newTable[0])->whereIN('id',array_keys($removeTheseRows))->delete();
				//}
			}else{
				DB::table($newTable[0])->where($multiOptionWhereArray)->delete();
			}
		}		

		$returnFlag = true;
		return $returnFlag; 
	}

	public function gridSave ($data, $fieldID, $gPKey, $ref_id){
		$object = new \stdClass();
		$object->returnFlag = false;
		$mod1= DB::table('table_fields')->select('*')->where('tbl_fld_id','=', $fieldID)->first();
		$newTable = explode(':', $mod1->tbl_fld_tbl_col_name);
		$blkId = $newTable[1];
		$table = $newTable[0];
		$whereArray =  array('id' => $gPKey );

		$mod2= DB::table('table_fields')->select('*')->where('tbl_fld_disp_blk_id',$blkId)->orderBy('tbl_fld_disp_order', 'asc')->skip(2)->take(100)->get();; // make sure the order of post is maintained else fields may mismatch // skip the primary id field
		$queries = DB::getQueryLog();
		$last_query = end($queries);
		
		$object->last_query = $last_query;
		
		$dataArray = array('ref_id' => $ref_id);
		$index = 2;
		foreach ($mod2 as $key1 => $fields) {			
			$dataArray[$fields->tbl_fld_tbl_col_name] = $data['info'][$index++];		
		}	

		$record = DB::table($table)->where($whereArray)->first();
		if (is_null($record)) {
		    $insertId = DB::table($table)->insertGetId($dataArray);
		} else {
		    DB::table($table)->where($whereArray)->update($dataArray);
		    $insertId = $gPKey;
		}
		$object->returnFlag = true;
		
		$object->returnData = $insertId;
		return $object;
	}

	public function getRegions($regionId = null){		
		return $this->getOrganisations($regionId , 3);
	}

	public function getVenues($venueId = null){		
		return $this->getOrganisations($venueId , 2);
	}

	public function getOrganisations($orgId = null , $org_lvl = 1 ){
		$modArr = null;
		$value1=array('id','name');

		$mod1= DB::table('organisation_org')->select($value1)->where('org_lvl' , $org_lvl);
		if($orgId != null){		
			$mod1 = $mod1->where('id_rgs',$orgId);
		}
		$mod1 = $mod1->orderBy('name', 'asc')->get();
		foreach ($mod1 as $key => $value) {
			$modArr["{$value->{$value1[0]}}"] = $value->{$value1[1]};
		}
		return $modArr;
	}

	public function getAccessLevels( $modId ){
		$accessLevelDetails = array();
		$modulesTablePKFields = array(1=>'id_usr',3=>'id',5=>'id',6=>'id',7=>'id',8=>'doc_id');
		// list page filter chk
		$id_usr = Auth::user()->id_usr;
		$level_usr = Auth::user()->level_usr;
		if ($level_usr == 2) {			
			$accessLevelDetails['listPageFilter'] = "{$modulesTablePKFields[$modId]} = {$id_usr}";
		}
		$accessLevelDetails['addButton'] = true;
		if( in_array($modId, array ( 1,5,7 ) ) ) {
			if ($level_usr == 2) { 
				$accessLevelDetails['addButton'] = false; 
			}			
		}

		$Sec = $this->getSections($modId, false , null );
		
		$userAccessSet= DB::table('roles_mod_field_link')->where('rmfl_type','=', '3')->count();
		
		foreach ($Sec as $key => $value) {
			$blockedFieldIds = array();			
			$key = (int)trim($key,"'");			
			$mod2= DB::table('table_fields')->select('tbl_fld_id')->where('tbl_fld_disp_blk_id','=', $key)->orderBy('tbl_fld_disp_blk_id', 'asc')->orderBy('tbl_fld_disp_order','asc')->get();
			

			foreach ($mod2 as $key1 => $fields) {
				if( $userAccessSet ){
					$mod3 =  DB::table('roles_mod_field_link')->where('rmfl_type','=', '3')->where('rmfl_type_id','=',$id_usr);
				}else{
					$mod3 =  DB::table('roles_mod_field_link')->where('rmfl_type','=', '1')->where('rmfl_type_id','=',$level_usr);
				}
				//$mod3 = $mod1;
				//echo $mod3->tosql();
				$mod3 = $mod3->where('mfl_id','=',$fields->tbl_fld_id)->first();
				$queries = DB::getQueryLog();
				$last_query = end($queries);
				//echo $mod3; exit;
				if ( ! $mod3 == null) {
					if( $mod3->is_no_access ){
						$blockedFieldIds[] =  $mod3->mfl_id;						
					}
					if( $mod3->is_read ){
						$readOnlyFieldIds[] =  $mod3->mfl_id;						
					}
					if( $mod3->is_edit ){
						$writeOnlyFieldIds[] =  $mod3->mfl_id;						
					}
					if( $mod3->is_add ){
						$addOnlyFieldIds[] =  $mod3->mfl_id;						
					}
					if( $mod3->is_delete ){
						$deleteOnlyFieldIds[] =  $mod3->mfl_id;						
					}
					if( ! ( $mod3->is_no_access || $mod3->is_read || $mod3->is_edit ) ){
						$readOnlyFieldIds[] =  $fields->tbl_fld_id;  // If all three fields blank  assume full access
						$writeOnlyFieldIds[] =  $fields->tbl_fld_id; // If all three fields blank  assume full access
					}
				}else{
					$readOnlyFieldIds[] =  $fields->tbl_fld_id;  // If no entry assume full access
					$writeOnlyFieldIds[] =  $fields->tbl_fld_id; // If no entry assume full access
				}
				
			}
			$accessLevelDetails[$key]['blocked'] = $blockedFieldIds;
			$accessLevelDetails[$key]['is_read'] = $readOnlyFieldIds;
			$accessLevelDetails[$key]['is_edit'] = $writeOnlyFieldIds;
		}
		return $accessLevelDetails;
	}
}		