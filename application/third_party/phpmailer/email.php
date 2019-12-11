<?php 

require 'class.phpmailer.php';


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Mailer = "smtp";
$mail->SMTPAuth = false; 
$mail->Port = 25; 
$mail->Host = "10.165.35.105"; 


$mail->setFrom('riza.palmaria@ph.fujitsu.com','Riza');


$mail->AddBCC('markjay.mercado@ph.fujitsu.com');

$mail->isHTML(true);
$mail->Subject = 'Trouble Report Detect';
$mail->Body = '<a href="http://10.164.22.46/pqh1.5/pages/prod_request">Link</a> email';
$result = $mail->send();

if($result == 1){
    echo "send";
}else{
    echo "not Send";
}

?>