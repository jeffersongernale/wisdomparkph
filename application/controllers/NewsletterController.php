<?php
        defined('BASEPATH') OR exit('No direct script access allowed');
  
        
        class NewsletterController extends CI_Controller {
        
        
            public $page_data = [];
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model('Login');
                $this->load->library('Mailer');
            }
            
            public function send_email()
            {
                $this->load->library('email');
        
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                
                $this->email->initialize($config);
                $this->email->from('your@example.com', 'Your Name');
                $this->email->to('jefferson.gernale@ph.fujitsu.com');
        
                $this->email->subject('Email Test');
                $this->email->message('Testing the email class.');
        
                $this->email->send();
        
                //codeigniter mail
        
            }
        
            public function send_phpmailer()
            {
                // $mail = new PHPMailer();
                // $mail->isSMTP();
                // $mail->Host = '10.164.'();
                // $mail->SMTPAuth = false;
                // $mail->Username = 'sender@example.com';
                // $mail->Password = 'password';
        
        
                // $mail = new PHPMailer;
                // $mail->isSMTP();
                // $mail->SMTPDebug   = 0;
                // $mail->Debugoutput = 'html';
                // $mail->Mailer      = "smtp";
                // $mail->SMTPAuth    = false;                 
                // $mail->Port        = 25;                    
                // $mail->Host        = "10.165.35.105"; 
        
                // $mail->setFrom('sender@example.com');
                // $mail->addAddress('jefferson.gernale@ph.fujitsu.com');
                // $mail->Subject = 'Here is the subject';
                // $mail->Body    = 'This is the body.';
                // $mail->send();
        
                // try {
        
        
                $mail = new PHPMailer();
        
        
                $mail->IsSMTP();
                $mail->SMTPDebug   = 0;
                $mail->Debugoutput = 'html';
                $mail->Mailer      = "smtp";
                $mail->SMTPAuth   = false;  
                $mail->Port       = 25;       
                $mail->Host       = "10.165.35.105";
        
        
        
                // $mail->AddReplyTo("johnpaulo.bonagua@ph.fujitsu.com","PAU");
                $mail->From       = "PMMS@ph.fujitsu.com";
                $mail->FromName   = "PMMS";
        
        
                $body = 'testing';
        
                $mail->AddAddress('jefferson.gernale@ph.fujitsu.com');
        
        
        
                    $mail->Subject  = "wew";
                    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
                    $mail->WordWrap   = 80;
        
                    $mail->MsgHTML($body);
        
                    $mail->IsHTML(true);
        
                    
                // 	echo 'Message has been sent.';
                // } catch (phpmailerException $e) {
                // 	echo $e->errorMessage();
                // }
                $this->output->set_content_type('application/json')->set_output(json_encode($mail->Send()));
               
            }
        
        }
        


      