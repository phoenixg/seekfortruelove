<?php

class Batch_Controller extends Base_Controller
{
    public $restful = true;

    public function get_sendmail()
    {
        set_time_limit(0);
        $mailer = Laravel\IoC::resolve('mailer');
        $messageBody = file_get_contents('/srv/www/seekfortruelove.org/public_html/material/email-template/1.html');

        $emails = explode(PHP_EOL, file_get_contents('/srv/www/seekfortruelove.org/public_html/material/emails/20130611_1.txt'));
       
        foreach ($emails as $index => $email) {
            // 发送激活邮件
            $message = Swift_Message::newInstance('一个定位于上海的免费婚恋交友平台：seekfortruelove.org')
                        ->setFrom(array(Config::get('application.mail_account') => 'SEEKFORTRUELOVE'))
                        ->setTo(array($email => $email))
                        ->setBody($messageBody,'text/html');

            $status = $mailer->send($message);
            var_dump($status);// 成功就是1    
        }


        

        

    }


}
