<?php

class Batch_Controller extends Base_Controller
{
	public $restful = true;

	public function get_sendmail()
	{
		$mailer = Laravel\IoC::resolve('mailer');

		$messageBody = '<html><head></head><body>
						您好'.'，<br /><br />

						<p>
						这是一个
						定位于上海
						面向所有单身青年男女
						为对抗当今拜金主义价值观而产生的
						免费婚恋交友平台
						</p>

						<p>
						邀请您加入！
						</p>

						<p>
						点击访问：<a href="http://seekfortruelove.org/" target="_blank">http://seekfortruelove.org/</a>
						</p>

						此致<br />
						SEEKFORTRUELOVE<br />
						此电邮为系统自动发出，请勿回复。如有疑问请发邮件至：heresyseeker@gmail.com<br />
						</body></html>';

		// 发送激活邮件
		$message = Swift_Message::newInstance('一个定位于上海的免费婚恋交友平台：Seekfortruelove.org')
				    ->setFrom(array(Config::get('application.mail_account') => 'SEEKFORTRUELOVE'))
				    ->setTo(array('2814258914@qq.com' => '小馒头'))
				    ->setBody($messageBody,'text/html');

		$status = $mailer->send($message);
		var_dump($status);
	}


}
