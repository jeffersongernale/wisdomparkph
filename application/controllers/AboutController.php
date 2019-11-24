<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Details');
    }

    public function insert_details()
    {
        $post = $this->input->post();
        $result = $this->Details->insert_details($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_details()
    {
        $post = $this->input->post();
        $result = $this->Details->delete_details($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }


    public function update_mission()
    {
        $post       = $this->input->post();
        $conditions = ['section' => 'mission'];
        $data       = ['description' => $post['description']];
        $result     = $this->Details->update_details($conditions,$data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function update_vision()
    {
        $post       = $this->input->post();
        $conditions = ['section' => 'vision'];
        $data       = ['description' => $post['description']];
        $result     = $this->Details->update_details($conditions,$data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function update_goals()
    {
        $post = $this->input->post();
        $conditions = ['id' => $post['id']];
        $data = ['description' => $post['description']];
        $result = $this->Details->update_details($conditions,$data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
  
    public function update_faqs()
    {
        $post = $this->input->post();
        $conditions = ['id' => $post['id']];
        $data = [
            'description' => $post['description'],
            'answer'      => $post['answer']
        ];
        $result = $this->Details->update_details($conditions,$data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function insert_faqs()
    {
        $post = $this->input->post();
        $result = $this->Details->insert_goals($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

}
