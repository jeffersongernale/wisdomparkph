<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function validate($condition)
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    
   
}