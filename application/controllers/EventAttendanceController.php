<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventAttendanceController extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->model('EventAttendance');
        $this->load->model('Newsletter');
        $this->load->library('Mailer');
        $this->load->helper('Mail_config');
        $this->mail = mail_config();
	}
    
    public function get_event_attendance()
    {

        $result = $this->EventAttendance->get_event_attendance();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function send_announcement()
    {
        

        $post = $this->input->post();
        
            $body = $post['message'];
            
            // $mail->AddAddress('jefferson.gernale@ph.fujitsu.com');
            $this->mail->AddAddress($post['recipient']);

            $this->mail->Subject  = "Wisdom Park News - ".$post['subject'];
            $this->mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            $this->mail->WordWrap   = 80;

            $this->mail->MsgHTML($body);

            $this->mail->IsHTML(true);

        
        $this->output->set_content_type('application/json')->set_output(json_encode($this->mail->Send()));

    
      
        
    }

}
