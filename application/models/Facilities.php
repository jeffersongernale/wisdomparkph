<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilities extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_details($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('facilities');
        return $this->db->get()->result_array();
    }

    public function insert_facilities($data)
    {
        return $this->db->insert('facilities',$data);
    }

  
    
   
}