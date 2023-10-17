<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';

class Upload_data extends MY_Backend {

	var $module = 'upload_data';
	var $limit = 10;

	function __construct(){
		parent::__construct();
		$this->load->library('General');
        $this->load->model('m_all');
	}
	
    function index(){
        $configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		
		$config = array(
			'fileView' => 'upload-data/index',
			'pageTitle' => 'Upload CSV File',
			'action' => $routeBackend.$this->module.'/submit',
			'back'=> $routeBackend.$this->module,
		);
		$this->template($config);
    }

    public function submit(){
        $configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
        $this->load->library('Appexcel');
        $data = array();
        $errorUpload = false;
        $errorUploadMsg = '';

        $upload = null;
        if (strlen($_FILES['csv_file']['name']) > 0) {
            $upload = $this->doUpload();
            if($upload['success'] == true){
                $data['csv_file'] = $upload['data']['file_name'];
                $data['original_file'] = $upload['data'];
            }
            else{
                $errorUpload = true;
                $errorUploadMsg = $upload['msg'];
            }
        }

        if($errorUpload == false){
            $fname = $data['csv_file'];
            $dir = './upload/';
            $ext = substr($data['original_file']['file_ext'], 1);
            $rawData = $this->appexcel->getExcelData($dir, $fname, $ext);
            $this->extractData($rawData);
            //echo '<pre>'.print_r($a, 1).'</pre>';
            $this->session->set_flashdata('success', "Data Uploaded");
		    redirect($routeBackend.$this->module);
        }
        if($errorUpload == true){
            $this->session->set_flashdata('error', $errorUploadMsg);
            redirect($routeBackend.$this->module);
        }
    }

    private function extractData($rawData = array()){
        $row = 0;
        $json = array();
        foreach($rawData as $data){
            $num = count ($data);
            if ($row == 0) {
                for ($c = 0; $c < $num; $c++) {
                    $fld[] = $data[$c];
                }
            }
            elseif ($data[0] != "") {
                $dt = array();
                for ($c=0; $c < $num; $c++) {
                    $dt[$fld[$c]] = $data[$c];
                }

                $roll_number = ($dt['roll_number'] != '' && $dt['roll_number'] != 'NULL') ? $dt['roll_number'] : "";
                $postCode = ($dt['post_code'] != '' && $dt['post_code'] != 'NULL') ? $dt['post_code'] : "";
                $sector = ($dt['post_name'] != '' && $dt['post_name'] != 'NULL') ? $dt['post_name'] : "";
                $fullName = ($dt['name'] != '' && $dt['name'] != 'NULL') ? $dt['name'] : "";
                $name_bn = ($dt['name_bn'] != '' && $dt['name_bn'] != 'NULL') ? $dt['name_bn'] : "";
                $father = ($dt['father'] != '' && $dt['father'] != 'NULL') ? $dt['father'] : "";
                $father_bn = ($dt['father_bn'] != '' && $dt['father_bn'] != 'NULL') ? $dt['father_bn'] : "";
                $mother = ($dt['mother'] != '' && $dt['mother'] != 'NULL') ? $dt['mother'] : "";
                $mother_bn = ($dt['mother_bn'] != '' && $dt['mother_bn'] != 'NULL') ? $dt['mother_bn'] : "";
                $dob = ($dt['dob'] != '' && $dt['dob'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['dob']) : "";
                $age_as = ($dt['age_as'] != '' && $dt['age_as'] != 'NULL') ? $dt['age_as'] : "";
                $age_calculate_date = ($dt['age_calculate_date'] != '' && $dt['age_calculate_date'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['age_calculate_date']) : "";
                $gender = ($dt['gender'] != '' && $dt['gender'] != 'NULL') ? $dt['gender'] : "";
                $nid = ($dt['nid'] != '' && $dt['nid'] != 'NULL') ? $dt['nid'] : "";
                $nid_no = ($dt['nid_no'] != '' && $dt['nid_no'] != 'NULL') ? $dt['nid_no'] : "";
                $breg = ($dt['breg'] != '' && $dt['breg'] != 'NULL') ? $dt['breg'] : "";
                $breg_no = ($dt['breg_no'] != '' && $dt['breg_no'] != 'NULL') ? $dt['breg_no'] : "";
                $passport = ($dt['passport'] != '' && $dt['passport'] != 'NULL') ? $dt['passport'] : "";
                $passport_no = ($dt['passport_no'] != '' && $dt['passport_no'] != 'NULL') ? $dt['passport_no'] : "";
                $marital_status = ($dt['marital_status'] != '' && $dt['marital_status'] != 'NULL') ? $dt['marital_status'] : "";
                $spouse_name = ($dt['spouse_name'] != '' && $dt['spouse_name'] != 'NULL') ? $dt['spouse_name'] : "";
                $nationality = ($dt['nationality'] != '' && $dt['nationality'] != 'NULL') ? $dt['nationality'] : "";
                $religion = ($dt['religion'] != '' && $dt['religion'] != 'NULL') ? $dt['religion'] : "";
                $mobile = ($dt['mobile'] != '' && $dt['mobile'] != 'NULL') ? $dt['mobile'] : "";
                $email = ($dt['email'] != '' && $dt['email'] != 'NULL') ? $dt['email'] : "";
                $quota = ($dt['quota'] != '' && $dt['quota'] != 'NULL') ? $dt['quota'] : "";
                $dep_status = ($dt['dep_status'] != '' && $dt['dep_status'] != 'NULL') ? $dt['dep_status'] : "";
                $home_district = ($dt['home_district'] != '' && $dt['home_district'] != 'NULL') ? $dt['home_district'] : "";
                $present_district = ($dt['present_district'] != '' && $dt['present_district'] != 'NULL') ? $dt['present_district'] : "";
                $present_upazila = ($dt['present_upazila'] != '' && $dt['present_upazila'] != 'NULL') ? $dt['present_upazila'] : "";
                $present_post = ($dt['present_post'] != '' && $dt['present_post'] != 'NULL') ? $dt['present_post'] : "";
                $present_postcode = ($dt['present_postcode'] != '' && $dt['present_postcode'] != 'NULL') ? $dt['present_postcode'] : "";
                $present_village = ($dt['present_village'] != '' && $dt['present_village'] != 'NULL') ? $dt['present_village'] : "";
                $present_careof = ($dt['present_careof'] != '' && $dt['present_careof'] != 'NULL') ? $dt['present_careof'] : "";
                $same_as_present = ($dt['same_as_present'] != '' && $dt['same_as_present'] != 'NULL') ? $dt['same_as_present'] : "";
                $permanent_district = ($dt['permanent_district'] != '' && $dt['permanent_district'] != 'NULL') ? $dt['permanent_district'] : "";
                $permanent_upazila = ($dt['permanent_upazila'] != '' && $dt['permanent_upazila'] != 'NULL') ? $dt['permanent_upazila'] : "";
                $permanent_post = ($dt['permanent_post'] != '' && $dt['permanent_post'] != 'NULL') ? $dt['permanent_post'] : "";
                $permanent_postcode = ($dt['permanent_postcode'] != '' && $dt['permanent_postcode'] != 'NULL') ? $dt['permanent_postcode'] : "";
                $permanent_village = ($dt['permanent_village'] != '' && $dt['permanent_village'] != 'NULL') ? $dt['permanent_village'] : "";
                $permanent_careof = ($dt['permanent_careof'] != '' && $dt['permanent_careof'] != 'NULL') ? $dt['permanent_careof'] : "";
                $jsc_exam = ($dt['jsc_exam'] != '' && $dt['jsc_exam'] != 'NULL') ? $dt['jsc_exam'] : "";
                $jsc_roll = ($dt['jsc_roll'] != '' && $dt['jsc_roll'] != 'NULL') ? $dt['jsc_roll'] : "";
                $jsc_board = ($dt['jsc_board'] != '' && $dt['jsc_board'] != 'NULL') ? $dt['jsc_board'] : "";
                $jsc_year = ($dt['jsc_year'] != '' && $dt['jsc_year'] != 'NULL') ? $dt['jsc_year'] : "";
                $jsc_institute = ($dt['jsc_institute'] != '' && $dt['jsc_institute'] != 'NULL') ? $dt['jsc_institute'] : "";
                $jsc_result_type = ($dt['jsc_result_type'] != '' && $dt['jsc_result_type'] != 'NULL') ? $dt['jsc_result_type'] : "";
                $jsc_result_type_text = ($dt['jsc_result_type_text'] != '' && $dt['jsc_result_type_text'] != 'NULL') ? $dt['jsc_result_type_text'] : "";
                $jsc_result = ($dt['jsc_result'] != '' && $dt['jsc_result'] != 'NULL') ? $dt['jsc_result'] : "";
                $ssc_exam = ($dt['ssc_exam'] != '' && $dt['ssc_exam'] != 'NULL') ? $dt['ssc_exam'] : "";
                $ssc_roll = ($dt['ssc_roll'] != '' && $dt['ssc_roll'] != 'NULL') ? $dt['ssc_roll'] : "";
                $ssc_board = ($dt['ssc_board'] != '' && $dt['ssc_board'] != 'NULL') ? $dt['ssc_board'] : "";
                $ssc_year = ($dt['ssc_year'] != '' && $dt['ssc_year'] != 'NULL') ? $dt['ssc_year'] : "";
                $ssc_group = ($dt['ssc_group'] != '' && $dt['ssc_group'] != 'NULL') ? $dt['ssc_group'] : "";
                $ssc_result_type = ($dt['ssc_result_type'] != '' && $dt['ssc_result_type'] != 'NULL') ? $dt['ssc_result_type'] : "";
                $ssc_result_type_text = ($dt['ssc_result_type_text'] != '' && $dt['ssc_result_type_text'] != 'NULL') ? $dt['ssc_result_type_text'] : "";
                $ssc_result = ($dt['ssc_result'] != '' && $dt['ssc_result'] != 'NULL') ? $dt['ssc_result'] : "";
                $ssc_result_eq = ($dt['ssc_result_eq'] != '' && $dt['ssc_result_eq'] != 'NULL') ? $dt['ssc_result_eq'] : "";
                $ssc_verified = ($dt['ssc_verified'] != '' && $dt['ssc_verified'] != 'NULL') ? $dt['ssc_verified'] : "";
                $hsc_exam = ($dt['hsc_exam'] != '' && $dt['hsc_exam'] != 'NULL') ? $dt['hsc_exam'] : "";
                $hsc_roll = ($dt['hsc_roll'] != '' && $dt['hsc_roll'] != 'NULL') ? $dt['hsc_roll'] : "";
                $hsc_board = ($dt['hsc_board'] != '' && $dt['hsc_board'] != 'NULL') ? $dt['hsc_board'] : "";
                $hsc_year = ($dt['hsc_year'] != '' && $dt['hsc_year'] != 'NULL') ? $dt['hsc_year'] : "";
                $hsc_group = ($dt['hsc_group'] != '' && $dt['hsc_group'] != 'NULL') ? $dt['hsc_group'] : "";
                $hsc_result_type = ($dt['hsc_result_type'] != '' && $dt['hsc_result_type'] != 'NULL') ? $dt['hsc_result_type'] : "";
                $hsc_result_type_text = ($dt['hsc_result_type_text'] != '' && $dt['hsc_result_type_text'] != 'NULL') ? $dt['hsc_result_type_text'] : "";
                $hsc_result = ($dt['hsc_result'] != '' && $dt['hsc_result'] != 'NULL') ? $dt['hsc_result'] : "";
                $hsc_result_eq = ($dt['hsc_result_eq'] != '' && $dt['hsc_result_eq'] != 'NULL') ? $dt['hsc_result_eq'] : "";
                $hsc_verified = ($dt['hsc_verified'] != '' && $dt['hsc_verified'] != 'NULL') ? $dt['hsc_verified'] : "";
                $gra_exam = ($dt['gra_exam'] != '' && $dt['gra_exam'] != 'NULL') ? $dt['gra_exam'] : "";
                $gra_subject = ($dt['gra_subject'] != '' && $dt['gra_subject'] != 'NULL') ? $dt['gra_subject'] : "";
                $gra_institute = ($dt['gra_institute'] != '' && $dt['gra_institute'] != 'NULL') ? $dt['gra_institute'] : "";
                $gra_year = ($dt['gra_year'] != '' && $dt['gra_year'] != 'NULL') ? $dt['gra_year'] : "";
                $gra_result_type = ($dt['gra_result_type'] != '' && $dt['gra_result_type'] != 'NULL') ? $dt['gra_result_type'] : "";
                $gra_result_type_text = ($dt['gra_result_type_text'] != '' && $dt['gra_result_type_text'] != 'NULL') ? $dt['gra_result_type_text'] : "";
                $gra_result = ($dt['gra_result'] != '' && $dt['gra_result'] != 'NULL') ? $dt['gra_result'] : "";
                $gra_result_eq = ($dt['gra_result_eq'] != '' && $dt['gra_result_eq'] != 'NULL') ? $dt['gra_result_eq'] : "";
                $gra_duration = ($dt['gra_duration'] != '' && $dt['gra_duration'] != 'NULL') ? $dt['gra_duration'] : "";
                $mas_exam = ($dt['mas_exam'] != '' && $dt['mas_exam'] != 'NULL') ? $dt['mas_exam'] : "";
                $mas_subject = ($dt['mas_subject'] != '' && $dt['mas_subject'] != 'NULL') ? $dt['mas_subject'] : "";
                $mas_institute = ($dt['mas_institute'] != '' && $dt['mas_institute'] != 'NULL') ? $dt['mas_institute'] : "";
                $mas_year = ($dt['mas_year'] != '' && $dt['mas_year'] != 'NULL') ? $dt['mas_year'] : "";
                $mas_result_type = ($dt['mas_result_type'] != '' && $dt['mas_result_type'] != 'NULL') ? $dt['mas_result_type'] : "";
                $mas_result_type_text = ($dt['mas_result_type_text'] != '' && $dt['mas_result_type_text'] != 'NULL') ? $dt['mas_result_type_text'] : "";
                $mas_result = ($dt['mas_result'] != '' && $dt['mas_result'] != 'NULL') ? $dt['mas_result'] : "";
                $mas_result_eq = ($dt['mas_result_eq'] != '' && $dt['mas_result_eq'] != 'NULL') ? $dt['mas_result_eq'] : "";
                $mas_duration = ($dt['mas_duration'] != '' && $dt['mas_duration'] != 'NULL') ? $dt['mas_duration'] : "";
                $employment_type1 = ($dt['employment_type1'] != '' && $dt['employment_type1'] != 'NULL') ? $dt['employment_type1'] : "";
                $organization1 = ($dt['organization1'] != '' && $dt['organization1'] != 'NULL') ? $dt['organization1'] : "";
                $designation1 = ($dt['designation1'] != '' && $dt['designation1'] != 'NULL') ? $dt['designation1'] : "";
                $office_address1 = ($dt['office_address1'] != '' && $dt['office_address1'] != 'NULL') ? $dt['office_address1'] : "";
                $job_start_date1 = ($dt['job_start_date1'] != '' && $dt['job_start_date1'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_start_date1']) : "";
                $job_end_date1 = ($dt['job_end_date1'] != '' && $dt['job_end_date1'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_end_date1']) : "";
                $currently_working1 = ($dt['currently_working1'] != '' && $dt['currently_working1'] != 'NULL') ? $dt['currently_working1'] : "";
                $job_description1 = ($dt['job_description1'] != '' && $dt['job_description1'] != 'NULL') ? $dt['job_description1'] : "";
                $job_duration1 = ($dt['job_duration1'] != '' && $dt['job_duration1'] != 'NULL') ? $dt['job_duration1'] : "";
                $employment_type2 = ($dt['employment_type2'] != '' && $dt['employment_type2'] != 'NULL') ? $dt['employment_type2'] : "";
                $organization2 = ($dt['organization2'] != '' && $dt['organization2'] != 'NULL') ? $dt['organization2'] : "";
                $designation2 = ($dt['designation2'] != '' && $dt['designation2'] != 'NULL') ? $dt['designation2'] : "";
                $office_address2 = ($dt['office_address2'] != '' && $dt['office_address2'] != 'NULL') ? $dt['office_address2'] : "";
                $job_start_date2 = ($dt['job_start_date2'] != '' && $dt['job_start_date2'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_start_date2']) : "";
                $job_end_date2 = ($dt['job_end_date2'] != '' && $dt['job_end_date2'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_end_date2']) : "";
                $currently_working2 = ($dt['currently_working2'] != '' && $dt['currently_working2'] != 'NULL') ? $dt['currently_working2'] : "";
                $job_description2 = ($dt['job_description2'] != '' && $dt['job_description2'] != 'NULL') ? $dt['job_description2'] : "";
                $job_duration2 = ($dt['job_duration2'] != '' && $dt['job_duration2'] != 'NULL') ? $dt['job_duration2'] : "";
                $employment_type3 = ($dt['employment_type3'] != '' && $dt['employment_type3'] != 'NULL') ? $dt['employment_type3'] : "";
                $organization3 = ($dt['organization3'] != '' && $dt['organization3'] != 'NULL') ? $dt['organization3'] : "";
                $designation3 = ($dt['designation3'] != '' && $dt['designation3'] != 'NULL') ? $dt['designation3'] : "";
                $office_address3 = ($dt['office_address3'] != '' && $dt['office_address3'] != 'NULL') ? $dt['office_address3'] : "";
                $job_start_date3 = ($dt['job_start_date3'] != '' && $dt['job_start_date3'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_start_date3']) : "";
                $job_end_date3 = ($dt['job_end_date3'] != '' && $dt['job_end_date3'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_end_date3']) : "";
                $currently_working3 = ($dt['currently_working3'] != '' && $dt['currently_working3'] != 'NULL') ? $dt['currently_working3'] : "";
                $job_description3 = ($dt['job_description3'] != '' && $dt['job_description3'] != 'NULL') ? $dt['job_description3'] : "";
                $job_duration3 = ($dt['job_duration3'] != '' && $dt['job_duration3'] != 'NULL') ? $dt['job_duration3'] : "";
                $employment_type4 = ($dt['employment_type4'] != '' && $dt['employment_type4'] != 'NULL') ? $dt['employment_type4'] : "";
                $organization4 = ($dt['organization4'] != '' && $dt['organization4'] != 'NULL') ? $dt['organization4'] : "";
                $designation4 = ($dt['designation4'] != '' && $dt['designation4'] != 'NULL') ? $dt['designation4'] : "";
                $office_address4 = ($dt['office_address4'] != '' && $dt['office_address4'] != 'NULL') ? $dt['office_address4'] : "";
                $job_start_date4 = ($dt['job_start_date4'] != '' && $dt['job_start_date4'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_start_date4']) : "";
                $job_end_date4 = ($dt['job_end_date4'] != '' && $dt['job_end_date4'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['job_end_date4']) : "";
                $currently_working4 = ($dt['currently_working4'] != '' && $dt['currently_working4'] != 'NULL') ? $dt['currently_working4'] : "";
                $job_description4 = ($dt['job_description4'] != '' && $dt['job_description4'] != 'NULL') ? $dt['job_description4'] : "";
                $job_duration4 = ($dt['job_duration4'] != '' && $dt['job_duration4'] != 'NULL') ? $dt['job_duration4'] : "";
                $total_job_exp = ($dt['total_job_exp'] != '' && $dt['total_job_exp'] != 'NULL') ? $dt['total_job_exp'] : "";
                $oth_exp1 = ($dt['oth_exp1'] != '' && $dt['oth_exp1'] != 'NULL') ? $dt['oth_exp1'] : "";
                $oth_exp_ans1 = ($dt['oth_exp_ans1'] != '' && $dt['oth_exp_ans1'] != 'NULL') ? $dt['oth_exp_ans1'] : "";
                $oth_exp_text1 = ($dt['oth_exp_text1'] != '' && $dt['oth_exp_text1'] != 'NULL') ? $dt['oth_exp_text1'] : "";
                $oth_exp2 = ($dt['oth_exp2'] != '' && $dt['oth_exp2'] != 'NULL') ? $dt['oth_exp2'] : "";
                $oth_exp_ans2 = ($dt['oth_exp_ans2'] != '' && $dt['oth_exp_ans2'] != 'NULL') ? $dt['oth_exp_ans2'] : "";
                $oth_exp_text2 = ($dt['oth_exp_text2'] != '' && $dt['oth_exp_text2'] != 'NULL') ? $dt['oth_exp_text2'] : "";
                $ip_address = ($dt['ip_address'] != '' && $dt['ip_address'] != 'NULL') ? $dt['ip_address'] : "";
                $fee_status = ($dt['fee_status'] != '' && $dt['fee_status'] != 'NULL') ? $dt['fee_status'] : "";
                $fee_payment_time = ($dt['fee_payment_time'] != '' && $dt['fee_payment_time'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['fee_payment_time']) : "";
                $screening = ($dt['screening'] != '' && $dt['screening'] != 'NULL') ? $dt['screening'] : "";
                $created_time = ($dt['created_time'] != '' && $dt['created_time'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['created_time']) : "";
                $expire_time = ($dt['expire_time'] != '' && $dt['expire_time'] != 'NULL') ? $this->appexcel->getCellDateValue($dt['expire_time']) : "";

                $sectorId = $this->saveSector($sector);

                $dataEntity = array(
                    'roll_number' => $roll_number,
                    'fullname' => $fullName, 'name_bn' => $name_bn, 'father' => $father, 'father_bn' => $father_bn,
                    'mother' => $mother, 'mother_bn' => $mother_bn, 'dob' => $dob, 'age_as' => $age_as,
                    'age_calculate_date' => $age_calculate_date, 'gender' => $gender, 'nid' => $nid, 'nid_id' => $nid_no, 
                    'breg' => $breg, 'breg_id' => $breg_no, 'passport' => $passport, 'passport_id' => $passport_no,
                    'marital' => $marital_status, 'spouse_name' => $spouse_name, 'nationality' => $nationality, 'religion' => $religion,
                    'mobile_number' => $mobile, 'email' => $email, 'quota' => $quota, 'dep_status' => $dep_status, 
                    'home_district' => $home_district, 'same_as_present' => $same_as_present, 'total_job_exp' => $total_job_exp, 
                    'oth_exp1' => $oth_exp1, 'oth_exp_ans1' => $oth_exp_ans1, 'oth_exp_text1' => $oth_exp_text1, 'oth_exp2' => $oth_exp2, 
                    'oth_exp_ans2' => $oth_exp_ans2, 'oth_exp_text2' => $oth_exp_text2, 'ip_address' => $ip_address, 
                    'fee_status' => $fee_status, 'fee_payment_time' => $fee_payment_time, 'screening' => $screening, 
                    'created_time' => $created_time, 'expire_time' => $expire_time, 'sector_id' => $sectorId,
                );
                //echo '<pre>'.print_r(array($dataEntity, $dt), 1).'</pre>';
                $entityId = $this->m_all->doInsert('entity', $dataEntity);

                $dataEmployment1 = array(
                    'entity_id' => $entityId, 'employment_type1' => $employment_type1, 'organization1' => $organization1, 
                    'designation1' => $designation1, 'office_address1' => $office_address1, 'job_start_date1' => $job_start_date1, 
                    'job_end_date1' => $job_end_date1, 'currently_working1' => $currently_working1, 'job_description1' => $job_description1, 
                    'job_duration1' => $job_duration1
                );
                $employment_type1_id = $this->m_all->doInsert('entity_employment_1', $dataEmployment1);


                $dataEmployment2 = array(
                    'entity_id' => $entityId, 'employment_type2' => $employment_type2, 'organization2' => $organization2, 
                    'designation2' => $designation2, 'office_address2' => $office_address2, 'job_start_date2' => $job_start_date2, 
                    'job_end_date2' => $job_end_date2, 'currently_working2' => $currently_working2, 'job_description2' => $job_description2, 
                    'job_duration2' => $job_duration2
                );
                $employment_type2_id = $this->m_all->doInsert('entity_employment_2', $dataEmployment2);


                $dataEmployment3 = array(
                    'entity_id' => $entityId, 'employment_type3' => $employment_type3, 'organization3' => $organization3, 
                    'designation3' => $designation3, 'office_address3' => $office_address3, 'job_start_date3' => $job_start_date3, 
                    'job_end_date3' => $job_end_date3, 'currently_working3' => $currently_working3, 'job_description3' => $job_description3, 
                    'job_duration3' => $job_duration3
                );
                $employment_type3_id = $this->m_all->doInsert('entity_employment_3', $dataEmployment3);


                $dataEmployment4 = array(
                    'entity_id' => $entityId, 'employment_type4' => $employment_type4, 'organization4' => $organization4, 
                    'designation4' => $designation4, 'office_address4' => $office_address4, 'job_start_date4' => $job_start_date4, 
                    'job_end_date4' => $job_end_date4, 'currently_working4' => $currently_working4, 'job_description4' => $job_description4, 
                    'job_duration4' => $job_duration4
                );
                $employment_type4_id = $this->m_all->doInsert('entity_employment_4', $dataEmployment4);


                $dataGRA = array(
                    'entity_id' => $entityId, 'gra_exam' => $gra_exam, 'gra_subject' => $gra_subject, 
                    'gra_institute' => $gra_institute, 'gra_year' => $gra_year, 'gra_result_type' => $gra_result_type, 
                    'gra_result_type_text' => $gra_result_type_text, 'gra_result' => $gra_result, 'gra_result_eq' => $gra_result_eq, 
                    'gra_duration' => $gra_duration
                );
                $entity_gra_id = $this->m_all->doInsert('entity_gra', $dataGRA);


                $dataHSC = array(
                    'entity_id' => $entityId, 'hsc_exam' => $hsc_exam, 'hsc_roll' => $hsc_roll, 
                    'hsc_board' => $hsc_board, 'hsc_year' => $hsc_year, 'hsc_group' => $hsc_group, 
                    'hsc_result_type' => $hsc_result_type, 'hsc_result_type_text' => $hsc_result_type_text, 'hsc_result' => $hsc_result, 
                    'hsc_result_eq' => $hsc_result_eq, 'hsc_verified' => $hsc_verified,
                );
                $entity_hsc_id = $this->m_all->doInsert('entity_hsc', $dataHSC);


                $dataJSC = array(
                    'entity_id' => $entityId, 'jsc_exam' => $jsc_exam, 'jsc_roll' => $jsc_roll, 
                    'jsc_board' => $jsc_board, 'jsc_year' => $jsc_year, 'jsc_institute' => $jsc_institute, 
                    'jsc_result_type' => $jsc_result_type, 'jsc_result_type_text' => $jsc_result_type_text, 'jsc_result' => $jsc_result
                );
                $entity_jsc_id = $this->m_all->doInsert('entity_jsc', $dataJSC);


                $dataMAS = array(
                    'entity_id' => $entityId, 'mas_exam' => $mas_exam, 'mas_subject' => $mas_subject, 
                    'mas_institute' => $mas_institute, 'mas_year' => $mas_year, 'mas_result_type' => $mas_result_type, 
                    'mas_result_type_text' => $mas_result_type_text, 'mas_result' => $mas_result, 'mas_result_eq' => $mas_result_eq,
                    'mas_duration' => $mas_duration
                );
                $entity_mas_id = $this->m_all->doInsert('entity_mas', $dataMAS);


                $dataPermanent = array(
                    'entity_id' => $entityId, 'permanent_district' => $permanent_district, 'permanent_upazilla' => $permanent_upazila, 
                    'permanent_post' => $permanent_post, 'permanent_postcode' => $permanent_postcode, 'permanent_village' => $permanent_village, 
                    'permanent_careof' => $permanent_careof
                );
                $entity_permanent_id = $this->m_all->doInsert('entity_permanent', $dataPermanent);

                $dataPresent = array(
                    'entity_id' => $entityId, 'present_district' => $present_district, 'present_upazila' => $present_upazila, 
                    'present_post' => $present_post, 'present_postcode' => $present_postcode, 'present_village' => $present_village, 
                    'present_careof' => $present_careof
                );
                $entity_present_id = $this->m_all->doInsert('entity_present', $dataPresent);


                $dataSSC = array(
                    'entity_id' => $entityId, 'ssc_exam' => $ssc_exam, 'ssc_roll' => $ssc_roll, 
                    'ssc_board' => $ssc_board, 'ssc_year' => $ssc_year, 'ssc_group' => $ssc_group, 
                    'ssc_result_type' => $ssc_result_type, 'ssc_result_type_text' => $ssc_result_type_text, 'ssc_result' => $ssc_result,
                    'ssc_result_eq' => $ssc_result_eq, 'ssc_verified' => $ssc_verified,
                );
                $entity_ssc_id = $this->m_all->doInsert('entity_ssc', $dataSSC);
              
            }
            $row++;
        }

        
    }

    private function saveSector($sectorName = ''){
        $sectorId = -1;
        $this->load->model('m_master');
        $sector = $this->m_master->getSector($sectorName);
        if($sector['count'] <= 0){
            $sectorId = $this->m_all->doInsert('sector', array('sector_name' => $sectorName));
        }
        else{
            $sectorId = $sector['data']['sector_id'];
        }
        return $sectorId;
    }

    private function doUpload(){
        $return = array();
        $splitName = explode('.', $_FILES['csv_file']['name']);
        $newFilename = md5(strtotime('now').'-'.$splitName[0].'.'.$splitName[1]);
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'csv|xls|xlsx';
        //$config['allowed_types']        = '*';
		$config['max_size']             = 3000;
        $config['file_name'] = $newFilename;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('csv_file')){
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
