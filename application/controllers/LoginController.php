<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Login');
		
	}
	public function login_submit()
	{
        $post = $this->input->post();
        
        $data = [
            'username' => $post['txt_username'],
            'password' => $post['txt_password']
        ];


        $result = $this->Login->validate($data);
        if(count($result) > 0)
        {
            redirect('/');
        }
      
        // $this->output->set_content_type('application/json')->set_output(json_encode(count($result)));
        

	}



}
