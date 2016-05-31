<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController; 

use Illuminate\Http\Request;

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
    public function showProfile()
    {
        //$this->layout->content = View::make('user.profile');
		 return view('pageone', ['name' => 'James']);
    }

}