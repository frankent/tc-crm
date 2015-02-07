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


Route::get('feedback/{email_id}/{client_id}/{resp}/{resptxt}', function($email_id, $client_id, $resp, $resptxt) {
    $user_feedback = DB::table('email_feedback')->where('client_id', $client_id)->where('email_id', $email_id)->count();
    if ($user_feedback) {
        //Already feedback
        return Redirect::to('landing/feedback/duplicate');
    } else {
        //Don't feedback yet
        $unix = time();
        DB::table('email_feedback')->insert(array('email_id' => $email_id, 'client_id' => $client_id, 'feedback' => $resp, 'feedback_txt' => $resptxt, 'create_date' => $unix));
        return Redirect::to('landing/feedback/success');
    }
});

Route::get('landing/feedback/{status}', 'HomeController@showLandingpage');


//Route::get('/', array("before" => 'preAuth', 'uses' => "HomeController@showLogin"));
Route::controller('api', 'ApiController');

Route::group(array('before' => 'preAuth'), function() {
    Route::get('/', "HomeController@showLogin");
});

Route::group(array('before' => 'postAuth'), function() {
    Route::controller('crm', 'CrmController');
});

