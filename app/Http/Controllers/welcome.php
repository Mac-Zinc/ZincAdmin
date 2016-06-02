<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Views;

use Cache;
class welcome extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * Show the user profile.
     */
    public function index()
    {
        //$this->layout->content = View::make('user.profile');
		
		$data['Site_name'] = 'Zinc Admin';
		$data['Site_favicon'] = 'Favicon.ico';
		$data['Page_title'] = 'List';
		$data['Page_title_info'] = 'List all the related data';
		$data['Breadcrums'][0]['title'] = 'Home';
		$data['Breadcrums'][0]['url'] = '/';
		$data['Breadcrums'][1]['title'] = 'Tables';
		$data['Breadcrums'][1]['url'] = '/';
		$data['Breadcrums'][2]['title'] = 'List';
		$data['table_title'] = 'Page List View';
		$value=array('mod_id','mod_name','mod_title','mod_des','mod_tip');
		$mod= DB::table('modules_mds')->select($value)->get(); 
		$data['table_head']= $value;
		$count_arr=count($value);
		
		$data['table_head'][$count_arr] = 'EDIT';
		$data['table_head'][$count_arr+1] = 'DELETE';
		
		
		foreach ($mod as $j=>$m)
		{
			 
			for($i=0;$i<($count_arr+2);$i++){
			
				if($data['table_head'][$i]!='EDIT'&&$data['table_head'][$i]!='DELETE')
				{
					
					$data['table_content'][$j][$i] = $m->{$value[$i]} ;
					$data['table_content_url'][$j][$i] = '';
				}
				else
				{
					if($data['table_head'][$i]=='EDIT')
					{
						$data['table_content'][$j][$i] = $data['table_head'][$i];
						$data['table_content_url'][$j][$i] = '/edituser/'.$m->{$value[0]};
					}
					if($data['table_head'][$i]=='DELETE')
					{
						$data['table_content'][$j][$i] = $data['table_head'][$i];
						$data['table_content_url'][$j][$i] = '/deleteuser/'.$m->{$value[0]};
					}
				}
			}
		}
		$res=$data;
		 return view($this->layout,compact('res'));
    }
    public function showProfile()
    {
        //$this->layout->content = View::make('user.profile');
		 return view('pageone', ['name' => 'James']);
    }

    public function showProfile3()
    {
         $result['mod'] = DB::table('modules_mds')->where('m_id','=',1)->get(); 
		 return view('welcome', $result);
    }
    public function showProfile2()
    {
        //$this->layout->content = View::make('user.profile');
		return Redirect::to('load3');
    }

}