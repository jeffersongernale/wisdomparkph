<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrgChart extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function get_orgchart($condition = [0])
    {
        $this->db->where($condition);
        $this->db->select('*');
        $this->db->from('organizational_chart');
        return $this->db->get()->result_array();
    }

    public function insert_org_chart($data)
    {
        return $this->db->insert('organizational_chart',$data);
    }

    public function update_org_chart($data,$condition)
    {
        $this->db->where($condition);
        return $this->db->update('organizational_chart',$data);
    }

    public function delete_org_chart($condition)
    {
        $this->db->where($condition);
        return $this->db->delete('organizational_chart');
    }

    
}