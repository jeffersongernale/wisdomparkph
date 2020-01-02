<?php

function mail_config()
    {
        $mail = new PHPMailer();


        // $mail->IsSMTP();
        // $mail->SMTPDebug   = 0;
        // $mail->Debugoutput = 'html';
        // $mail->Mailer      = "smtp";
        // $mail->SMTPAuth   = false;  
        // $mail->Port       = 25;       
        // $mail->Host       = "10.165.35.105";

        $mail->IsSMTP();

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->SMTPDebug   = 4;
        $mail->Debugoutput = 'html';
        $mail->Mailer      = "smtp";
        $mail->SMTPAuth   = true;  
        $mail->Username   = 'wisdompark.web@gmail.com';  
        $mail->Password   = 'wisdompark00123';  
        $mail->Port       = 587;       
        $mail->Host       = "smtp.gmail.com";
        $mail->SMTPSecure = 'tls';

        $mail->From       = 'wisdompark.web@gmail.com';
        $mail->FromName   = 'WisdomPark';
        return $mail;
    }

    ?>