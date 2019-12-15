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

        if(count($result) == 1)
        {
            $this->session->set_userdata([
                'wp_username' => $result['0']['username'],
            ]);
            
            return redirect(base_url('admin-details'));
        }
        else
        {
            return redirect(base_url('login?error=true'));
        }   

    }
    
    public function sign_out()
    {
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }



}
