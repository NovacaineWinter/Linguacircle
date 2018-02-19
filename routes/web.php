<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	if (Auth::check()) {
	    
	    // The user is logged in...
    	return redirect('/home');

	}else{		

		//user is not logged in
    	return view('outside.outsideMasterTemplate')->with('user',Auth::user());

	}

});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

});

Route::get('/ajaxContent', 'insideAjaxPageload@index');