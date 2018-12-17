<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrAppController extends Controller
{
    public function hrregistration(){

    	/*return [
    		'registertoken' => str_random(10),
    	];*/

    	$rands = str_random(10);
    	 $rand = json_encode($rands);
         return response()->json($rand,200);
    }

    public function hrlogin()
    {
    	$rands = str_random(10);
         $rand = json_encode($rands);
         return response()->json($rand,200);
    }


}
