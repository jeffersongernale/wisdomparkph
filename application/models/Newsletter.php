<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_newsletter($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('newsletter');
        return $this->db->get()->result_array();
    }


    public function delete_newsletter($condition)
    {
        $this->db->where($condition);
        return $this->db->delete('newsletter');
    }

 
   
   
}