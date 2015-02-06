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

    public function showLandingpage($status) {
        if ($status === "success") {
            //Not feedback yet
            $data['h'] = "สำเร็จ";
            $data['p'] = "ขอบคุณที่ส่ง feedback ถึงเรา";
            $data['s'] = true;
        } else {
            //Already feedback
            $data['h'] = "ไม่สำเร็จ";
            $data['p'] = "คุณได้ทำการส่ง feedback ถึงเราแล้ว";
            $data['s'] = false;
        }
        $this->layout->content = View::make('crm.feedback', $data);
    }

}
