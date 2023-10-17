<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('General');
	}
	
	public function index()
	{
		show_404();
    }

    public function get_news(){
        $output = array();
        $configApp = $this->config->item('app');
        $dirUpload = $configApp['dir_upload'];
        $dirUploadLink = substr($dirUpload, 2);
        if($this->input->post('id')){
            $id = $this->input->post('id');
            $data = $this->getSingleBlog($id);
            $image = $this->config->item('no_image');
            if($data['blog_image'] != '' && file_exists($dirUpload.$data['blog_image'])){
                $image = base_url().$dirUploadLink.$data['blog_image'];
            }
            $data['image'] = $image;
            $output['status'] = true;
            $output['data'] = $data;
        }
        else{
            $output['status'] = false;
            $output['msg'] = 'Blog not found';
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($output, JSON_PRETTY_PRINT);
    }

    private function getSingleBlog($id){
        return $this->db->get_where('feat_blog', array('blog_id' => $id))->row_array();
    }

}
