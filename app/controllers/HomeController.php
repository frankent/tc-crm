<?php

class HomeController extends BaseController {

    protected $layout;

    public function __construct() {
        $this->layout = "layouts.plain";
    }

    public function showLogin() {
        $this->layout->title = "Welcome";
        $this->layout->content = View::make('crm.login');
    }

}
