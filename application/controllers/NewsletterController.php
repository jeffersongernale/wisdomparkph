<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class NewsletterController extends CI_Controller {


    public $page_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Newsletter');
        $this->load->library('Mailer');
    }
    
    
    public function send_phpmailer()
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

        

        // $mail->AddReplyTo("johnpaulo.bonagua@ph.fujitsu.com","PAU");
        $mail->From       = 'wisdompark.web@gmail.com';
        $mail->FromName   = 'WisdomPark';


        $body = 'testing';

        // $mail->AddAddress('jefferson.gernale@ph.fujitsu.com');
        $mail->AddAddress('jepgernale@gmail.com');



            $mail->Subject  = "wew";
            $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            $mail->WordWrap   = 80;

            $mail->MsgHTML($body);

            $mail->IsHTML(true);

        
        $this->output->set_content_type('application/json')->set_output(json_encode($mail->Send()));
        
    }

    public function get_newsletter()
    {
        $get = $this->input->get();
        $result = $this->Newsletter->get_newsletter();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function delete_newsletter()
    {
        $post = $this->input->post();
        $result = $this->Newsletter->delete_newsletter(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

}
        


      