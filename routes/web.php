<?php

	use App\User;

	Route::get('clear-cache', function () {
		$exitCode = Artisan::call('config:clear');
		$exitCode = Artisan::call('cache:clear');
		$exitCode = Artisan::call('route:clear');
		$exitCode = Artisan::call('view:clear');
		$exitCode = Artisan::call('config:cache');
		Session::flash('success', 'All Clear');
		echo "DONE";
	});

	Route::get('update-site', function () {
		$data['content'] = 'errors.comming-soon';
		return view('layouts.content', compact('data'));
	});

	Route::get('/', function () {
		return view('admin.admin-login');
	});

	Route::get('add-products', function () {
		$data['content'] = 'admin.product.add_products';
      	return view('layouts.content', compact('data'));
	});

	Auth::routes();
	Route::get('user-profile', 'HomeController@UserProfile');
	Route::any('edit-userprofile', 'HomeController@UpdateProfile');
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('dashboard', 'HomeController@Dashboard');

/* users all routes start */
	Route::any('users', 'HomeController@user_view');
	Route::any('add-user', 'HomeController@add_user');
	Route::any('delete-user/{id}', 'HomeController@user_delete');
/* users all routes End */

/* users all routes start */
	Route::any('customers', 'HomeController@customer_view');
	Route::any('delete-customer/{id}', 'HomeController@customer_delete');
	Route::any('delete-user/{id}', 'HomeController@user_delete');
/* users all routes End */

/* Category Routes Start */
	Route::any('category', 'HomeController@category_view');
	Route::any('add-category', 'HomeController@add_category');
	Route::any('category-detele/{id}', 'HomeController@category_delete');
	Route::any('category-edit/{id}', 'HomeController@category_edit');
/* Category Routes End */

/* Brand Routes Start */
	Route::any('brand', 'HomeController@brand_view');
	Route::any('add-brand', 'HomeController@add_brand');
	Route::any('brand-detele/{id}', 'HomeController@brand_delete');
	Route::any('brand-edit/{id}', 'HomeController@brand_edit');
/* Brand Routes End */

/* Branch Routes Start */
	Route::any('branch', 'HomeController@branch_view');	
	Route::any('add-branch', 'HomeController@add_branch');
	Route::any('branch-edit/{id}', 'HomeController@branch_edit');
	Route::any('branch-delete/{id}', 'HomeController@branch_delete');
/* Branch Routes End */

/* Products Routes Start */
	Route::any('add/product', 'ProductController@add_product');
	Route::any('product', 'ProductController@view_product');
	Route::any('add-product', 'ProductController@add_product');					
	Route::any('product-detele/{id}', 'ProductController@delete_product');
	Route::any('product-edit/{id}', 'ProductController@product_edit');
	Route::any('edit/product', 'ProductController@edit_products');
	Route::any('useremail/{y}', 'ProductController@useremail');
/* Products Routes End */

/* main_specification Routes Start */
	Route::any('main_specification', 'HomeController@main_specification_view');
	Route::any('add-main-specification', 'HomeController@add_main_specification');		
	Route::any('mainspeci-edit/{id}', 'HomeController@main_specification_edit');			
	Route::any('mainspeci-delete/{id}', 'HomeController@mainspeci_delete');	
/* main_specification Routes End */

/* Engine Key Routes Start */
	Route::any('engine', 'HomeController@engine_key_view');
	Route::any('add-engine-specification', 'HomeController@add_engine_key');		
	Route::any('engine-key-edit/{id}', 'HomeController@engine_key_edit');			
	Route::any('engine-delete/{id}', 'HomeController@engine_key_delete');	
/* Engine Key Routes End */

/* Chasis Key Routes Start */
	Route::any('chasis', 'HomeController@chasis_key_view');
	Route::any('add-chasis-key', 'HomeController@add_chasis_key');		
	Route::any('chasis-key-edit/{id}', 'HomeController@chasis_key_edit');			
	Route::any('chasis-delete/{id}', 'HomeController@chasis_key_delete');	
/* Chasis Key Routes End */

/* super-confortable Key Routes Start */
	Route::any('super-confortable', 'HomeController@supe_confort_key_view');
	Route::any('add-supe-confor-key', 'HomeController@add_supe_confort_key');		
	Route::any('supe_confort-key-edit/{id}', 'HomeController@supe_confort_edit');			
	Route::any('supe_confort_delete/{id}', 'HomeController@supe_confort_delete');	
/* super-confortable Key Routes End */

/* Chasis Key Routes Start */
	Route::any('multi-secuarity', 'HomeController@mlt_secuarity_key_view');
	Route::any('add_mlt_secuarity_key', 'HomeController@add_mlt_secuarity_key');		
	Route::any('mlt_secuarity_edit/{id}', 'HomeController@mlt_secuarity_edit');			
	Route::any('mlt_secuarity_delete/{id}', 'HomeController@mlt_secuarity_delete');	
/* Chasis Key Routes End */ 

/* Chasis Key Routes Start */
	Route::any('entertainment_view', 'HomeController@entertainment_view');
	Route::any('add_entertainment_key', 'HomeController@add_entertainment_key');		
	Route::any('entertainment_edit/{id}', 'HomeController@entertainment_edit');			
	Route::any('entertainment_delete/{id}', 'HomeController@entertainment_delete');	
/* Chasis Key Routes End */

/* City Key Routes Start */
	Route::any('city_view', 'HomeController@city_view');
	Route::any('add-city', 'HomeController@add_city');		
	Route::any('entertainment_edit/{id}', 'HomeController@entertainment_edit');			
	Route::any('city-delete/{id}', 'HomeController@city_delete');	
/* City Key Routes End */