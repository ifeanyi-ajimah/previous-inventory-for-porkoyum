<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewSomeController extends Controller
{
    public function index(){
        $users = DB::connection('mysql2')->select('select * from inventory where id = ?', [1]);

        return view('pee', ['users' => $users]);
    }
}
