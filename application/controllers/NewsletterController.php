<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class NewsletterController extends CI_Controller {


    public $page_data = [];
    public $mail;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Newsletter');
        $this->load->library('Mailer');
        $this->load->helper('Mail_config');
        $this->mail = mail_config();
    }
    
    
    public function send_phpmailer()
    {
        
        $body = '
        <div style="font-family:Calibri">
        <br>
        <br>
        Greetings!
        <br>
        <br>
        We have new upcoming events posted in our website. Come and visit the link below to check the complete details of our events. 
        <br><br>
        <div style=" text-align: center;">
        <a href="#" style="background-color: #532782;color: white !important; padding: 10px;font-weight: bold; border-radius: 5px;margin: 0 auto;text-decoration: none;">VISIT US!</a>
        </div>
        
        <br>
        If the above link don\'t work, please click this link to redirect you to our website<br>
        <a href="#">Widom park link</a>
        <br><br>
        See you!
        <br>
        
        "The Gift of Dharma excels all other gifts." - DHAMMAPADA 354
        <br><br>
        Regards, <br>
        <b>Wisdom Park Philippines</b><br>
        <i>"Promoting Human Values through Education"</i>
        <br><br>
        <div style="border: 1px solid gray; padding: 10px; font-size: 12px">
        Why receiving this email? You subscribed to our website to see the latest updates and information about wisdom park.<br>
        Click this <a href="#">Unsubscribed</a> link to stop receiving email from our website.
        </div>
        </div>
        
        ';

            // $mail->AddAddress('jefferson.gernale@ph.fujitsu.com');
            $this->mail->AddAddress('jepgernale@gmail.com');

            $this->mail->Subject  = "Wisdom Park News";
            $this->mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            $this->mail->WordWrap   = 80;

            $this->mail->MsgHTML($body);

            $this->mail->IsHTML(true);

        
        $this->output->set_content_type('application/json')->set_output(json_encode($this->mail->Send()));
        
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
        


      