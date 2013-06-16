<?php
// 管理员要做的一切事
class Admin_Dashboard_Controller extends Base_Controller
{
	public $restful = true;

	
	public function __construct() {
		$this->filter('before', 'auth_admin');
	}
	
	// 显示管理员控制面板的主页
	public function get_index()
	{
		return View::make('admin.panelindex')
			->with('menuflg_index', true);
	}

	public function get_userverify()
	{
		return View::make('admin.paneluserverify')
			->with('menuflg_index', true);
	}

	public function get_examine()
	{
		return 'examine';
	}


}


