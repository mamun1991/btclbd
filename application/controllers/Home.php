<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Frontend.php';

class Home extends MY_Frontend {

	var $module = 'home';
    var $appSettings;

	function __construct(){
		parent::__construct();
		$this->load->library('General');
	}

    public function index()
	{
		$this->load->view('backend/login/index.php');
	}

    public function doSubmitContact(){
        $reqData = $this->input->post();
        $themeName = (isset($reqData['thmNm'])) ? $reqData['thmNm'] : '';
        $name = $reqData['name'];
		$email = $reqData['email'];
		$subject = $reqData['subject'];
		$message = $reqData['message'];

		$data = array(
			'contact_name' => $name,
			'contact_email' => $email,
			'contact_subject' => $subject,
			'contact_message' => $message,
			'date_add' => date('Y-m-d H:i:s'),
		);
			
		$this->m_all->doInsert('feat_contact', $data);
		$this->session->set_flashdata('success', "Terima kasih telah submit. Silakan tunggu email dari kami.");
        if($themeName == 'mate'){
            redirect('home/mate#contact');
        }
        else{
            redirect(base_url().'#contact');
        }
    }

    private function getPageTitle($themeName){
        $appSettings = $this->getAppConfig($themeName);
        $pageTitle = $appSettings['name'];
        if($appSettings['desc'] != ''){
            $pageTitle = $pageTitle .' - '. $appSettings['desc'];
        }
        return $pageTitle;
    }

    private function getBlogs($limit = 9){
        $data = $this->db->where('publish',1)->order_by('blog_id', 'DESC')->limit($limit, 0)->get('feat_blog')->result();
        return $data;
    }

    private function getServices($limit = 10){
        $data = $this->db->order_by('services_sort', 'ASC')->limit($limit, 0)->get('feat_services')->result();
        return $data;
    }

    private function getTeam($limit = 10){
        $data = $this->db->where('publish', 1)->order_by('member_sort', 'ASC')->limit($limit, 0)->get('feat_member')->result();
        return $data;
    }

    private function getTestimony($limit = 10){
        $data = $this->db->where('publish', 1)->order_by('testimony_id', 'DESC')->limit($limit, 0)->get('feat_testimony')->result();
        return $data;
    }

    private function getPricing($limit = 3){
        $data = $this->db->order_by('pricing_sort', 'ASC')->limit($limit, 0)->get('feat_pricing')->result();
        return $data;
    }

    private function getSlider($limit = 3){
        $data = $this->db->where('publish', 1)->order_by('slider_id', 'ASC')->limit($limit, 0)->get('feat_image_slider')->result();
        return $data;
    }

    private function getPortofolio($limit = 3){
        $data = $this->db->where('publish', 1)->order_by('portofolio_sort', 'ASC')->limit($limit, 0)->get('feat_portofolio')->result();
        return $data;
    }


}
