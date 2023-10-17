<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_all extends CI_Model{
 
    function getAdmin($queryParam = array(), $limit = 10, $offset = 0){
        $sql = "SELECT * FROM ".$queryParam['table']." ";
        $sql .= " WHERE user_group != -1 ";
        $sql .= " ORDER BY ".$queryParam['field_sort']." DESC ";
        $sqlWithLimit = $sql . " LIMIT $offset, $limit ";
        //echo print_r($sqlWithLimit, 1);
        $count = $this->db->query($sql)->num_rows();
        $data = $this->db->query($sqlWithLimit)->result();
        $output = array('total' => $count, 'data' => $data);
        return $output;
    }

    function get($queryParam = array(), $limit = 10, $offset = 0){
        $sql = "SELECT * FROM ".$queryParam['table']." ORDER BY ".$queryParam['field_sort']." DESC ";
        $sqlWithLimit = $sql . " LIMIT $offset, $limit ";
        //echo print_r($sqlWithLimit, 1);
        $count = $this->db->query($sql)->num_rows();
        $data = $this->db->query($sqlWithLimit)->result();
        $output = array('total' => $count, 'data' => $data);
        return $output;
    }


    function getSingle($table, $param = array()){
        $query = $this->db->get_where($table, $param)->row();
        return $query;
    }

    public function doInsert($table, $data = array()){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function doUpdate($table, $where = array(), $data = array()){
        foreach($where as $k => $v){
            $this->db->where($k, $v);
        }
        $this->db->update($table, $data);
    }

    public function doDelete($table, $where = array()){
        foreach($where as $k => $v){
            $this->db->where($k, $v);
        }
        $this->db->delete($table);
    }
}

?>