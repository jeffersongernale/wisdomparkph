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

    public function get_event_attendance()
    {

        $this->db->select('SUM(a.head_count) as total, b.title,b.description,b.event_date,b.image, a.email');
        $this->db->from('event_attendance a');
        $this->db->join('events b','b.id = a.event_id', 'left');
        $this->db->group_by('a.event_id');
        return $this->db->get()->result_array();
        

         
    }
   
}