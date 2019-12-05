<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacilitiesController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Facilities');

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

    public function insert_facilities()
    {
        $post = $this->input->post();

        $config['upload_path']   = './asset/upload/facilities';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_width']     = '1024';
        $config['max_height']    = '786';
        $new_name                = time().$_FILES["file_image"]['name'];
        $config['file_name']     = $new_name;

        $this->load->library('upload',$config);


        if( !$this->upload->do_upload('file_image'))
        {
            $result = ['error' => $this->upload->display_errors()];
        }
        else
        {
            $img_data = ['upload_data' => $this->upload->data()];
            $data = [
                'facilities_name' => $post['txt_title'],
                'description'     => $post['txt_description'],
                'image'           => $new_name
            ];
    
            $result = $this->Facilities->insert_facilities($data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function delete_facilities()
    {
       $post=$this->input->post();

        $get_file_name = $this->Facilities->get_details(['id' => $post['id']]);
        $path = './asset/upload/facilities/'.$get_file_name['0']['image'];
        if(file_exists('your_file_name'))
        {
            unlink($path);
        }
       $result =  $this->Facilities->delete_facilities(['id' => $post['id']]);
       $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function update_facilities()
    {
        $post = $this->input->post();
        $data = [
            'facilities_name'   => $post['facilities_name'], 
            'description'       => $post['description']
        ];
        
        $result = $this->Facilities->update_facilities($data,['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

}
