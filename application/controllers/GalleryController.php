<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery');

        
    }

    public function _verify()
    {
        if (!isset($_SESSION['wp_username'])) 
        {
            redirect(base_url('login'));
            die();
        } 
        else 
        {
            return $_SESSION['wp_username'];
        }
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
        $this->_verify();
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
        $this->_verify();
        $post = $this->input->post();
        $get_file_name = $this->Gallery->get_gallery(['id' => $post['id']]);
        $path = './asset/upload/gallery/photo/'.$get_file_name['0']['image_name'];
        if(file_exists($path))
        {
            $result = unlink($path);
        }
        $result = $this->Gallery->delete_gallery(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_gallery_video()
    {
        $this->_verify();
        $post = $this->input->post();
        $result = $this->Gallery->delete_gallery(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function insert_gallery_songs()
    {
        $this->_verify();
        $post = $this->input->post();
        $config['upload_path']   = './asset/upload/gallery/songs';
        $config['allowed_types'] = 'mp3|mp4|ogg';
        $config['max_size'] = '20000000';
        $new_name                = time().'wisdompark.mp3';
        $config['file_name']     = $new_name;
        $this->load->library('upload',$config);
       

        if( !$this->upload->do_upload('gallery_file_songs'))
        {
            $result = ['error' => $this->upload->display_errors()];
        }
        else
        {
            $img_data = ['upload_data' => $this->upload->data()];
            $data = [
                'section'     =>'songs',
                'image_name'  => $new_name,
                'description' => $_FILES["gallery_file_songs"]['name']
            ];
    
            $result = $this->Gallery->insert_gallery($data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
        
    }

    public function insert_gallery_video()
    {
        $this->_verify();
        $post = $this->input->post();
        if($post['description'] == '')
        {
            $result = false;
        }
        else
        {
            $data = [
                'section'     =>'videos',
                'image_name'  => $post['image_name'],
                'description' => $post['description']
            ];
            $result = $this->Gallery->insert_gallery($data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_gallery_songs()
    {
        $this->_verify();
        $post = $this->input->post();
        $get_file_name = $this->Gallery->get_gallery(['id' => $post['id']]);
        $path = './asset/upload/gallery/songs/'.$get_file_name['0']['image_name'];
        if(file_exists($path))
        {
            $result = unlink($path);
        }
        $result = $this->Gallery->delete_gallery(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

}
