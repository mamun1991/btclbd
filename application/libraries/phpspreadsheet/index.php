<?php 
require_once("vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KRFExcel{

    var $filename;
    var $dir;
    var $ext;

    public function init(){
        $this->dir = '';
        $this->filename = '';
        $this->ext = '';
    }

    public function setDir($dir){
        $this->dir = $dir;
    }

    public function setFilename($filename){
        $this->filename = $filename;
    }

    public function setExt($ext = 'xls'){
        $this->ext = $ext;
    }

    public function getCellDateValue($value){
        $d = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        return $d->format('Y-m-d H:i:s');
        // $unix_date = ($value - 25569) * 86400;
        // $excel_date = 25569 + ($unix_date / 86400);
        // $unix_date = ($excel_date - 25569) * 86400;
        // $d = gmdate("Y-m-d", $unix_date);
    }

    public function getExcelData(){
        $data = array();
        $spreadsheet = new Spreadsheet();
        $inputFileType = ucfirst($this->ext);
        $inputFileName = ($this->dir == '') ? $this->filename : $this->dir.$this->filename;
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();
        return $data;
    }
}