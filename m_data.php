<?php
class M_data extends CI_Model{
 
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }
 
    function jumlah_data($table){
        return $this->db->get($table)->num_rows();
    }
 
    function tampil_data($table, $number,$offset){
        return $this->db->get($table,$number,$offset)->result();
    }
 
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
 
    function single_data($where,$table){       
        return $this->db->get_where($table,$where);
    }
 
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}