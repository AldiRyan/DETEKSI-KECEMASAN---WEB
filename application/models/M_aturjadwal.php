<?php
class M_aturjadwal extends CI_Model{
    
    public function form_insert($data){
        $this->db->insert('tbl_jadwal', $data);
    }

    public function countRow(){
        $query = $this->db->query("SELECT * FROM tbl_jadwal");
        echo $query->num_row();
    }

}