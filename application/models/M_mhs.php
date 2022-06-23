<?php

class M_mhs extends CI_Model {

    public function tampil_data(){
        $query = "SELECT * FROM tbl_mhs";
        return $this->db->query($query)->result();
        return $this->db->get('tbl_mhs');
    }

    public function input_data(){
        return $this->db->get('tbl_mhs');
    }

    public function hapus(){
        return $this->db->get('tbl_mhs');
    }

    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tbl_mhs');
        $this->db->like('nim_mhs',$keyword);
        $this->db->or_like('nama_mhs',$keyword);
        $this->db->or_like('jurusan_mhs',$keyword);
        $this->db->or_like('prodi_mhs',$keyword);
        $this->db->or_like('semester_mhs',$keyword);
        $this->db->or_like('gol_mhs',$keyword);
        $this->db->or_like('alamat_mhs',$keyword);
        $this->db->or_like('nohp_mhs',$keyword);
        $this->db->or_like('email_mhs',$keyword);
        return $this->db->get()->result();
    }
}