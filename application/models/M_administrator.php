<?php

class M_administrator extends CI_Model {
    
    public function tampil_data(){
        $query = "SELECT * FROM tbl_admin";
        return $this->db->query($query)->result();
        return $this->db->get('tbl_admin');
    }

    public function input_data(){
        return $this->db->get('tbl_admin');
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}