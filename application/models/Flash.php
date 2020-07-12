<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flash extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_flash()
    {
        // $this->db->where('section', 'about');
        $this->db->select('*');
        $this->db->from('flash');
        return $this->db->get()->result_array();
    }

 


  
  
    
   
}