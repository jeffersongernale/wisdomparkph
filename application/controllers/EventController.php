<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {

    private $mail;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Events');
        $this->load->model('EventAttendance');
        $this->load->model('Newsletter');
        $this->load->library('Mailer');
        $this->load->helper('mail_config');
        $this->mail = mail_config();
    }

    public function _verify()
    {
        if (!isset($_SESSION['wp_username'])) 
        {
            redirect(base_url('login'));
            die();
        } 
        else 
        {
            return $_SESSION['wp_username'];
        }
    }
    
    public function get_section()
    {
        
        $result = $this->Events->get_section();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function insert_event()
    {
        $this->_verify();
        $post = $this->input->post();
        $config['upload_path']   = './asset/upload/event';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_width']     = '1024';
        $config['max_height']    = '786';
        $new_name                = time().$_FILES["file_event_image"]['name'];
        $config['file_name']     = $new_name;
        $this->load->library('upload',$config);
       

        if( !$this->upload->do_upload('file_event_image'))
        {
            $result = ['error' => $this->upload->display_errors()];
        }
        else
        {
            $img_data = ['upload_data' => $this->upload->data()];
            $data = [
                'title'         => $post['txt_title'],
                'description'   => $post['txt_description'],
                'event_date'    => $post['txt_date_event']." ".$post['txt_time_event'],
                'image'         => $new_name,
                'section'       => $post['slc_section'],
            ];
    
            $result = $this->Events->insert_event($data);
            $this->send_newsletter();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_event()
    {
        $this->_verify();
        $post = $this->input->post();

        $get_file_name = $this->Events->get_events(['id' => $post['id']]);
        $path = './asset/upload/event/'.$get_file_name['0']['image'];
        if(file_exists($path))
        {
            unlink($path);
        }

        $result  = $this->Events->delete_event($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function update_event()
    {
        $this->_verify();
        $post = $this->input->post();

        $condition = ['id' => $post['id']];
        $data = [
            'title' => $post['title'],
            'description' => $post['description'],
            'event_date' => $post['event_date']." ".$post['event_time'],
            'section' => $post['section']
        ];
        $result  = $this->Events->update_event($condition,$data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }


    public function update_events_pic()
    {
        $post = $this->input->post();

        $config['upload_path']   = './asset/upload/event';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_width']     = '1024';
        $config['max_height']    = '786';
        $new_name                = time().$_FILES["file_events_image"]['name'];
        $config['file_name']     = $new_name;

        $this->load->library('upload',$config);


        if( !$this->upload->do_upload('file_events_image'))
        {
            $result = ['error' => $this->upload->display_errors()];
        }
        else
        {
            
            
            $img_data = ['upload_data' => $this->upload->data()];

            $get_file_name = $this->Events->get_events(['id' => $post['id']]);
            $path = './asset/upload/event/'.$get_file_name['0']['image'];
            if(file_exists($path))
            {
                unlink($path);
            }

            
            $data = [
                'image'           => $new_name
            ];
    

            $result = $this->Events->update_event(['id' => $post['id']],$data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function insert_event_attendance()
    {
        $post = $this->input->post();
        $data = [
            'event_id' => $post['event_id'],  
            'name' => $post['name'],  
            'email' => $post['email'],  
            'head_count' => $post['head_count'],  
            'created_at' => date('Y-m-d'),  
        ];
        $result = $this->EventAttendance->insert_event_attendance($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function send_newsletter()
    {
        
    $newsletter = $this->Newsletter->get_newsletter();

    foreach($newsletter as $key => $value)
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
            $this->mail->AddAddress($value['email']);

            $this->mail->Subject  = "Wisdom Park News";
            $this->mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            $this->mail->WordWrap   = 80;

            $this->mail->MsgHTML($body);

            $this->mail->IsHTML(true);

        
        $this->output->set_content_type('application/json')->set_output(json_encode($this->mail->Send()));
    }

      
        
    }
}
