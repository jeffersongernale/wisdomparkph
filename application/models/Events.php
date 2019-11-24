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

  
    
   
}