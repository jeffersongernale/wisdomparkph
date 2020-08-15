<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLinksController extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->model('EventLinks');
	}
    
    public function get_event_links()
    {
        $get =  $this->input->get();

        $result = $this->EventLinks->get_event_links($get);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_links()
    {
        $post =  $this->input->post();
        $result = $this->EventLinks->delete_event_link(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function add_links()
    { 
        $post = $this->input->post();
        $result = $this->EventLinks->insert_event_link($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }


    public function update_links()
    { 
        $post = $this->input->post();
        $result = $this->EventLinks->update_event_links(['id' => $post['id']], ['link' => $post['link']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }
    
    

  

}
