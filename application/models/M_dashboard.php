<?php 
class M_dashboard extends CI_Model{
    
    public function get_jadwal() {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        return $this->db->get()->num_rows();
    }

    // public function get_konsultasi() {
    //     $this->db->select('*');
    //     $this->db->from('tbl_uji');
    //     return $this->db->get()->num_rows();
    // }

    public function get_mhs() {
        $this->db->select('*');
        $this->db->from('tbl_mhs');
        return $this->db->get()->num_rows();
    }

    public function jumlah_admin() {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        return $this->db->get()->num_rows();
    }
}