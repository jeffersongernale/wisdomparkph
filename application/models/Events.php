<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_events($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('events');
        return $this->db->get()->result_array();
    }

    public function get_section($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('DISTINCT(section)');
        $this->db->from('events');
        return $this->db->get()->result_array();
    }

    public function insert_event($data)
    {
       return $this->db->insert('events',$data);
    }

    public function delete_event($condition)
    {  
        $this->db->where($condition);
        return $this->db->delete('events');
    }

    public function update_event($condition,$data)
    {
        $this->db->where($condition);
        return $this->db->update('events',$data);
    }

  
    
   
}