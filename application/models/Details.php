<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_details($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('details');
        return $this->db->get()->result_array();
    }

    public function update_details($condition,$data)
    {   
        $this->db->where($condition);
        return $this->db->update('details',$data);
    }

    public function insert_details($data)
    {
       return $this->db->insert('details',$data);
    }
    public function delete_details($data)
    {
        $this->db->where($data);
       return $this->db->delete('details');
    }
    
   
}