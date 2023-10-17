<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';

class Entity extends MY_Backend {

	var $module = 'entity';
	var $limit = 10;

	function __construct(){
		parent::__construct();
		$this->load->library('General');
        $this->load->model('m_master');
	}
	
	public function index($offset = 0)
	{
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);
		$queryParam = array('table' => 'entity', 'field_sort' => 'entity_id');
		$listData = $this->m_master->getEntity($queryParam, $this->limit, $offset);
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
		for($i = 0;$i < count($newListData);$i++){
			$row = $newListData[$i];
			$sectorName = ' - ';
			$sector = $this->m_all->getSingle('sector', array('sector_id' => $row->sector_id));
			if($sector != null){
				$sectorName = $sector->sector_name;
			}
			$row->sector_name = $sectorName;
			$newListData[$i] = $row;
		}

		
		$config = array(
			'fileView' => 'entity/index',
			'pageTitle' => 'Entity List',
			'linkAdd' => $routeBackend.$this->module.'/add',
			'linkEdit' => $routeBackend.$this->module.'/edit/',
			'linkDelete' => $routeBackend.$this->module.'/delete/',
            'linkShow' => $routeBackend.$this->module.'/show/',
			'page' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'listData' => $newListData,
			'pagination' => $this->pagination->create_links()
		);
		$this->template($config);
	}

	public function add(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);
		
		$dataSector = $this->m_master->listSector();
		$comboSector = array();
		foreach($dataSector['data'] as $row){
			$comboSector[$row['sector_id']] = $row['sector_name'];
		}

		$comboGender = $this->config->item('gender');
		
		$config = array(
			'fileView' => 'entity/form',
			'pageTitle' => 'Add Entity',
			'action' => $routeBackend.$this->module.'/save',
			'back'=> $routeBackend.$this->module,
			'comboGender' => $comboGender,
			'comboSector' => $comboSector,
			'entityPhoto' => base_url().$dirUploadLink.'no-avatar.jpg',
			'entitySignature' => base_url().$dirUploadLink.'no-image.jpg',
		);
		$this->template($config);
	}

    public function show($id){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);
		
		$whereParam = array('entity_id' => $id);
		$viewEntity = $this->m_all->getSingle('entity', $whereParam);
		$viewGRA = $this->m_all->getSingle('entity_gra', $whereParam);
        $viewHSC = $this->m_all->getSingle('entity_hsc', $whereParam);
        $viewJSC = $this->m_all->getSingle('entity_jsc', $whereParam);
        $viewSSC = $this->m_all->getSingle('entity_ssc', $whereParam);
        $viewMAS = $this->m_all->getSingle('entity_mas', $whereParam);
        $viewPermanent = $this->m_all->getSingle('entity_permanent', $whereParam);
        $viewPresent = $this->m_all->getSingle('entity_present', $whereParam);
        $viewEmployment1 = $this->m_all->getSingle('entity_employment_1', $whereParam);
        $viewEmployment2 = $this->m_all->getSingle('entity_employment_2', $whereParam);
        $viewEmployment3 = $this->m_all->getSingle('entity_employment_3', $whereParam);
        $viewEmployment4 = $this->m_all->getSingle('entity_employment_4', $whereParam);


		$avatar = 'no-avatar.jpg';
        if($viewEntity->photo != '' && file_exists($dirUpload.$viewEntity->photo)){
			$avatar = $viewEntity->photo;
		}
		$signature = 'no-image.jpg';
		if($viewEntity->signature != '' && file_exists($dirUpload.$viewEntity->signature)){
			$signature = $viewEntity->signature;
		}
		

		$whereSector = array('sector_id' => $viewEntity->sector_id);
		$sector = $this->m_all->getSingle('sector', $whereSector);

		$config = array(
			'fileView' => 'entity/show',
			'pageTitle' => 'Show Entity',
			'back'=> $routeBackend.$this->module,
			'sector' => $sector,
			'viewEntity' => $viewEntity,
            'viewGRA' => $viewGRA,
            'viewHSC' => $viewHSC,
            'viewJSC' => $viewJSC,
            'viewSSC' => $viewSSC,
            'viewMAS' => $viewMAS,
            'viewPermanent' => $viewPermanent,
            'viewPresent' => $viewPresent,
			'viewEmployment' => array(
				'viewEmployment1' => $viewEmployment1,
				'viewEmployment2' => $viewEmployment2,
				'viewEmployment3' => $viewEmployment3,
				'viewEmployment4' => $viewEmployment4,
			),
			'entityPhoto' => base_url().$dirUploadLink.$avatar,
			'entitySignature' => base_url().$dirUploadLink.$signature,
            
		);
		$this->template($config);
	}

	public function edit($id){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);

		$dataSector = $this->m_master->listSector();
		$comboSector = array();
		foreach($dataSector['data'] as $row){
			$comboSector[$row['sector_id']] = $row['sector_name'];
		}

		$comboGender = $this->config->item('gender');
		
		$whereParam = array('entity_id' => $id);
		$viewEntity = $this->m_all->getSingle('entity', $whereParam);
		$viewGRA = $this->m_all->getSingle('entity_gra', $whereParam);
        $viewHSC = $this->m_all->getSingle('entity_hsc', $whereParam);
        $viewJSC = $this->m_all->getSingle('entity_jsc', $whereParam);
        $viewSSC = $this->m_all->getSingle('entity_ssc', $whereParam);
        $viewMAS = $this->m_all->getSingle('entity_mas', $whereParam);
        $viewPermanent = $this->m_all->getSingle('entity_permanent', $whereParam);
        $viewPresent = $this->m_all->getSingle('entity_present', $whereParam);
        $viewEmployment1 = $this->m_all->getSingle('entity_employment_1', $whereParam);
        $viewEmployment2 = $this->m_all->getSingle('entity_employment_2', $whereParam);
        $viewEmployment3 = $this->m_all->getSingle('entity_employment_3', $whereParam);
        $viewEmployment4 = $this->m_all->getSingle('entity_employment_4', $whereParam);

		$avatar = 'no-avatar.jpg';
        if($viewEntity->photo != '' && file_exists($dirUpload.$viewEntity->photo)){
			$avatar = $viewEntity->photo;
		}
		$signature = 'no-image.jpg';
		if($viewEntity->signature != '' && file_exists($dirUpload.$viewEntity->signature)){
			$signature = $viewEntity->signature;
		}
		$whereSector = array('sector_id' => $viewEntity->sector_id);
		$sector = $this->m_all->getSingle('sector', $whereSector);

		$config = array(
			'fileView' => 'entity/form',
			'pageTitle' => 'Edit Entity',
			'action' => $routeBackend.$this->module.'/save',
			'back'=> $routeBackend.$this->module,
			'sector' => $sector,
			'viewEntity' => $viewEntity,
            'viewGRA' => $viewGRA,
            'viewHSC' => $viewHSC,
            'viewJSC' => $viewJSC,
            'viewSSC' => $viewSSC,
            'viewMAS' => $viewMAS,
            'viewPermanent' => $viewPermanent,
            'viewPresent' => $viewPresent,
			'viewEmployment' => array(
				'viewEmployment1' => $viewEmployment1,
				'viewEmployment2' => $viewEmployment2,
				'viewEmployment3' => $viewEmployment3,
				'viewEmployment4' => $viewEmployment4,
			),
			'comboGender' => $comboGender,
			'comboSector' => $comboSector,
			'entityPhoto' => base_url().$dirUploadLink.$avatar,
			'entitySignature' => base_url().$dirUploadLink.$signature,
		);
		//echo '<pre>'.print_r($comboSector,1).'</pre>';
		$this->template($config);
	}

	public function save(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$reqData = $this->input->post();
		$id = (isset($reqData['entity_id'])) ? $reqData['entity_id'] : 0;
		$mode = 'add';
		if($id == 0){
			$mode = 'add';
		}
		if($id != 0){
			$mode = 'edit';
		}
		$this->updateEntity($id, $mode);
		$this->session->set_flashdata('success', "Data Updated");
		redirect($routeBackend.$this->module);
	}

	public function delete($id){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_employment_1', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_employment_2', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_employment_3', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_employment_4', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_gra', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_hsc', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_jsc', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_mas', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_permanent', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_present', $where);

        $where = array('entity_id' => $id);
		$this->m_all->doDelete('entity_ssc', $where);

		$where = array('entity_id' => $id);
		$this->m_all->doDelete('entity', $where);


		$this->session->set_flashdata('success', "Data Deleted");
		redirect($routeBackend.$this->module);
	}


	private function updateEntity($entityId = 0, $mode = 'add'){

		$errorUpload = false;
        $errorUploadMsg = '';
		$upload = null;
		$signature = '';
		$photo = '';
		if (strlen($_FILES['photo']['name']) > 0) {
			$upload = $this->doUpload('photo');
			if($upload['success'] == true){
				$photo = $upload['data']['file_name'];
				$this->general->resizeImage($upload['data']['file_name']);
			}
			else{
				$errorUpload = true;
				$errorUploadMsg = $upload['msg'];
			}
		}
		if (strlen($_FILES['signature']['name']) > 0) {
			$upload = $this->doUpload('signature');
			if($upload['success'] == true){
				$signature = $upload['data']['file_name'];
				$this->general->resizeImage($upload['data']['file_name']);
			}
			else{
				$errorUpload = true;
				$errorUploadMsg = $upload['msg'];
			}
		}
		if($errorUpload == false){
			$dataEntity = array(
				'roll_number' => $this->input->post('roll_number'),
				'fullname' => $this->input->post('fullname'), 'name_bn' => $this->input->post('name_bn'), 
				'father' => $this->input->post('father'), 'father_bn' => $this->input->post('father_bn'),
				'mother' => $this->input->post('mother'), 'mother_bn' => $this->input->post('mother_bn'), 
				'dob' => $this->input->post('dob'), 
				//'age_as' => $age_as, 'age_calculate_date' => $age_calculate_date, 
				'gender' => $this->input->post('gender'), 'nid' => $this->input->post('nid'), 
				'nid_id' => $this->input->post('nid_id'), 'breg' => $this->input->post('breg'), 
				'breg_id' => $this->input->post('breg_id'), 'passport' => $this->input->post('passport'), 
				'passport_id' => $this->input->post('passport_id'), 'marital' => $this->input->post('marital'), 
				'spouse_name' => $this->input->post('spouse_name'), 'nationality' => $this->input->post('nationality'), 
				'religion' => $this->input->post('religion'),
				'mobile_number' => $this->input->post('mobile_number'), 'email' => $this->input->post('email'), 'quota' => $this->input->post('quota'), 
				'dep_status' => $this->input->post('dep_status'), 
				'home_district' => $this->input->post('home_district'), 'same_as_present' => $this->input->post('same_as_present'), 
				'total_job_exp' => $this->input->post('total_job_exp'), 
				'oth_exp1' => $this->input->post('oth_exp1'), 'oth_exp_ans1' => $this->input->post('oth_exp_ans1'), 
				'oth_exp_text1' => $this->input->post('oth_exp_text1'), 'oth_exp2' => $this->input->post('oth_exp2'), 
				'oth_exp_ans2' => $this->input->post('oth_exp_ans2'), 'oth_exp_text2' => $this->input->post('oth_exp_text2'), 
				'ip_address' => $this->input->post('ip_address'), 
				'fee_status' => $this->input->post('fee_status'), 'fee_payment_time' => $this->input->post('fee_payment_time'), 
				'screening' => $this->input->post('screening'), 
				//'created_time' => $created_time, 'expire_time' => $expire_time, 
				'sector_id' => $this->input->post('sector_id'),
				'remarks' => $this->input->post('remarks')
			);
			if($photo != ''){
				$dataEntity['photo'] = $photo;
			}
			if($signature != ''){
				$dataEntity['signature'] = $signature;
			}
			if($mode == 'add'){
				$entityId = $this->m_all->doInsert('entity', $dataEntity);
			}
			if($mode != 'add'){
				$this->m_all->doUpdate('entity', array('entity_id' => $entityId), $dataEntity);
			}
			$this->updateEmployment($entityId, $mode);
			$this->updateExam($entityId, $mode);
			$this->updateLoc($entityId, $mode);
		}
		if($errorUpload == true){
			$configApp = $this->config->item('app');
			$routeBackend = $configApp['backend']['base_route'].'/';
			$this->session->set_flashdata('error', $errorUploadMsg['error']);
			//echo print_r($errorUploadMsg,1);
			redirect($routeBackend.$this->module);
		}
		
	}


	private function updateEmployment($entityId = 0, $mode = 'add'){

		$dataEmployment1 = array(
			'entity_id' => $entityId, 'employment_type1' => $this->input->post('employment_type1'), 
			'organization1' => $this->input->post('organization1'), 
			'designation1' => $this->input->post('designation1'), 'office_address1' => $this->input->post('office_address1'), 
			'job_start_date1' => $this->input->post('job_start_date1'), 
			'job_end_date1' => $this->input->post('job_end_date1'), 'currently_working1' => $this->input->post('currently_working1'), 
			'job_description1' => $this->input->post('job_description1'), 
			'job_duration1' => $this->input->post('job_duration1')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_employment_1', $dataEmployment1);
		if($mode != 'add') $this->m_all->doUpdate('entity_employment_1', array('entity_id' => $entityId), $dataEmployment1);
		

		$dataEmployment2 = array(
			'entity_id' => $entityId, 'employment_type2' => $this->input->post('employment_type2'), 
			'organization2' => $this->input->post('organization2'), 
			'designation2' => $this->input->post('designation2'), 'office_address2' => $this->input->post('office_address2'), 
			'job_start_date2' => $this->input->post('job_start_date2'), 
			'job_end_date2' => $this->input->post('job_end_date2'), 'currently_working2' => $this->input->post('currently_working2'), 
			'job_description2' => $this->input->post('job_description2'), 
			'job_duration2' => $this->input->post('job_duration2')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_employment_2', $dataEmployment2);
		if($mode != 'add') $this->m_all->doUpdate('entity_employment_2', array('entity_id' => $entityId), $dataEmployment2);

		$dataEmployment3 = array(
			'entity_id' => $entityId, 'employment_type3' => $this->input->post('employment_type3'), 
			'organization3' => $this->input->post('organization3'), 
			'designation3' => $this->input->post('designation3'), 'office_address3' => $this->input->post('office_address3'), 
			'job_start_date3' => $this->input->post('job_start_date3'), 
			'job_end_date3' => $this->input->post('job_end_date3'), 'currently_working3' => $this->input->post('currently_working3'), 
			'job_description3' => $this->input->post('job_description3'), 
			'job_duration3' => $this->input->post('job_duration3')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_employment_3', $dataEmployment3);
		if($mode != 'add') $this->m_all->doUpdate('entity_employment_3', array('entity_id' => $entityId), $dataEmployment3);

		$dataEmployment4 = array(
			'entity_id' => $entityId, 'employment_type4' => $this->input->post('employment_type4'), 
			'organization4' => $this->input->post('organization4'), 
			'designation4' => $this->input->post('designation4'), 'office_address4' => $this->input->post('office_address4'), 
			'job_start_date4' => $this->input->post('job_start_date4'), 
			'job_end_date4' => $this->input->post('job_end_date4'), 'currently_working4' => $this->input->post('currently_working4'), 
			'job_description4' => $this->input->post('job_description4'), 
			'job_duration4' => $this->input->post('job_duration4')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_employment_4', $dataEmployment4);
		if($mode != 'add') $this->m_all->doUpdate('entity_employment_4', array('entity_id' => $entityId), $dataEmployment4);

	}


	private function updateExam($entityId = 0, $mode = 'add'){
	
		$dataGRA = array(
			'entity_id' => $entityId, 'gra_exam' => $this->input->post('gra_exam'), 'gra_subject' => $this->input->post('gra_subject'), 
			'gra_institute' => $this->input->post('gra_institute'), 'gra_year' => $this->input->post('gra_year'), 
			'gra_result_type' => $this->input->post('gra_result_type'), 
			'gra_result_type_text' => $this->input->post('gra_result_type_text'), 'gra_result' => $this->input->post('gra_result'), 
			'gra_result_eq' => $this->input->post('gra_result_eq'), 
			'gra_duration' => $this->input->post('gra_duration')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_gra', $dataGRA);
		if($mode != 'add') $this->m_all->doUpdate('entity_gra', array('entity_id' => $entityId), $dataGRA);

		$dataMAS = array(
			'entity_id' => $entityId, 'mas_exam' => $this->input->post('mas_exam'), 'mas_subject' => $this->input->post('mas_subject'), 
			'mas_institute' => $this->input->post('mas_institute'), 'mas_year' => $this->input->post('mas_year'), 
			'mas_result_type' => $this->input->post('mas_result_type'), 
			'mas_result_type_text' => $this->input->post('mas_result_type_text'), 'mas_result' => $this->input->post('mas_result'), 
			'mas_result_eq' => $this->input->post('mas_result_eq'),
			'mas_duration' => $this->input->post('mas_duration')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_mas', $dataMAS);
		if($mode != 'add') $this->m_all->doUpdate('entity_mas', array('entity_id' => $entityId), $dataMAS);


		$dataJSC = array(
			'entity_id' => $entityId, 'jsc_exam' => $this->input->post('jsc_exam'), 'jsc_roll' => $this->input->post('jsc_roll'), 
			'jsc_board' => $this->input->post('jsc_board'), 'jsc_year' => $this->input->post('jsc_year'), 
			'jsc_institute' => $this->input->post('jsc_institute'), 
			'jsc_result_type' => $this->input->post('jsc_result_type'), 'jsc_result_type_text' => $this->input->post('jsc_result_type_text'), 
			'jsc_result' => $this->input->post('jsc_result')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_jsc', $dataJSC);
		if($mode != 'add') $this->m_all->doUpdate('entity_jsc', array('entity_id' => $entityId), $dataJSC);

		$dataHSC = array(
			'entity_id' => $entityId, 'hsc_exam' => $this->input->post('hsc_exam'), 'hsc_roll' => $this->input->post('hsc_roll'), 
			'hsc_board' => $this->input->post('hsc_board'), 'hsc_year' => $this->input->post('hsc_year'), 
			'hsc_group' => $this->input->post('hsc_group'), 
			'hsc_result_type' => $this->input->post('hsc_result_type'), 'hsc_result_type_text' => $this->input->post('hsc_result_type_text'), 
			'hsc_result' => $this->input->post('hsc_result'), 
			'hsc_result_eq' => $this->input->post('hsc_result_eq'), 'hsc_verified' => $this->input->post('hsc_verified'),
		);
		if($mode == 'add') $this->m_all->doInsert('entity_hsc', $dataHSC);
		if($mode != 'add') $this->m_all->doUpdate('entity_hsc', array('entity_id' => $entityId), $dataHSC);

		$dataSSC = array(
			'entity_id' => $entityId, 'ssc_exam' => $this->input->post('ssc_exam'), 'ssc_roll' => $this->input->post('ssc_roll'), 
			'ssc_board' => $this->input->post('ssc_board'), 'ssc_year' => $this->input->post('ssc_year'), 
			'ssc_group' => $this->input->post('ssc_group'), 
			'ssc_result_type' => $this->input->post('ssc_result_type'), 'ssc_result_type_text' => $this->input->post('ssc_result_type_text'), 
			'ssc_result' => $this->input->post('ssc_result'),
			'ssc_result_eq' => $this->input->post('ssc_result_eq'), 'ssc_verified' => $this->input->post('ssc_verified'),
		);
		if($mode == 'add') $this->m_all->doInsert('entity_ssc', $dataSSC);
		if($mode != 'add') $this->m_all->doUpdate('entity_ssc', array('entity_id' => $entityId), $dataSSC);

	}

	private function updateLoc($entityId = 0, $mode = 'add'){
		$dataPermanent = array(
			'entity_id' => $entityId, 'permanent_district' => $this->input->post('permanent_district'), 
			'permanent_upazilla' => $this->input->post('permanent_upazila'), 
			'permanent_post' => $this->input->post('permanent_post'), 'permanent_postcode' => $this->input->post('permanent_postcode'), 
			'permanent_village' => $this->input->post('permanent_village'), 
			'permanent_careof' => $this->input->post('permanent_careof')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_permanent', $dataPermanent);
		if($mode != 'add') $this->m_all->doUpdate('entity_permanent', array('entity_id' => $entityId), $dataPermanent);

		$dataPresent = array(
			'entity_id' => $entityId, 'present_district' => $this->input->post('present_district'), 
			'present_upazila' => $this->input->post('present_upazila'), 
			'present_post' => $this->input->post('present_post'), 'present_postcode' => $this->input->post('present_postcode'), 
			'present_village' => $this->input->post('present_village'), 
			'present_careof' => $this->input->post('present_careof')
		);
		if($mode == 'add') $this->m_all->doInsert('entity_present', $dataPresent);
		if($mode != 'add') $this->m_all->doUpdate('entity_present', array('entity_id' => $entityId), $dataPresent);
	}


	private function doUpload($name){
        $return = array();
        $splitName = explode('.', $_FILES["$name"]['name']);
        $newFilename = md5(strtotime('now').'-'.$splitName[0].'.'.$splitName[1]);
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        //$config['allowed_types']        = '*';
		$config['max_size']             = 8000;
		$config['max_width']            = 5048;
		$config['max_height']           = 5048;
        $config['file_name'] = $newFilename;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload("$name")){
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
