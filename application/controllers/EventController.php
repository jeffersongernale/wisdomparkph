<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Events');
    }

    public function get_section()
    {
        
        $result = $this->Events->get_section();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function insert_event()
    {

        $post = $this->input->post();
        $result = $this->Events->insert_event($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_event()
    {
        $post = $this->input->post();

        $result  = $this->Events->delete_event($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function update_event()
    {
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
}
