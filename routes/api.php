<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productcategory/{id}/products', 'ProductCategoryController@products');
Route::get('productcategory/{id}/comms-reps', 'ProductCategoryController@commsReps');

Route::get('accounts', 'OrderController@accounts');

Route::get('customers', 'CustomersController@findall');
Route::get('customers/search', 'CustomerController@search');
Route::get('users/search', 'UserController@search');
Route::get('customers/{customer}', 'CustomerController@find');

Route::get('states', 'InventoryController@getStates');
Route::get('states/{id}/orders', 'InventoryController@getStateOrders');
Route::get('states/{id}/delivery-persons', 'InventoryController@getDeliveryPersons');
Route::get('states/warehouse', 'InventoryController@getStateWarehouse');
Route::get('states/pending', 'InventoryController@getStatePending');

Route::get('delivery-persons', 'DeliveryPersonController@fetchAll');

Route::get('orders/pending', 'OrderController@statePendingOrders');
Route::get('orders/delivered', 'OrderController@stateDeliveredOrders');
Route::patch('orders/{id}/delivery-person/', 'OrderController@assignDeliveryPerson');
Route::post('orders/autodoctor', 'OrderController@autoDoctor');
Route::post('orders/mark-as-delivered', 'OrderController@markAsDelivered');
Route::post('orders/mark-as-pending', 'OrderController@markAsPending');

Route::get('orders/create', 'OrderController@apiStore');
