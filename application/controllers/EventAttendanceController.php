<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventAttendanceController extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->model('EventAttendance');
	}
    
    public function get_event_attendance()
    {

        $result = $this->EventAttendance->get_event_attendance();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));


    }


}
