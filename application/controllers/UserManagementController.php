<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagementController extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->model('User');
	}
    
    
    public function get_users()
    {

        $result = $this->User->get_users();
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
        
    }

    public function insert_user()
    {
        $post = $this->input->post();

        $data = [
            'name' => $post['name'],
            'username' => $post['username'],
            'password' => $post['password'],
            'created_at' => date('Y-m-d'),

        ];

        $result = $this->User->insert_user($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function delete_user()
    {
        $post = $this->input->post();
        $result = $this->User->delete_user(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function update_user()
    {
        $post = $this->input->post();
        $data = [
            'name' => $post['name'],
            'username' => $post['username'],
            'password' => $post['password']
        ];
        $result = $this->User->update_user($data,['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function get_users_data()
    {  
        $get = $this->input->get();
        $result = $this->User->get_users(['id' => $get['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }


}
