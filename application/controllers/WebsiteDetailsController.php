<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsiteDetailsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Details');
    }

    public function get_details()
    {
        $result = $this->Details->get_details();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
  
	

}
