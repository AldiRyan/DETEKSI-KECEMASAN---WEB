<?php 

class Riwayat_model extends CI_Model{
    public function getRiwayat($id = null){
        if($id === null){
            return $this->db->get('tbl_uji')->result_array();
        }else{
            return $this->db->get_where('tbl_uji', ['id_uji' => $id])->result_array();
        }
    }

    public function deleteRiwayat($id){
        $this->db->delete('tbl_uji', ['id_uji' => $id]);
        return $this->db->affected_rows();
    }

    public function createRiwayat($data){
        $this->db->insert('tbl_uji', $data);
        return $this->db->affected_rows();
    }

    public function updateRiwayat($data, $id){
        $this->db->update('tbl_uji', $data, ['id_uji' => $id]);
        return $this->db->affected_rows();
    }
}