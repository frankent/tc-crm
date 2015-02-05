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
        $data['client'] = DB::table('client')->where('client_id', $client_id)->get();
        $data['client'] = $data['client'][0];
        $this->layout->content = View::make('crm.clientinfo', $data);
    }

    public function getEmail($email_id) {
        $data['email_package'] = DB::table('email')->where('email_id', $email_id)->get();
        $data['email_package'] = $data['email_package'][0];
        $data['email_id'] = $email_id;
        $data['client'] = DB::table('client')->orderBy('create_date', 'asc')->get();
        $client_feedback = DB::table('email_feedback')->where('email_id', $email_id)->get();
        $new_client_obj = array();
        foreach ($client_feedback as $each_client) {
            $new_client_obj[$each_client->client_id] = $each_client;
        }
        $data['client_feedback'] = $new_client_obj;
        $this->layout->content = View::make('crm.emailinfo', $data);
    }

//    public function getTestmail() {
//        Mail::send('emails.tcmail', array('content' => 'value'), function($message) {
//            $message->to('frankent@gmail.com', 'Frank1')->subject('Welcome!');
//        });
//        return 5;
//    }

    public function getTestmail($client_id) {
        $client = DB::table('client')->where('client_id', $client_id)->get();
        $data['client'] = $client[0];
        Mail::send('emails.email-1', $data, function($message) {
            $message->to('frankent@gmail.com', 'Frank1')->subject("เรียน {$client[0]->client_name} เรื่อง แจ้งการดูแลระบบเว็บไซต์และงานออกแบบ");
        });
        return View::make('emails.email-1', $data);
    }

    public function getRunmail($email_id) {
        switch ($email_id) {
            case 1:
//                Start text
//                End text
                break;
        }
    }

}
