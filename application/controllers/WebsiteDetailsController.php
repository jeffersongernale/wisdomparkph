<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsiteDetailsController extends CI_Controller {

    private $mail;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Details');
        $this->load->model('Facilities');
        $this->load->model('Events');
        $this->load->model('EventLinks');
        $this->load->model('OrgChart');
        $this->load->model('Flash');
        $this->load->library('Mailer');
        $this->load->helper('Mail_config');
        $this->mail = mail_config();
    }

    public function get_details()
    {
        $result = $this->Details->get_details();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function get_facilities_details()
    {
        $result = $this->Facilities->get_details();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function get_events_details()
    {
        $get = $this->input->get();
        $condition = [];
        if(!empty($get))
        {
            $condition = ['section' => $get['section']];
         
        }
        $result = $this->Events->get_events($condition);
        $links = $this->EventLinks->get_event_links();

     
        foreach($result as $key =>$value)
        {
            $result[$key]['link'] = [];

            foreach($links as $val)
            {
                if($val['event_id'] == $value['id'])
                {
                $result[$key]['link'][] = $val['link'];
                }
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function get_orgchart()
    {
        $result = $this->OrgChart->get_orgchart();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function send_mail()
    {
        $post = $this->input->post();

            $body = '
            <div style="font-family:Calibri">
            <br>
            <br>
            Greetings!
            <br><br>
            This is the wisdom park website. A client has a message for you. Please see below information.
            <br>
            <br>
            <div style="border: solid 1px gray; padding: 10px">
                <b>FIRSTNAME: </b>'.$post['firstname'].'<br>
                <b>LASTNAME: </b>'.$post['lastname'].'<br>
                <b>EMAIL: </b>'.$post['email'].'<br>
                <b>SUBJECT: </b>'.$post['subject'].'<br>
                <b>MESSAGE: </b>'.$post['message'].'<br>
            </div>
            <br><br>
            Do not reply on this message. Use the Information above to contact or reply to this message.
            <br><br>
            Regards, <br>
            <b>Wisdom Park Philippines</b><br>
            <i>"Promoting Human Values through Education"</i>
            <br>
            </div>
            ';
            

            // $mail->AddAddress('jefferson.gernale@ph.fujitsu.com');
            $this->mail->AddAddress('wisdompark@gmail.com');

            $this->mail->Subject  = "Wisdom Park - Client Message";
            $this->mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            $this->mail->WordWrap   = 80;

            $this->mail->MsgHTML($body);

            $this->mail->IsHTML(true);

        
        $this->output->set_content_type('application/json')->set_output(json_encode($this->mail->Send()));
    }

    public function get_flash()
    {
        $result = $this->Flash->get_flash();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
  
	

}
