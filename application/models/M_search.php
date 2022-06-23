<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model {

    public function ambil_data($keyword=null) {
        $this->db->select('*');
        $this->db->from('tbl_mahasiswa');
        if(!empty($keyword)){
            $this->db->like('nim',$keyword);
        }
        return $this->db->get()->result_array();
    }
}