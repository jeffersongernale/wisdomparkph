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

    public function insert_gallery_photo()
    {
        $post = $this->input->post();
        $config['upload_path']   = './asset/upload/gallery/photo';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_width']     = '1024';
        $config['max_height']    = '786';
        $new_name                = time().$_FILES["gallery_file_image"]['name'];
        $config['file_name']     = $new_name;
        $this->load->library('upload',$config);
       

        if( !$this->upload->do_upload('gallery_file_image'))
        {
            $result = ['error' => $this->upload->display_errors()];
        }
        else
        {
            $img_data = ['upload_data' => $this->upload->data()];
            $data = [
                'section'     =>'photos',
                'image_name'  => $new_name
            ];
    
            $result = $this->Gallery->insert_gallery($data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
        
    }

    public function delete_gallery_photo()
    {
        $post = $this->input->post();
        $get_file_name = $this->Gallery->get_gallery(['id' => $post['id']]);
        $path = './asset/upload/facilities/'.$get_file_name['0']['image_name'];
        if(file_exists('your_file_name'))
        {
            unlink($path);
        }
        $result = $this->Gallery->delete_gallery_photo(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

}
