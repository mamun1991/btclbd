<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'core/MY_Backend.php';
require_once(APPPATH."libraries/phpspreadsheet/vendor/autoload.php"); 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
//use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Report_attendance extends MY_Backend {

	var $module = 'report_attendance';
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

			$newListData[$i] = $row;
		}
		
		
		$config = array(
			'fileView' => 'report-attendance/index',
			'pageTitle' => 'Attendance Report',
			'page' => ($this->uri->segment(3)) ? $this->uri->segment(3) : 0,
			'listData' => $newListData,
			'pagination' => $this->pagination->create_links(),
			'action' => $routeBackend.$this->module,
			'back'=> $routeBackend.$this->module,
            'comboSector' => $comboSector,
		);
		$this->template($config);
    }


    public function export(){
        $sectorGet = $this->input->get('s_id');
        $configApp = $this->config->item('app');
        $dirUpload = $configApp['dir_upload'];
		$dirUploadLink = substr($dirUpload, 2);
        $queryParam = array(
            'table' => 'entity', 
            'field_sort' => 'entity_id'
        );
        if($sectorGet != '' && $sectorGet != '-1'){
            $queryParam['where'] = array(
                'sector_id' => $sectorGet
            );
        }
		$listData = $this->m_master->getEntity($queryParam, 0, 0);

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
            $row->avatar = FCPATH.$dirUploadLink.$avatar;

            $signature = '';
            if($row->signature != '' && file_exists($dirUpload.$row->signature)){
                $signature = FCPATH.$dirUploadLink.$row->signature;
            }
            $row->signature = $signature;

			$newListData[$i] = $row;
		}
        $dynamicAppSettings = $this->getAppConfig();
        $logoImage = $dynamicAppSettings['export_applogo'];
        $styleCol = $this->styleColumn();
        $styleRow = $this->styleRow();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $html = new PhpOffice\PhpSpreadsheet\Helper\Html();

        
        //$sheet->mergeCells('A2:D2'); // Set Merge Cell pada kolom A1 sampai E1
        $drawing->setPath($logoImage); 
        $drawing->setCoordinates('A2');
        $drawing->setOffsetX(10);
        $drawing->setOffsetY(10);
        $drawing->setWidth(80);
        $drawing->setHeight(80);
        $sheet->getRowDimension(2)->setRowHeight(80);
        $drawing->setWorksheet($sheet);

        $alignmentHeader = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $colHeader = '
            <strong><font size="13">Attendance Sheet</font></strong> <br/>
        ';
        if($sectorGet !='' && $sectorGet != '-1' && $sectorGet != null){
            $sectorName = ' - ';
			$sectorData = $this->m_all->getSingle('sector', array('sector_id' => $sectorGet));
			if($sectorData != null){
				$sectorName = $sectorData->sector_name;
			}
            $colHeader .= '<strong><font size="10">Post Name: '.$sectorName.'</font></strong><br/>';
        }
        $styledColHeader = $html->toRichTextObject($colHeader);
        $sheet->mergeCells('B2:D2');
        $sheet->setCellValue('B2', $styledColHeader); 
        $sheet->getStyle('B2')->applyFromArray($alignmentHeader);


        $sheet->setCellValue('A4', "Applicant's Information"); 
        $sheet->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('93BFCF');
        $sheet->getStyle('A4')->getFont()->setSize(9);
        $sheet->setCellValue('B4', "Photo"); 
        $sheet->getStyle('B4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('93BFCF');
        $sheet->getStyle('B4')->getFont()->setSize(9);
        $sheet->setCellValue('C4', "Signature");
        $sheet->getStyle('C4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('93BFCF');
        $sheet->getStyle('C4')->getFont()->setSize(9);
        $sheet->setCellValue('D4', "Remarks"); 
        $sheet->getStyle('D4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('93BFCF');
        $sheet->getStyle('D4')->getFont()->setSize(9);

        $sheet->getStyle('A4')->applyFromArray($styleCol);
        $sheet->getStyle('B4')->applyFromArray($styleCol);
        $sheet->getStyle('C4')->applyFromArray($styleCol);
        $sheet->getStyle('D4')->applyFromArray($styleCol);

        $no = 1;
        $startRow = 5;
        foreach($newListData as $row){
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $colA = '
                <strong><font size="9">Roll No: '.$row->roll_number.'</font></strong> <br/>
                <strong><font size="9">Name: '.$row->fullname.'</font></strong><br/>
                <font size="9">Post: '.$row->sector_name.'</font><br/>
            ';
            $styledColA = $html->toRichTextObject($colA);
            $sheet->setCellValue('A'.$startRow, $styledColA);
            // $sheet->getStyle('A'.$startRow)->getFont()->setSize(9);
            $drawing->setPath($row->avatar); 
            $drawing->setCoordinates('B'.$startRow);
            $drawing->setOffsetX(10);
            $drawing->setOffsetY(10);
            $drawing->setWidth(120);
            $drawing->setHeight(120);
            $drawing->setWorksheet($sheet);
            
            if($row->signature != ''){
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setPath($row->signature); 
                $drawing->setCoordinates('C'.$startRow);
                $drawing->setOffsetX(10);
                $drawing->setOffsetY(10);
                $drawing->setWidth(120);
                $drawing->setHeight(120);
                $drawing->setWorksheet($sheet);
            }
            if($row->signature == ''){
                $sheet->setCellValue('C'.$startRow, $row->signature);
            }
            
            $sheet->setCellValue('D'.$startRow, $row->remarks);
            
            
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A'.$startRow)->applyFromArray($styleRow);
            $sheet->getStyle('B'.$startRow)->applyFromArray($styleRow);
            $sheet->getStyle('C'.$startRow)->applyFromArray($styleRow);
            $sheet->getStyle('D'.$startRow)->applyFromArray($styleRow);

            $sheet->getRowDimension($startRow)->setRowHeight(110);
            
            $no++; 
            $startRow++; 
        }
        
        $sheet->getColumnDimension('A')->setWidth(30); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(20); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(20); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->setTitle("Report Attendance");
        IOFactory::registerWriter('Pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);

        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Report Attendance - '.date('d F Y H:i').'.xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        // $writer = new Xlsx($spreadsheet);
        // $writer->save('php://output');
        
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="Report Attendance - '.date('d F Y H:i').'.pdf"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Mpdf');
        $writer->save('php://output');

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
