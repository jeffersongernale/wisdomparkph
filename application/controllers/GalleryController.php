<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery');
    }

    public function get_gallery()
    {
        
        $result['photos'] = $this->Gallery->get_gallery(['section'=>'photos']);
        $result['videos'] = $this->Gallery->get_gallery(['section'=>'videos']);
        $result['songs'] = $this->Gallery->get_gallery(['section'=>'songs']);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }


}
