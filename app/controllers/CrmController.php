<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrmController
 *
 * @author frankent
 */
class CrmController extends BaseController {

    protected $layout;
    private $auth;

    public function __construct() {
        $this->auth = Session::get('auth');
        if (!$this->auth) {
            Redirect::to('/');
        } else {
            $this->layout = "layouts.main";
        }
    }

    public function getDashboard() {
        $this->layout->title = "Welcome";
        $this->layout->content = View::make('crm.welcome');
    }

}
