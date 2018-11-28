<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;

class ViewSomeController extends Controller
{
    public function index(){
        //$users = DB::connection('mysql2')->select('select * from inventory where id = ?', [1]);
        $woocommerce = new Client(
            'http://wordpress-210253-675094.cloudwaysapps.com',
            'ck_b63b7228463deb67b702fdba74648c62fddfd850',
            'cs_ccf6837143f96cad60a43647de7dbdadd313d4b0',
            [
                'wp_api' => true,
                'version' => 'wc/v2',
            ]
        );
        $endpoint = 'orders';
        $users = $woocommerce->get($endpoint);

        return view('pee', ['users' => $users, 'endpoint' => $endpoint]);
    }
}
