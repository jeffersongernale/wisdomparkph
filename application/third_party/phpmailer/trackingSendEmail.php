<?php 

require 'class.phpmailer.php';

date_default_timezone_set('Asia/Manila');

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Mailer = "smtp";
$mail->SMTPAuth = false; 
$mail->Port = 25; 
$mail->Host = "10.165.35.105"; 

$mail->setFrom('fdtp.system@ph.fujitsu.com','FDTP PQH');


// for ($i=0; $i < count($emails); $i++) {
	$mail->AddBCC('markjay.mercado@ph.fujitsu.com');
	
// }


$mail->isHTML(true);
$mail->Subject = 'Die Maintenance Request / Report Notifier';
$mail->Body    = '***************************************';
$mail->Body   .= '<br> '.$data['pqhOperated'].' having Trouble in:.';
$mail->Body   .= '<br>PARTNUMBER :'.$data['pqhOperated'];
$mail->Body   .= '<br>REV :'.$data['pqhRevNo'];
$mail->Body   .= '<br>JOB NO :'.$data['pqhmanufNum'];
$mail->Body   .= '<br>SUBAREA :'.$data['pqhSubArea'];
$mail->Body   .= '<br>MACHINE :'.$data['pqhMachineUse'];
$mail->Body   .= '<br>PROCESS :'.$data['pqhProcess'];
$mail->Body   .= '<br>***************************************';
$mail->Body   .= '<br>DATE and TIME: '.date("m/d/Y h:i:s a");
$mail->Body   .= '<br>***************************************';

$result = $mail->send();

if($result == 1){
    echo "email sent";
}else{
    echo "email not send";
}

echo "<script>window.close();</script>";
?>