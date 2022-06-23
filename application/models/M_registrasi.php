<?php 

class M_registrasi extends CI_Model {

    public function input_data(){
        return $this->db->get('tbl_mhs');
    }

}