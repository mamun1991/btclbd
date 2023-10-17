<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';

class Login extends MY_Backend {

	var $module = 'login';
	
	public function index()
	{
		$config = array(
			'fileView' => 'login/index',
			'pageTitle' => 'Admin Login',
		);
		$this->template($config);
	}

	public function dologin(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);
		$randomHash = $this->config->item('randomHash');
		$roles = $this->config->item('roles');
		$reqData = $this->input->post();
		$rules = array(
			array('field' => 'email', 'label' => 'Email Address', 'rules' => 'required|trim|xss_clean|valid_email',
					'errors' => array(
						'required' => '%s required',
						'valid_email' => '%s invalid'
					),
			),
			array('field' => 'password', 'label' => 'Password', 'rules' => 'required',
					'errors' => array(
							'required' => '%s required',
					),
			)
		);
		$this->form_validation->set_error_delimiters('<div class="form-error login">', '</div>');
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() !== FALSE) {
			$password = $reqData['password'];
			$email = $reqData['email'];
            $query = $this->db->get_where('user', array('user_email' => $email))->row();
			$dataPass = $query->password;
			
			//echo '<pre>'.print_r($query, 1).'</pre>';
			if (password_verify($randomHash.$password, $dataPass)){

				$avatar = $this->config->item('no_avatar');
				if($query->user_avatar != '' && file_exists($dirUpload.$query->user_avatar)){
					$avatar = $query->user_avatar;
				}
				$avatar = base_url().$dirUploadLink.$avatar;

				$dataSession = array(
					'userId' => $query->user_id,
					'fullname' => $query->user_fullname,
					'avatar' => $avatar,
					'username' => $query->username,
					'rolesId' => $query->user_group,
					'rolesName' => $roles[$query->user_group]
				);
				$this->session->set_userdata($dataSession);
				$this->session->set_flashdata('success', 'Login success.');
				redirect($routeBackend.'entity');	
			} 
			else{
				$this->session->set_flashdata('error', "Wrong password. Please input valid password.");
				redirect($routeBackend.$this->module);	
			}
        } else {
            $this->session->set_flashdata('error', validation_errors());
			redirect($routeBackend.$this->module);
        }
	}

	public function dologout(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dataSession = array(
			'userId' => '',
			'fullname' => '',
			'avatar' => '',
			'username' => '',
			'rolesId' => '',
			'rolesName' => ''
		);
		$this->session->unset_userdata($dataSession); 
        $this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Logged out.');
		redirect($routeBackend.'login');
	}

}
