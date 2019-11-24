<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function facilities()
	{
		$this->load->view('facilities');
	}

	public function gallery()
	{
		$this->load->view('gallery');
	}

	public function events()
	{
		$data = $this->input->get();
		$this->load->view('events',$data);
	
	}


	public function admin_details()
	{
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/admin_details.php', null, TRUE);
		$page_data['custom_script']='<script src="asset/scripts/website_details.js"></script>';
		$this->load->view('template/app', $page_data);
	}

	public function admin_gallery()
	{
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/gallery.php', null, TRUE);
		$page_data['custom_script']='<script src="asset/scripts/gallery.js"></script>';
		$this->load->view('template/app', $page_data);
	}

	public function admin_newsletter()
	{
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/newsletter.php', null, TRUE);
		$page_data['custom_script'] = '';
		$this->load->view('template/app', $page_data);
	}

}
