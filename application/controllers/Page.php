<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {


	public $page_data = [];

	public function index()
	{
	
		$this->load->view('index');

	}

	public function login()
	{
		$this->load->view('login');
	}

	public function admin_home()
	{
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/admin_home.php', null, TRUE);
		$this->load->view('template/app', $page_data);
	}

	public function login2()
	{
		$this->load->view('login2');
	}

}
