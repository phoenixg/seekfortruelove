<?php
// 负责管理员登录、注销之类的事情
class Admin_Admin_Controller extends Base_Controller
{
    public $restful = true; 

    public function get_login()
    {
        if ( Session::has('pass') && (Session::get('pass') == 1)) {
            return Redirect::to_route('admin_dashboard');
        }

        Session::forget('pass');
        return View::make('admin.login');
    }

    public function post_login()
    {
        $admin = DB::table('admins')->first();

        if(Hash::check(trim(Input::get('password')), $admin->password))
        {   
            Session::put('pass', 1);
            return Redirect::to_route('admin_dashboard');
        }
        
        return Redirect::to_route('admin_login');
    }

    public function get_logout()
    {
        Session::forget('pass');
        return Redirect::to_route('admin_login');
    }

}


