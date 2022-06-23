<?php

class Psikolog_model extends CI_Model{
    public function getPsikolog($id = null){
        if($id === null){
            return $this->db->get('tbl_psikolog')->result_array();
        }else{
            return $this->db->get_where('tbl_psikolog', ['id_psikolog' => $id])->result_array();
        }
    }

    public function deletePsikolog($id){
        $this->db->delete('tbl_psikolog', ['id_psikolog' => $id]);
        return $this->db->affected_rows();
    }

    public function createPsikolog($data){
        $this->db->insert('tbl_psikolog',$data);
        return $this->db->affected_rows();
    }

    public function updatePsikolog($data, $id){
        $this->db->update('tbl_psikolog', $data, ['id_psikolog' => $id]);
        return $this->db->affected_rows();
    }
}