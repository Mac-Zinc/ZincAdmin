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
		 return view($this->layout,['Site_name' => 'Zinc Admin','Site_favicon' => 'Favicon.ico']);
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