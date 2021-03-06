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
            
            return redirect('https://wisdomparkph.com/admin-details');
            // return redirect('http://localhost/wisdomparkph/admin-details');
        }
        else
        {
            return redirect('https://wisdomparkph.com/login?error=true');
            // return redirect('http://localhost/wisdomparkph/login?error=true');
            
        }   

    }
    
    public function sign_out()
    {
        $array_items = ['wp_username'];
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }



}
