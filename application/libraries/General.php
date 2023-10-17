<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General {

    var $ci;

    public function __construct($config = array()){
		$this->ci =& get_instance();
	}

    public function resizeImage($filename){
        $return = array();
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => FALSE,
            'thumb_marker' => '_thumb',
            'width' => 2048,
            'height' => 2048
        );
        $this->ci->load->library('image_lib', $config_manip);
        if (!$this->ci->image_lib->resize()) {
            $error = array('error' => $this->ci->image_lib->display_errors());
            $return['success'] = false;
            $return['msg'] = $error;
            $this->ci->image_lib->clear();
        }
        else{
            $return['success'] = true;
            $return['msg'] = 'Resize success';
            $this->ci->image_lib->clear();
        }
        return $return;
    }
    
    function createSlug($title, $date){
        $this->ci->load->helper('text');
        $slug =  $date.'-'.mb_strtolower(url_title(convert_accented_characters($title)));
        return $slug;
    }

    function getLabelPublish($publish = 0, $link = "#"){ //config.php item option_publish
        $itemPublish = $this->ci->config->item('option_publish');
        $text = $itemPublish[$publish];
        $html = '';
        if($publish == 0){
            $html = '<span class="label-status bg-danger">'.$text.'</span>';
        }
        else{
            $html = '<span class="label-status bg-success">'.$text.'</span>';
        }
        return $html;
    }

    function getRateStyle($rate = 1, $classIcon = array()){
        $html = '';
        $icFilled = (isset($classIcon['star-filled'])) ? $classIcon['star-filled'] : 'lni-star-filled';
        $icHalf = (isset($classIcon['star-half'])) ? $classIcon['star-half'] : 'lni-star-half';
        
        for( $x = 0; $x < 5; $x++ ){
            if( floor( $rate ) - $x >= 1 ){ 
                $html .= '<span><i class="'.$icFilled.'"></i></span>'; 
            }
            else{ 
                $html .= '<span><i class="'.$icHalf.'"></i></span>'; 
            }
        }
        return $html;
    }
	
}
