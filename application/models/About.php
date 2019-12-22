<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_about_count()
    {
        $this->db->where('section', 'about');
        $this->db->select('*');
        $this->db->from('details');
        return $this->db->get()->num_rows();
    }

 
  
    public function get_bySequence($data)
    {
        $this->db->where('section', 'about');
        $this->db->where('sequence_number', $data);
        $this->db->select('*');
        $this->db->from('details');
        return $this->db->get()->num_rows();
    }

  
  
    
   
}