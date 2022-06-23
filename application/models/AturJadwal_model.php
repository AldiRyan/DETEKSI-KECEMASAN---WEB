<?php 

class AturJadwal_model extends CI_Model{
    public function getJadwal($id = null){
        if($id === null){
            return $this->db->get('tbl_jadwal')->result_array();
        }else{
            return $this->db->get_where('tbl_jadwal', ['id_jadwal' => $id])->result_array();
        }
    }

    public function deleteJadwal($id){
        $this->db->delete('tbl_jadwal', ['id_jadwal' => $id]);
        return $this->db->affected_rows();
    }

    public function createJadwal($data){
        $this->db->insert('tbl_jadwal', $data);
        return $this->db->affected_rows();
    }

    public function updateJadwal($data, $id){
        $this->db->update('tbl_jadwal', $data, ['id_jadwal' => $id]);
        return $this->db->affected_rows();
    }
}