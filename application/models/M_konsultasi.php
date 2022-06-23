<?php

class M_konsultasi extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil_manual');
        $this->db->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_hasil_manual.id_mhs');
        $this->db->join('tbl_jadwal', 'tbl_jadwal.id_mhs = tbl_mhs.id_mhs');
        $query = $this->db->get();
        return $query->result();
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_uji');
        $this->db->like('nama_mhs', $keyword);
        $this->db->or_like('tanggal_jadwal', $keyword);
        $this->db->or_like('nama_psikolog', $keyword);
        $this->db->or_like('hasil_konsultasi', $keyword);
    }
}
