<?php

class Batch_Controller extends Base_Controller
{
	public $restful = true;

	public function get_sendmail()
	{
		$mailer = Laravel\IoC::resolve('mailer');

		$messageBody = file_get_contents('../../material/email-template/1.html');
		var_dump($messageBody);die;

		// 发送激活邮件
		$message = Swift_Message::newInstance('一个定位于上海的免费婚恋交友平台：seekfortruelove.org')
				    ->setFrom(array(Config::get('application.mail_account') => 'SEEKFORTRUELOVE'))
				    ->setTo(array('2814258914@qq.com' => '对方的昵称或者邮件地址'))
				    ->setBody($messageBody,'text/html');

		$status = $mailer->send($message);
		var_dump($status);
	}


}
