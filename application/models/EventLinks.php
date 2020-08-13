<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLinks extends CI_Model {

    public function __construct()
	{
		parent::__construct();
	}


    public function insert_event($data)
    {
        
       return $this->db->insert('event_links',$data);
    
    }

 
 
  
  
    
   
}