<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLinks extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function insert_event_link($data)
    {
        
       return $this->db->insert('event_links',$data);
    
    }

    public function delete_event_link($condition)
    {  
        $this->db->where($condition);
        return $this->db->delete('event_links');
    }
    
    public function get_event_links($condition)
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('event_links');
        return $this->db->get()->result_array();
    }
  
    public function update_event_links($condition,$data)
    {
        $this->db->where($condition);
        return $this->db->update('event_links',$data);
    }
  
    
   
}