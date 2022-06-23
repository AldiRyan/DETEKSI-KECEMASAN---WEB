<?php 

class M_psikolog extends CI_Model {

    public function tampil_data(){
        $query = "SELECT * FROM tbl_psikolog";
        return $this->db->query($query)->result();
        return $this->db->get('tbl_psikolog');
    }

    public function insert_data(){
        return $this->db->get('tbl_psikolog');
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}