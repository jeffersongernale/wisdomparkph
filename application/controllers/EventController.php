<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Events');
        $this->load->model('EventAttendance');
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
                'event_date'    => $post['txt_date_event'],
                'image'         => $new_name,
                'section'       => $post['slc_section'],
            ];
    
            $result = $this->Events->insert_event($data);
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
            'event_date' => $post['event_date'],
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
}
