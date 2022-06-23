<?php

class Mahasiswa_model extends CI_Model
{
    public function getMahasiswa($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_mhs')->result_array();
        } else {
            return $this->db->get_where('tbl_mhs', ['id_mhs' => $id])->result_array();
        }
    }

    public function deleteMahasiswa($id)
    {
        $this->db->delete('tbl_mhs', ['id_mhs' => $id]);
        return $this->db->affected_rows();
    }

    public function createMahasiswa($data)
    {
        $this->db->insert('tbl_mhs',$data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $id)
    {
        $this->db->update('tbl_mhs', $data, ['id_mhs' => $id]);
        return $this->db->affected_rows();
    }
}