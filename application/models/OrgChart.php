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


}