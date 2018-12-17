<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrAppController extends Controller
{
    public function hrregistration(){

    	/*return [
    		'registertoken' => str_random(10),
    	];*/

    	$rand = str_random(10);
    	return json_encode($rand);
    }

    public function hrlogin()
    {
    	$rand = str_random(10);
    	return json_encode($rand);
    }


}
