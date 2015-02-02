<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiController
 *
 * @author frankent
 */
class ApiController extends BaseController {

    public function getIndex() {
        return "index";
    }

    public function postLogin() {
        $resp = array();
        $resp['status'] = 'fail';

        $username = Input::get('username', null);
        $password = md5(Input::get('password', null));
        $data = DB::table('users')->select('username', 'uid')->where('username', $username)->where('password', $password)->get();

        if ($data) {
            $resp['status'] = "success";
            $resp['url'] = url('crm/dashboard');
            Session::put('auth', $data);
        }

        return json_encode($resp);
    }

    public function getDebug() {
        $session = Session::get('auth');
        print_r($session);
    }

}
