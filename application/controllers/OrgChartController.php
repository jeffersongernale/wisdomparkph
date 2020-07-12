<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrgChartController extends CI_Controller {


	public $page_data = [];

	public function __construct()
	{
        parent::__construct();
        $this->load->model('OrgChart');
	}
    
    public function insert_org_chart()
    {
        $post = $this->input->post();

        if($post['txt_org_name'] == '' || $post['txt_org_position'] == '' )
        {
            $result = false;
        }
        else
        {

            if ($_FILES['file_org_image']['size'] == 0 && $_FILES['file_org_image']['error'] == 4)
            {
                // file_org_image is empty (and not an error)
                $data = [
                    'name' => $post['txt_org_name'], 
                    'position' => $post['txt_org_position'],
                    'image_name' => 'noimage.jpg'
                ];

                $result = $this->OrgChart->insert_org_chart($data);
            }
            else
            {
                $config['upload_path']   = './asset/upload/org_chart';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_width']     = '1024';
                $config['max_height']    = '1024';
                $new_name                = time().$_FILES["file_org_image"]['name'];
                $config['file_name']     = $new_name;

                $this->load->library('upload',$config);


                if( !$this->upload->do_upload('file_org_image'))
                {
                    $result = ['error' => $this->upload->display_errors()];
                }
                else
                {
                    $img_data = ['upload_data' => $this->upload->data()];
                    $data = [
                        'name' => $post['txt_org_name'], 
                        'position' => $post['txt_org_position'],
                        'image_name' => $new_name
                    ];
            
                    $result = $this->OrgChart->insert_org_chart($data);
                }
            }

        }
       

       
        $this->output->set_content_type('application/json')->set_output(json_encode($result));


    }


    public function update_org_chart()
    {
        $post = $this->input->post();
        $data = [
            'name'   => $post['name'], 
            'position'       => $post['position']
        ];
        
        $result = $this->OrgChart->update_org_chart($data,['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function delete_org_chart()
    {
        $post=$this->input->post();

        $get_file_name = $this->OrgChart->get_orgchart(['id' => $post['id']]);
        $path = './asset/upload/org_chart/'.$get_file_name['0']['image_name'];
        if(file_exists($path))
        {
            unlink($path);
            // $result = $get_file_name['0']['image_name'];
        }
        
        $result = $this->OrgChart->delete_org_chart(['id' => $post['id']]);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));

    }

    public function update_org_chart_pic()
    {
        $post = $this->input->post();

        $config['upload_path']   = './asset/upload/org_chart';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_width']     = '1024';
        $config['max_height']    = '786';
        $new_name                = time().$_FILES["file_org_chart_image"]['name'];
        $config['file_name']     = $new_name;

        $this->load->library('upload',$config);


        if( !$this->upload->do_upload('file_org_chart_image'))
        {
            $result = ['error' => $this->upload->display_errors()];
        }
        else
        {
            
            
            $img_data = ['upload_data' => $this->upload->data()];

            $get_file_name = $this->OrgChart->get_orgchart(['id' => $post['id']]);
            $path = './asset/upload/org_chart/'.$get_file_name['0']['image_name'];
            if(file_exists($path))
            {
                unlink($path);
            }

            
            $data = [
                'image_name'           => $new_name
            ];
    

            $result = $this->OrgChart->update_org_chart($data,['id' => $post['id']]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }


}
