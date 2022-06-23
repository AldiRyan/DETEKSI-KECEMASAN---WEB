<?php

class Admin_model extends CI_Model{
    public function getAdmin($id = null){
        if($id === null){
            return $this->db->get('tbl_admin')->result_array();
        }else{
            return $this->db->get_where('tbl_admin', ['id_admin' => $id])->result_array();
        }
    }

    public function deleteAdmin($id){
        $this->db->delete('tbl_admin', ['id_admin' => $id]);
        return $this->db->affected_rows();
    }

    public function createAdmin($data){
        $this->db->insert('tbl_admin', $data);
        return $this->db->affected_rows();
    }

    public function updateAdmin($data, $id){
        $this->db->update('tbl_admin', $data, ['id_admin' => $id]);
        return $this->db->affected_rows();
    }
}