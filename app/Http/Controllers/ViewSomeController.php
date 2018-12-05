<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
use App\State;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;

class ViewSomeController extends Controller
{
    public function index(){
        //$users = DB::connection('mysql2')->select('select * from inventory where id = ?', [1]);
        $website_url = 'https://porkoyum.com';
        $woocommerce = new Client(
            $website_url,
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
            $customer = Customer::where('name',$onlineCustomerName)->first();
            if (!$customer) {
                //customers not in the database
                $onlineCustomerPhone = $value->billing->phone;

                $onlineCustomerAddress = $value->billing->address_1.', '.($value->billing->address_2!=''?$value->billing->address_2.', ':'').$this->stateCode($value->billing->state)->name;

                $newCustomer = new Customer;
                $newCustomer->name = $onlineCustomerName;
                $newCustomer->address = $onlineCustomerAddress;
                $newCustomer->phone_no = $onlineCustomerPhone;
                $newCustomer->url = $website_url;
                $newCustomer->save();

                $online['customer_id'] = $newCustomer->id;
            } else {
                $online['customer_id'] = $customer->id;
            }
            //delivery address
            if ($value->shipping->address_1=="") {
                // use billing address
                $online['delivery_address'] = $value->billing->address_1.', '.($value->billing->address_2!=''?$value->billing->address_2.', ':'').$this->stateCode($value->billing->state)->name;
            } else {
                $online['delivery_address'] = $value->shipping->address_1.', '.($value->shipping->address_2!=''?$value->shipping->address_2.', ':'').$this->stateCode($value->shipping->state)->name;
            }
            //for states
            $online['state_id'] = $this->stateCode($value->billing->state)->id;
            //for products
            foreach ($value->line_items as $line_item) {
                $theProduct = Product::where('product_name', $line_item->name)->first();
                $online['product_id'] = $theProduct->id;
                $online['quantity'] = $line_item->quantity;
                $online['value'] = $line_item->total;

                //save the order
                $theOrder = new Order;
                $theOrder->customer_id = $online['customer_id'];
                $theOrder->product_id = $online['product_id'];
                $theOrder->quantity = $online['quantity'];
                $theOrder->state_id = $online['state_id'];
                $theOrder->value = $online['value'];
                $theOrder->delivery_address = $online['delivery_address'];
                $theOrder->created_by = User::where('name', 'website')->first()->id;
                //status
                if ($value->status=="Cancelled") {
                    $theOrder->cancelled = 1;
                } elseif ($value->status=="Completed") {
                    $theOrder->delivered = 1;
                }
                $theOrder->save();
            }

        }

        return view('pee', ['users' => $orders, 'endpoint' => $endpoint]);
    }

    public function stateCode($iso_code)
    {
        if ($iso_code!='') {
            $state = State::where('iso_code', $iso_code)->first();
            return $state;
        }
    }
}
