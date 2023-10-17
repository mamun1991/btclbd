<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';

class Settings extends MY_Backend {

	var $module = 'settings';

	function __construct(){
		parent::__construct();
		$this->load->library('General');
	}
	
	public function index(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		
		$config = array(
			'fileView' => 'settings/form',
			'pageTitle' => 'Web Settings',
			'action' => $routeBackend.$this->module.'/save',
			'back'=> $routeBackend.'dashboard',
		);
		$this->template($config);
	}

	

	public function save(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$reqData = $this->input->post();
		$appSettings = $this->m_settings->getSettings();
		$errorUpload = false;
        $errorUploadMsg = '';
		
			$data = array(
				'app_name' => $reqData['app_name'],
				'app_desc' => $reqData['app_desc'],
				'app_email' => $reqData['app_email'],
				'app_phone_number' => $reqData['app_phone_number'],
				'app_address' => $reqData['app_address'],
			);
			//echo '<pre>'.print_r($data, 1).'</pre>';
			
			$upload = null;
            if (strlen($_FILES['app_logo']['name']) > 0) {
                $upload = $this->doUploadLogo();
                if($upload['success'] == true){
					if($appSettings['app_logo'] != '' && file_exists($dirUpload.$appSettings['app_logo'])){
						unlink($dirUpload.$appSettings['app_logo']);
					}
                    $data['app_logo'] = $upload['data']['file_name'];
				    $this->general->resizeImage($upload['data']['file_name']);
                }
                else{
                    $errorUpload = true;
                    $errorUploadMsg = $upload['msg'];
                }
            }

			if (strlen($_FILES['app_intro_image']['name']) > 0) {
                $upload = $this->doUploadIntro();
                if($upload['success'] == true){
					if($appSettings['app_intro_image'] != '' && file_exists($dirUpload.$appSettings['app_intro_image'])){
						unlink($dirUpload.$appSettings['app_intro_image']);
					}
                    $data['app_intro_image'] = $upload['data']['file_name'];
				    $this->general->resizeImage($upload['data']['file_name']);
                }
                else{
                    $errorUpload = true;
                    $errorUploadMsg = $upload['msg'];
                }
            }

			if($errorUpload == false){
				//echo '<pre>'.print_r($data, 1).'</pre>';
				$where = array('app_id' => 1);
				$this->m_all->doUpdate('app', $where, $data);
				$this->session->set_flashdata('success', "Settings Updated");
				redirect($routeBackend.$this->module);
			}
			if($errorUpload == true){
				$this->session->set_flashdata('error', $errorUploadMsg['error']);
				redirect($routeBackend.$this->module);
			}
	}

	private function getLink($title, $link){
		$data = array('title' => $title, 'link' => $link);
		$str = json_encode($data, true);
		return $str;
	}

	private function doUploadLogo(){
        $return = array();
        $splitName = explode('.', $_FILES['app_logo']['name']);
        $newFilename = md5(strtotime('now').'-'.$splitName[0].'.'.$splitName[1]);
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['allowed_types']        = '*';
		$config['max_size']             = 3000;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;
        $config['file_name'] = $newFilename;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('app_logo')){
			$error = array('error' => $this->upload->display_errors());
            $return['success'] = false;
            $return['msg'] = $error;
		}else{
            $return['success'] = true;
            $return['data'] = $this->upload->data();
		}
        return $return;

	}

	private function doUploadIntro(){
        $return = array();
        $splitName = explode('.', $_FILES['app_intro_image']['name']);
        $newFilename = md5(strtotime('now').'-'.$splitName[0].'.'.$splitName[1]);
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['allowed_types']        = '*';
		$config['max_size']             = 3000;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;
        $config['file_name'] = $newFilename;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('app_intro_image')){
			$error = array('error' => $this->upload->display_errors());
            $return['success'] = false;
            $return['msg'] = $error;
		}else{
            $return['success'] = true;
            $return['data'] = $this->upload->data();
		}
        return $return;

	}
}
