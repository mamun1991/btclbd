<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("phpspreadsheet/vendor/autoload.php"); 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Appexcel {

    var $ci;

    public function __construct($config = array()){
		$this->ci =& get_instance();
	}

    public function getExcelData($dir, $filename, $ext){
        
        $data = array();
        $spreadsheet = new Spreadsheet();
        $inputFileType = ucfirst($ext);
        $inputFileName = ($dir == '') ? $filename : $dir.$filename;
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();
        return $data;
    }

    public function getCellDateValue($value){
        $d = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        return $d->format('Y-m-d H:i:s');
        // $unix_date = ($value - 25569) * 86400;
        // $excel_date = 25569 + ($unix_date / 86400);
        // $unix_date = ($excel_date - 25569) * 86400;
        // $d = gmdate("Y-m-d", $unix_date);
    }
	
}
