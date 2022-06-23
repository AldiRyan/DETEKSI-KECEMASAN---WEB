<?php

class M_riwayatJadwal extends CI_Model {

    public function tampil_data() {
        $query = "SELECT * FROM tbl_jadwal";
        return $this->db->query($query)->result();
        return $this->db->get('tbl_jadwal');
    }

    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_keyword($keyword) {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        $this->db->like('nama_mhs', $keyword);
        $this->db->or_like('nama_psikolog', $keyword);
        $this->db->or_like('tanggal_jadwal', $keyword);
        $this->db->or_like('agenda', $keyword);
        return $this->db->get()->result();
    }

}