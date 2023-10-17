<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_master extends CI_Model{

    function getEntity($queryParam = array(), $limit = 10, $offset = 0){
        $sql = "SELECT * FROM ".$queryParam['table']." ";
        if(isset($queryParam['where'])){
            $whereStr = '';
            foreach($queryParam['where'] as $k => $v){
                $whereStr .= " AND WHERE  $k = '$v' ";
            }
            $whereStr = substr($whereStr, 4);
            $sql .= $whereStr;
        }
        $sql .= " ORDER BY ".$queryParam['field_sort']." DESC ";
        $sqlWithLimit = $sql;
        if($limit != 0){
            $sqlWithLimit = $sql . " LIMIT $offset, $limit ";
        }
        //echo print_r($sqlWithLimit, 1);
        $count = $this->db->query($sql)->num_rows();
        $data = $this->db->query($sqlWithLimit)->result();
        $output = array('total' => $count, 'data' => $data);
        return $output;
    }

    //SECTOR
    function listSector(){
        $this->db->select('*');
        $this->db->from('sector');
        $query = $this->db->get()->result_array();
        $output = array();
        $output['count'] = (count($query));
        $output['data'] = $query;
        return $output;
    }
    function getSector($sectorName = ''){
        $query = $this->db->get_where('sector', array('LOWER(sector_name)' => strtolower($sectorName)))->row_array();
        $output = array();
        $output['count'] = ((isset($query['sector_id'])) ? 1 : 0);
        $output['data'] = $query;
        return $output;
    }

    function searchSector($keyword = ''){
        $this->db->select('*');
        $this->db->from('sector');
        $this->db->like('LOWER(sector_name)', strtolower($keyword), 'after');
        $query = $this->db->get()->result_array();
        $output = array();
        $output['count'] = count($query);
        $output['data'] = $query;
        return $output;
    }

}

?>