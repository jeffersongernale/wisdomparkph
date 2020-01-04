<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_users($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result_array();
    }


    public function insert_user($data)
    {

        return $this->db->insert('users',$data);
    }


    public function delete_user($data)
    {
        $this->db->where($data);
        return $this->db->delete('users');

    }

    public function update_user($data,$condition)
    {
        $this->db->where($condition);
        return $this->db->update('users',$data);
    }
    
   
}