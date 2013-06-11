<?php

class Batch_Controller extends Base_Controller
{
    public $restful = true;

    public function get_sendmail()
    {
        set_time_limit(0);

        //$emails = explode(PHP_EOL, file_get_contents('/srv/www/seekfortruelove.org/public_html/material/emails/20130611_1.txt'));
        //array_pop($emails);

        $emails = array('ada.@ada.com', 'test@test.com');
        foreach ($emails as $index => $email) {
            $email = trim(strtolower($email));
            $email_is_valid  = filter_var($email, FILTER_VALIDATE_EMAIL);
            if(!$email_is_valid) continue;

            $mailer = Laravel\IoC::resolve('mailer');
      
            $messageBody = file_get_contents('/srv/www/seekfortruelove.org/public_html/material/email-template/1.html');

            $message = Swift_Message::newInstance('一个定位于上海的免费婚恋交友平台：seekfortruelove.org')
                        ->setFrom(array(Config::get('application.mail_account') => 'SEEKFORTRUELOVE'))
                        ->setTo(array($email => $email))
                        ->setBody($messageBody,'text/html');

            $status = $mailer->send($message);
            var_dump($status);// 成功就是1    

            unset($mailer);
            unset($messageBody);
        }


        

        

    }


}
