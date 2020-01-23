<?php

require('PHPMailerAutoload.php');

class MailUtility {

    public $mail;

    function __construct() {
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = TRUE;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port = 587;
        $this->mail->Username = "";
        $this->mail->Password = "";
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Mailer = "smtp";
        $this->mail->SetFrom("avi.rajguru.test@gmail.com", "Avi Rajguru");
        $this->mail->AddReplyTo("avi.rajguru.test@gmail.com", "PHPPot");
    }

    function sendMail($toList, $subject, $message) {
        if(is_array($toList)){
            foreach ($toList as $to) {
                $this->mail->AddAddress($to);
            }
        }else{
            $this->mail->AddAddress($toList);
        }
        
        $this->mail->Subject = $subject;
        $this->mail->WordWrap = 80;
        $this->mail->MsgHTML($message);
        $this->mail->IsHTML(true);
        if (!$this->mail->Send())
            return FALSE;
        else
            return TRUE;;
    }

}
