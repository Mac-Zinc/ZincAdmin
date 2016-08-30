<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController; 

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
class welcome extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';
	var $MasterTemplate_Model,$Template_Model,$ContainerTemplate_Model,$SideBar_Model;
	public function __construct()
		{
			$this->MasterTemplate_Model=new MasterTemplate_Model;
			$this->Template_Model=new Template_Model;
			$this->ContainerTemplate_Model=new ContainerTemplate_Model;
            $this->SideBar_Model=new SideBar_Model;
				
		}
    /**
     * Show the user profile.
     */
    public function index()
    {
        //$this->layout->content = View::make('user.profile');
		if (! Auth::check()) {
            // The user is not logged in...
            return Redirect::to('login');
        }
        $user_info['disp_name']=Auth::user()->firstname_usr;
        $user_info['image_usr']=Auth::user()->image_usr;
        //var_dump($user_info); exit;
		$data_site=$this->MasterTemplate_Model->GenerateSiteTemplate(0);
		$data_page=$this->ContainerTemplate_Model->GeneratePageDetails(0);
		$data_Edit_List=$this->Template_Model->GenerateEditableListTemplate(0);

        $data_side_bar = $this->SideBar_Model->GenerateSideBarTemplate(0);
		$result=array_merge($data_site, $data_page);
		$result=array_merge($result, $data_Edit_List);

        $result=array_merge($result, $data_side_bar);
		$res=$result;
       
		return view($this->layout,compact('res','user_info'));
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