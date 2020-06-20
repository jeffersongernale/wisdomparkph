<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('Plugin');
		$this->load->model('Gallery');
		$this->load->model('Events');
	}

	public function _verify()
    {
        if (!isset($_SESSION['wp_username'])) {
            redirect(base_url('login'));
            die();
        } else {
            return $_SESSION['wp_username'];
        }
	}
	
	public function index()
	{
		$event_section['event_section'] = $this->Events->get_section();

		$this->load->view('index',$event_section);
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function facilities()
	{
		$event_section['event_section'] = $this->Events->get_section();
		$this->load->view('facilities',$event_section);
	}

	public function gallery()
	{
	
		$result['photos'] = $this->Gallery->get_gallery(['section'=>'photos']);
        $result['videos'] = $this->Gallery->get_gallery(['section'=>'videos']);
		$result['songs'] = $this->Gallery->get_gallery(['section'=>'songs']);
		$result['event_section'] = $this->Events->get_section();
		// $this->output->set_content_type('application/json')->set_output(json_encode($result));
		$this->load->view('gallery',$result);
	}

	public function events()
	{
		$data['event_section'] = $this->Events->get_section();
		$data['data'] = $this->input->get();
		$this->load->view('events',$data);
	
	}


	public function admin_details()
	{
		$this->_verify();
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/admin_details.php', null, TRUE);

		$dependency_script = ['datatable','website_details','iziToast'];
		$page_data['custom_script'] = dependencies_script($dependency_script);
		$dependency_css = ['datatable','iziToast'];
		$page_data['custom_css'] = dependencies_css($dependency_css);

		$this->load->view('template/app', $page_data);
	}

	public function admin_gallery()
	{
		$this->_verify();
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/admin_gallery.php', null, TRUE);
		$page_data['custom_script']='';

		$dependency_script = ['datatable','admin_gallery','iziToast'];
		$page_data['custom_script'] = dependencies_script($dependency_script);
		$dependency_css = ['datatable','iziToast'];
		$page_data['custom_css'] = dependencies_css($dependency_css);
		$this->load->view('template/app', $page_data);
	}

	public function admin_newsletter()
	{
		$this->_verify();
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/newsletter.php', null, TRUE);
		
		$dependency_script = ['datatable','admin_newsletter','iziToast'];
		$page_data['custom_script'] = dependencies_script($dependency_script);
		$dependency_css = ['datatable','iziToast'];
		$page_data['custom_css'] = dependencies_css($dependency_css);
		$this->load->view('template/app', $page_data);
	}

	public function admin_events()
	{
		$this->_verify();
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/events.php', null, TRUE);

		$dependency_script = ['datatable','admin_events','iziToast'];
		$page_data['custom_script'] = dependencies_script($dependency_script);
		$dependency_css = ['datatable','iziToast'];
		$page_data['custom_css'] = dependencies_css($dependency_css);

		$this->load->view('template/app', $page_data);
	}

	public function admin_events_attendacnce()
	{
		$this->_verify();
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/events_attendance.php', null, TRUE);

		$dependency_script = ['datatable','admin_events_attendance','iziToast'];
		$page_data['custom_script'] = dependencies_script($dependency_script);
		$dependency_css = ['datatable','iziToast'];
		$page_data['custom_css'] = dependencies_css($dependency_css);

		$this->load->view('template/app', $page_data);
	}

	public function admin_user_mgmt()
	{
		$this->_verify();
		$page_data = $this->page_data;
		$page_data['sidebar']= $this->load->view('template/sidebar.php', null, TRUE);
		$page_data['navbar']= $this->load->view('template/navbar.php', null, TRUE);
		$page_data['page_content']= $this->load->view('admin/user_management.php', null, TRUE);

		$dependency_script = ['datatable','admin_user_mgmt','iziToast'];
		$page_data['custom_script'] = dependencies_script($dependency_script);
		$dependency_css = ['datatable','iziToast'];
		$page_data['custom_css'] = dependencies_css($dependency_css);

		$this->load->view('template/app', $page_data);
	}

}
