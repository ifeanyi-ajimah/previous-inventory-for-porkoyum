<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () { return view('welcome'); });

// Route::get('test', 'InventoryController@index');
// Route::get('test-prod/{id}/comms', "ProductCategoryController@commsReps");


Route::get('/home', function () { return redirect('/dashboard'); });

Auth::routes();

Route::post('/register', 'UserController@store')->name('register');

Route::middleware('auth')->group(function (){
	Route::get('/user/changepassword', 'UserController@changePasswordForm');
	Route::put('/changepassword', 'UserController@changePassword')->name('user.changepassword');
	Route::get('/dashboard', function(){
		if(Request::user()->hasRole('admin')){
			return app()->call('App\Http\Controllers\DashboardController@index');
		}
		elseif(Request::user()->hasRole('comms')){
			return app()->call('App\Http\Controllers\CommsExecController@dashboard');
		}
		elseif(Request::user()->hasRole('logistics')){
			return app()->call('App\Http\Controllers\DeliveryPersonController@dashboard');
		}
		elseif(Request::user()->hasRole('inventory')){
			return app()->call('App\Http\Controllers\StockController@dashboard');
		}
		elseif(Request::user()->hasRole('confirmers')){
			return app()->call('App\Http\Controllers\InventoryController@index');
		}
		elseif(Request::user()->hasRole('accounts')){
			return app()->call('App\Http\Controllers\OrderController@accountsView');
		}
		return view('errors.newbie');
	})->name('dashboard');
	
	
	// Routes only Admins should see
	Route::middleware('checkrole:admin')->group(function (){
		Route::get('users/search', 'UserController@search');
		Route::resource('/users', 'UserController');
		Route::resource('/roles', 'RoleController');
		Route::resource('/permissions', 'PermissionController', ['except' => ['show']]);
		Route::resource('/region', 'RegionController', ['except' => ['show', 'delete', 'create']]);
		Route::resource('/deliverypersons', 'DeliveryPersonController', ['except' => ['show', 'delete', 'create']]);

		Route::get('/delivery/{id}', 'DeliveryPersonController@dashboardAdmin');
		Route::get('/orders/deliveries', 'OrderController@allDeliveries');
		Route::get('/orders/sales-report', 'OrderController@salesReport');
		Route::get('/orders/states', 'StateController@states')->name('stateorders');;
		Route::get('/orders/state/{state}', 'StateController@orders');
		Route::get('inventory/accra', 'StockController@accra');
		Route::get('inventory/regions', 'StockController@others');
		Route::get('error-logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
		Route::get('urgentorders', ['uses' => 'OrderByController@urgentOrders', 'as' => 'orders.urgent']);
		Route::get('unconfirmedorders', ['uses' => 'OrderByController@unconfirmedOrders', 'as' => 'orders.unconfirmed']);
		Route::get('undeliveredorders', ['uses' => 'OrderByController@undeliveredOrders', 'as' => 'orders.undelivered']);
		Route::get('confirmedorders', ['uses' => 'OrderByController@confirmedOrders', 'as' => 'orders.confirmed']);
		Route::get('deliveredorders', ['uses' => 'OrderByController@deliveredOrders', 'as' => 'orders.delivered']);
		Route::get('noturgentorders', ['uses' => 'OrderByController@noturgentOrders', 'as' => 'orders.noturgent']);
		

		Route::post('inventory/restock', 'StockController@store')->name('restock');
		Route::post('/attachPermission', 'RoleController@attachPermission')->name('roles.attachPermission');
		Route::post('/custStore', 'CustomerController@storeCustomer')->name('custajax.store');
		
		Route::delete('/productcategories/{category}', 'ProductCategoryController@destroy')->name('productcat.delete');
		Route::delete('products/{product}', ['as' => 'products.destroy', 'uses' => 'ProductController@destroy']);
	});

	// Routes only Cooms should see
	Route::middleware('checkrole:comms-admin,admin')->group(function (){
		Route::resource('/customers', 'CustomerController');
		Route::resource('/commsexecs', 'CommsExecController'); 
	});

	// Routes only Inventory should see
	Route::middleware('checkrole:inventory')->group(function (){
		Route::post('confirm-delivery/{id}', 'OrderController@confirmDelivery');
		Route::post('assign-delivery/{id}', 'OrderController@addDeliveryPerson');
		Route::post('inventoty/restock', 'StockController@store')->name('restock');
		Route::post('confirm-cancellation/{id}', 'OrderController@confirmCancellation');
		Route::post('/region/shipment', 'RegionController@addShipment')->name('new-shipment');
		Route::post('/region/shipment/edit', 'RegionController@editShipment')->name('edit-shipment');
	});

	Route::middleware('checkrole:inventory,admin')->group(function (){
		Route::resource('/states', 'StateController', ['except' => ['show', 'delete', 'create']]);
		Route::get('/productcategories', 'ProductCategoryController@index')->name('productcat.index');
		Route::get('products/{product_id}/edit', ['as' => 'products.edit', 'uses' => 'ProductController@edit']);
		Route::get('/productcategories/{id}/view', 'ProductCategoryController@show')->name('productcat.show');

		Route::put('/productcategories/{id}', 'ProductCategoryController@update')->name('productcat.update');
		Route::put('products/{product_id}', ['as' => 'products.update', 'uses' => 'ProductController@update']);

		Route::post('/productcategories', 'ProductCategoryController@store')->name('productcat.store');
		Route::post('products/{product_cat_id}', ['as' => 'products.store', 'uses' => 'ProductController@store']);


	});

	// Routes only Confirmers should see
	Route::middleware('checkrole:confirmers')->group(function (){
		Route::post('verify-order/{id}', 'OrderController@verifyOrder');
		Route::post('comment-on-order/{id}', 'OrderController@commentOnOrder');
	});

	// Routes only Logistics should see
	Route::middleware('checkrole:logistics')->group(function (){
		Route::get('inventory/shipment', 'StockController@shipment');
		Route::post('inventory/reception/{stock}/', 'StockController@receiveStock');

		Route::post('change-status/{id}', 'OrderController@deliverOrder');
	});

	// Routes only Comms and Admin should see
	Route::middleware('checkrole:comms,admin')->group(function (){
		Route::resource('/orders', 'OrderController');

		Route::get('products/{product_name}/orders', ['uses' => 'ProductController@ordersbyproduct', 'as' => 'product.orders']);
		Route::get('searchByDate', 'DashboardController@searchByDate')->name('orders.searchbydate');

		Route::post('/custStore', 'CustomerController@storeCustomer')->name('custajax.store');

		// Route::get('autodoctor', 'OrderController@getAutoDoctor');
		// Route::post('autodoctor/{order}', 'OrderController@takeAutoDoctorOrder');
	});

	Route::middleware('checkrole:confirmers,logistics')->group(function (){
		Route::post('cancel-order/{id}', 'OrderController@cancelOrder');
	});
});


    
   
