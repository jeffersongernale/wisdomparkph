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
            
          
            public function send_phpmailer()
            {
               
        
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
        
              
                $this->output->set_content_type('application/json')->set_output(json_encode($mail->Send()));
               
            }
        
        }
        


      