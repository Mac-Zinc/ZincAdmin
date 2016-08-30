<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController; 
use File;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Views;
use Auth;
use App\Http\Model\Template_Model;
use App\Http\Model\MasterTemplate_Model;
use App\Http\Model\ContainerTemplate_Model;
use App\Http\Model\SideBar_Model;
use Cache;
use Validator;
class FileRequestHandel extends BaseController {

	public function imageFile($folder,$filename){		
		if(trim($folder) != 'default'){
			$filename = $folder.'/'.$filename;
		}
		
		$path = '../storage/userfiles/' . $filename;
		if(!File::exists($path)) abort(404);

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
	}

	public function getFiles(Request $request){

		$whereArray = array('modID' => $request['modID'],'modPKey' => $request['modPKey'],'modFieldID' => $request['modFieldID'],);
		$mod1 = DB::table('documents_hub')->where($whereArray)->get();
		$outputS = '<table class="table table-striped table-hover table-bordered dataTable no-footer"><thead><tr><th>Document Name</th><th>Date Uploaded</th><th>Category</th><th>File Size</th><th>File Type</th><th>Actions</th></tr></thead><tbody>';
		foreach ($mod1 as $key => $value) {
			$destinationPath = "../storage/userfiles/{$value->modID}/{$value->modFieldID}/{$value->modPKey}/{$value->fileName}";
			$bytes = $this->FileSizeConvert(File::size($destinationPath));  

			$outputS = $outputS . "<tr><td>{$value->originalFileName}</td><td>{$value->created_date}</td><td>Nil</td><td>{$bytes}</td><td>File Type</td><td><a href='download/document/{$value->doc_id}'>Download</a>  <a href='javascript:void(0);' class ='delete' data-url='delete/document/{$value->doc_id}'>Delete</a>  </td></tr>";
		}
		$outputS = $outputS . '</tbody></table>';
		$data['status'] = 1 ;
		$data['data'] = $outputS;
		return $data;
	}

	public function sendFiles(Request $request, $usr_id = null){
		if( is_null($usr_id)){
			$usr_id = Auth::user()->id_usr;
		}
		if ($request->hasFile('postFile')){		
			// getting all of the post data
			$files = $request->file('postFile');
			// Making counting of uploaded images
			$file_count = count($files);
			// start count how many uploaded
			$uploadcount = 0;
			$rules = array('file' => 'required|mimes:png,gif,jpeg,pdf,xls,doc,txt,xlsx,docx,csv,zip');
			$modID = $request['modID'];
			$modPKey = $request['modPKey'];
			$modFieldID = $request['modFieldID'];
			$destinationPath = "../storage/userfiles/{$modID}/{$modFieldID}/{$modPKey}/";	
			if($file_count > 1){
				foreach($files as $file) {
					$validator = Validator::make(array('file'=> $file), $rules);
					if($validator->passes()){
						//$destinationPath = '/var/www/api/public/uploads/21/'.$id.'/';
							
						$originalName = $file->getClientOriginalName();							
						$extension = '.jpeg';
						$randomString = mt_rand();	
						$mimdType = $file->getMimeType();							
						if($file->getClientOriginalExtension() == ''){
							
							switch( $mimdType ) {
					    		case "image/gif": $extension=".gif"; break;
					    		case "image/png": $extension=".png"; break;
					    		case "image/jpeg":$extension=".jpeg"; break;
					    		case "image/jpeg": $extension=".jpeg"; break;
							}
								
						}else{
								$extension = '';
						}
							
						$filename = "{$usr_id}_{$randomString}_{$originalName}{$extension}";
						$upload_success = $file->move($destinationPath, $filename);
						$doc_hub = array(
							'fileName' => $filename,
							'originalFileName' => $originalName,
							'doc_id'  => null, 
							'modID'  => $modID, 
							'modPKey' => $modPKey,
							'modFieldID' => $modFieldID, 
							'user_id'=> $usr_id
							);
						DB::table('documents_hub')->insert($doc_hub);
						$uploadcount ++;
					}else {
						$data=['error' => 'unknown extension'];
						return  $data;
					}
				}
			}else{
				
					$validator = Validator::make(array('file'=> $files), $rules);
					if($validator->passes()){
						//$destinationPath = '/var/www/api/public/uploads/21/'.$id.'/';
						$originalName = $files->getClientOriginalName();							
						$extension = '.jpeg';
						$randomString = mt_rand();							
						$mimdType = $files->getMimeType();
						
						if($files->getClientOriginalExtension() == ''){
							$extension = $this->getFileExtension($mimdType);								
						}else{
							$extension = '';
						}
						
						//$filename = $usr_id.'_'.mt_rand().'_'.$files->getClientOriginalName().$extension;
						$filename = "{$usr_id}_{$randomString}_{$originalName}{$extension}";	
						$upload_success = $files->move($destinationPath, $filename);
						$doc_hub = array(
								'fileName' => $filename, 
								'originalFileName' => $originalName,
								'doc_id'  => null, 
								'modID'  => $modID, 
								'modPKey' => $modPKey,
								'modFieldID' => $modFieldID, 
								'user_id'=> $usr_id
								);
						DB::table('documents_hub')->insert($doc_hub);
						$uploadcount ++;
					}else {
						$data=['error' => 'unknown extension'];
						return  $data;
					}
					
			}
				
			$data=['data' => 'File uploaded Successfully'];
			return  $data;
		}else {
				
			 $data=['error' => 'error no files to upload'];
			return  $data;
		}
	}

	public function FileSizeConvert($bytes){
	    $bytes = floatval($bytes);
	        $arBytes = array(
	            0 => array(
	                "UNIT" => "TB",
	                "VALUE" => pow(1024, 4)
	            ),
	            1 => array(
	                "UNIT" => "GB",
	                "VALUE" => pow(1024, 3)
	            ),
	            2 => array(
	                "UNIT" => "MB",
	                "VALUE" => pow(1024, 2)
	            ),
	            3 => array(
	                "UNIT" => "KB",
	                "VALUE" => 1024
	            ),
	            4 => array(
	                "UNIT" => "B",
	                "VALUE" => 1
	            ),
	        );

	    foreach($arBytes as $arItem){
	        if($bytes >= $arItem["VALUE"]){
	            $result = $bytes / $arItem["VALUE"];
	            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
	            break;
	        }
	    }
	    return $result;
	}

	public function getFileExtension($mimeType){
		switch( $mimdType ) {
    		case "image/gif": $extension=".gif"; break;
    		case "image/png": $extension=".png"; break;
    		case "image/jpeg":$extension=".jpeg"; break;
    		case "image/jpeg": $extension=".jpeg"; break;
		}
		return $extension;
	}

	public function downloadFile($fileId){

		$mod1 = DB::table('documents_hub')->where('doc_id',$fileId)->get();
		foreach ($mod1 as $key => $value) {
			$path = "../storage/userfiles/{$value->modID}/{$value->modFieldID}/{$value->modPKey}/{$value->fileName}";
		}
		//path = '../storage/userfiles/' . $filename;
		if(!File::exists($path)) abort(404);

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header('Content-Disposition',sprintf('attachment; filename="%s"', $value->originalFileName));
	    $response->header("Content-Type", $type);

	    return $response;
	}

	
}
?>