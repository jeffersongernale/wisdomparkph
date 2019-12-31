<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsiteDetailsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Details');
        $this->load->model('Facilities');
        $this->load->model('Events');
        $this->load->model('OrgChart');
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
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function get_orgchart()
    {
        $result = $this->OrgChart->get_orgchart();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
  
	

}
