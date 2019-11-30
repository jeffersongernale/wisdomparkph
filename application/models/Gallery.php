<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_gallery($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('gallery');
        return $this->db->get()->result_array();
    }


    public function insert_gallery($data)
    {
        return $this->db->insert('gallery',$data);
    }
    public function delete_gallery_photo($data)
    {
        $this->db->where($data);
        return $this->db->delete('gallery');
    }

   
   
}