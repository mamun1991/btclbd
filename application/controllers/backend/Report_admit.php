<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';

class Report_admit extends MY_Backend {

	var $module = 'report_admit';
	var $limit = 10;

	function __construct(){
		parent::__construct();
		$this->load->library('General');
        $this->load->model('m_master');
	}
	
    function index($offset = 0){
        $configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);

        $dataSector = $this->m_master->listSector();
		$comboSector = array(
            '-1' => 'All Position'
        );
		foreach($dataSector['data'] as $row){
			$comboSector[$row['sector_id']] = $row['sector_name'];
		}

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

			$avatar = 'no-avatar.jpg';
            if($row->photo != '' && file_exists($dirUpload.$row->photo)){
                $avatar = $row->photo;
            }
            $row->avatar = base_url().$dirUploadLink.$avatar;

            $signature = '';
            if($row->signature != '' && file_exists($dirUpload.$row->signature)){
                $signature = base_url().$dirUploadLink.$row->signature;
            }
            $row->signature = $signature;


            $submittedIssue = '';
			$admitIssue = $this->m_all->getSingle('admit_issue', array('roll_number' => $row->roll_number));
            if($admitIssue != null){
				$submittedIssue = 'Submitted';
			}
			$row->submit_issued = $submittedIssue;

			$newListData[$i] = $row;
		}
		
		
		$config = array(
			'fileView' => 'report-admit/index',
			'pageTitle' => 'Report Admit',
			'page' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'listData' => $newListData,
			'pagination' => $this->pagination->create_links(),
			'action' => $routeBackend.$this->module,
			'back'=> $routeBackend.$this->module,
            'comboSector' => $comboSector,
		);
		$this->template($config);
    }

    public function bulk_submit(){
		$configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';

		
		$config = array(
			'fileView' => 'report-admit/form-bulk',
			'pageTitle' => 'Bulk Submit Issue',
			'action' => $routeBackend.$this->module.'/save',
			'back'=> $routeBackend.$this->module,
		);
		$this->template($config);
	}


    public function save(){
        $configApp = $this->config->item('app');
		$routeBackend = $configApp['backend']['base_route'].'/';
		$dirUpload = $configApp['dir_upload'];
		$reqData = $this->input->post();
		
        $startRoll = $this->input->post('start_roll_number');
        $endRoll = $this->input->post('end_roll_number');

        $wrExamDate = $this->input->post('written_exam_date');
        $wrExamTime = $this->input->post('written_exam_time');
        $wrExamPlace = $this->input->post('written_exam_place');
        $phyExamDate = $this->input->post('physical_exam_date');
        $phyExamTime = $this->input->post('physical_exam_time');
        $phyExamPlace = $this->input->post('physical_exam_place');

        $ids = array();
        for($i = $startRoll;$i < $endRoll;$i++){
            $dataSave = array(
                'roll_number' => $i,
                'written_date' => $wrExamDate. ' ' .$wrExamTime. ':00',
                'written_place' => $wrExamPlace,
                'physical_date' => $phyExamDate. ' ' .$phyExamTime.':00',
                'physical_place' => $phyExamPlace,
                'created_at' => date('Y-m-d H:i:s')
            );
            $ids[] = $this->m_all->doInsert('admit_issue', $dataSave);
            
        }
        //echo print_r(array($startRoll, $endRoll), 1);        
		$this->session->set_flashdata('success', "Data Submitted");
		redirect($routeBackend.$this->module);

    }
    
    private function styleColumn(){
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
              'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
              'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
              'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
              'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
              'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
              'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        return $style_col;
    }

    private function styleRow(){
        $style_row = [
            'alignment' => [
              'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
              'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
              'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
              'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
              'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        return $style_row;
    }
    
	
}
