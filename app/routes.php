<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::filter('preAuth', function() {
    $auth = Session::get('auth');
    if ($auth) {
        return Redirect::to('crm/dashboard');
    }
});

Route::filter('postAuth', function() {
    $auth = Session::get('auth');
    if (!$auth) {
        return Redirect::to('/');
    }
});


//Route::get('/', array("before" => 'preAuth', 'uses' => "HomeController@showLogin"));
Route::controller('api', 'ApiController');

Route::group(array('before' => 'preAuth'), function() {
    Route::get('/', "HomeController@showLogin");
});

Route::group(array('before' => 'postAuth'), function() {
    Route::controller('crm', 'CrmController');
});

