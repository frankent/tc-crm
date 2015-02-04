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
        $this->layout->title = "Dashboard";
        $this->layout->content = View::make('crm.welcome');
    }

    public function getClient() {
        $this->layout->title = "All Client";
        $data['client'] = DB::table('client')->orderBy('create_date', 'asc')->get();
        $data['today'] = time();
        $this->layout->content = View::make('crm.allclient', $data);
    }

    public function getCreateclient() {
        $this->layout->title = "Create Client";
        $this->layout->content = View::make('crm.createclient');
    }

    public function getClientinfo($client_id) {
        return $client_id;
    }

}
