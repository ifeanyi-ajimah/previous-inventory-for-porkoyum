<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
use App\State;
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
        $orders = $woocommerce->get($endpoint);

        foreach ($orders as $key => $value) {
            $onlineCustomerName = $value->billing->first_name.' '.$value->billing->last_name;
            $customer = Customer::where('name',"Peter Okafor")->first();
            if (!$customer) {
                //customers not in the database
                $onlineCustomerPhone = $value->billing->phone;

                $onlineCustomerAddress = $value->billing->address_1.', '.($value->billing->address_2!=''?$value->billing->address_2.', ':'').$this->stateCode($value->billing->state);

                $newCustomer = new Customer;
                $newCustomer->name = $onlineCustomerName;
                $newCustomer->address = $onlineCustomerAddress;
                $newCustomer->phone_no = $onlineCustomerPhone;
                $newCustomer->save();

                $onlineCustomerID = $newCustomer->id;
            } else {
                $onlineCustomerID = $customer->id;
            }
        }

        return view('pee', ['users' => $onlineCustomerID, 'endpoint' => $endpoint]);
    }

    public function stateCode($iso_code)
    {
        if ($iso_code!='') {
            $state = State::where('iso_code', $iso_code)->first();
            return $state;
        }
    }
}
