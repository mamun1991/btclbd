<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_settings extends CI_Model{
 
    var $tbl = 'app';
	public function getSettings(){
        $data = $this->db->get_where($this->tbl, array('app_id' => 1))->row_array();
        return $data;
    }
}

?>