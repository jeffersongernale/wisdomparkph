<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventAttendance extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


  

    public function insert_event_attendance($data)
    {
       return $this->db->insert('event_attendance',$data);
    }
   
}