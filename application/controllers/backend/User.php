<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';

class User extends MY_Backend {

	var $module = 'user';
	var $limit = 10;

	function __construct(){
		parent::__construct();
		$this->load->library('General');
	}
	
	public function index($offset = 0)
	{
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);
		$queryParam = array('table' => 'user', 'field_sort' => 'user_id');
		$listData = $this->m_all->getAdmin($queryParam, $this->limit, $offset);
        $config['base_url'] = site_url($routeBackend.$this->module.'/index'); //site url
        $config['total_rows'] = $listData['total'];
        $config['per_page'] = $this->limit;  
        $config["uri_segment"] = 3;  
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);

		$newListData = $listData['data'];
		//echo '<pre>'.print_r($newListData,1).'</pre>';
		foreach($newListData as $row){
			$avatar = 'no-avatar.jpg';
            if($row->user_avatar != '' && file_exists($dirUpload.$row->user_avatar)){
                $avatar = $row->user_avatar;
            }
            $row->avatar = base_url().$dirUploadLink.$avatar;
		}

		
		$config = array(
			'fileView' => 'user/index',
			'pageTitle' => 'Admin List',
			'linkAdd' => $routeBackend.$this->module.'/add',
			'linkEdit' => $routeBackend.$this->module.'/edit/',
			'linkDelete' => $routeBackend.$this->module.'/delete/',
			'page' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'listData' => $newListData,
			'pagination' => $this->pagination->create_links()
		);
		$this->template($config);
	}

	public function add(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		
		$config = array(
			'fileView' => 'user/form',
			'pageTitle' => 'Add Admin',
			'action' => $routeBackend.$this->module.'/save',
			'back'=> $routeBackend.$this->module,
		);
		$this->template($config);
	}

	public function edit($id){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		
		$whereParam = array('user_id' => $id);
		$viewData = $this->m_all->getSingle('user', $whereParam);
		$config = array(
			'fileView' => 'user/form',
			'pageTitle' => 'Edit User',
			'action' => $routeBackend.$this->module.'/save',
			'back'=> $routeBackend.$this->module,
			'viewData' => $viewData
		);
		$this->template($config);
	}

	public function save(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$reqData = $this->input->post();
		$id = (isset($reqData['uid'])) ? $reqData['uid'] : 0;
		if($id == 0){
			$errorUpload = false;
            $errorUploadMsg = '';
			$password = $reqData['password'];
			$fullname = $reqData['user_fullname'];
			$username = $reqData['username'];
			$email = $reqData['user_email'];
			$group = $reqData['user_group'];

			$newPassword = password_hash($this->config->item('randomHash').$password, PASSWORD_BCRYPT);
			$data = array(
				'username' => $username,
				'user_fullname' => $fullname,
				'user_email' => $email,
				'user_group' => $group,
				'password' => $newPassword,
			);
			$upload = null;
            if (strlen($_FILES['user_avatar']['name']) > 0) {
                $upload = $this->doUpload();
                if($upload['success'] == true){
                    $data['user_avatar'] = $upload['data']['file_name'];
				    $this->general->resizeImage($upload['data']['file_name']);
                }
                else{
                    $errorUpload = true;
                    $errorUploadMsg = $upload['msg'];
                }
            }

			if($errorUpload == false){
				//echo '<pre>'.print_r($data, 1).'</pre>';
				$this->m_all->doInsert('user', $data);
				$this->session->set_flashdata('success', "Data Saved");
				redirect($routeBackend.$this->module.'/add');
			}
			if($errorUpload == true){
				$this->session->set_flashdata('error', $errorUploadMsg);
				redirect($routeBackend.$this->module.'/add');
			}
		}
		else{
			$errorUpload = false;
            $errorUploadMsg = '';
			$viewData = $this->m_all->getSingle('user', array('user_id' => $id));
			$password = $reqData['password'];
			$fullname = $reqData['user_fullname'];
			$username = $reqData['username'];
			$email = $reqData['user_email'];
			$group = $reqData['user_group'];

			//$newPassword = password_hash($this->config->item('randomHash').$password, PASSWORD_BCRYPT);
			$data = array(
				'username' => $username,
				'user_fullname' => $fullname,
				'user_email' => $email,
				'user_group' => $group,
			);
			if($password != ''){
				$newPassword = password_hash($this->config->item('randomHash').$password, PASSWORD_BCRYPT);
				$data['password'] = $newPassword;
			}
			$upload = null;
            if (strlen($_FILES['user_avatar']['name']) > 0) {
                $upload = $this->doUpload();
                if($upload['success'] == true){
					if($viewData->user_avatar != '' && file_exists($dirUpload.$viewData->user_avatar)){
						unlink($dirUpload.$viewData->user_avatar);
					}
                    $data['user_avatar'] = $upload['data']['file_name'];
				    $this->general->resizeImage($upload['data']['file_name']);
                }
                else{
                    $errorUpload = true;
                    $errorUploadMsg = $upload['msg'];
                }
            }

			if($errorUpload == false){
				//echo '<pre>'.print_r($data, 1).'</pre>';
				$where = array('user_id' => $id);
				$this->m_all->doUpdate('user', $where, $data);
				$this->session->set_flashdata('success', "Data Updated");
				redirect($routeBackend.$this->module);
			}
			if($errorUpload == true){
				$this->session->set_flashdata('error', $errorUploadMsg);
				redirect($routeBackend.$this->module.'/edit/'.$id);
			}
		}
	}

	public function delete($id){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$where = array('user_id' => $id);
		$viewData = $this->m_all->getSingle('user', $where);
		if($viewData->user_avatar != '' && file_exists($dirUpload.$viewData->user_avatar)){
			unlink($dirUpload.$viewData->user_avatar);
		}
		$this->m_all->doDelete('user', $where);
		$this->session->set_flashdata('success', "Data Deleted");
		redirect($routeBackend.$this->module);
	}

	private function doUpload(){
        $return = array();
        $splitName = explode('.', $_FILES['user_avatar']['name']);
        $newFilename = md5(strtotime('now').'-'.$splitName[0].'.'.$splitName[1]);
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
        //$config['allowed_types']        = '*';
		$config['max_size']             = 3000;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;
        $config['file_name'] = $newFilename;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('user_avatar')){
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
