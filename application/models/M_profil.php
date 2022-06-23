<?php

class M_profil extends CI_Model {

    public function detail_data($id = NULL) {
        $query = $this->db->get_where('tbl_mhs', array('id_mhs' => $id))->row_array();
        return $query;
    }

}