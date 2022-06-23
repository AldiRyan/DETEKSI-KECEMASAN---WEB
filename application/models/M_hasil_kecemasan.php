<?php

class M_hasil_kecemasan extends CI_Model
{

    public function tampil_data_a1($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 481 and titik_x < 960 and titik_y > 271 and titik_y > 540");
        return $hasil->num_rows();
    }

    public function tampil_data_a2($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 481 and titik_x < 960 and titik_y > 1 and titik_y > 270");
        return $hasil->num_rows();
    }

    public function tampil_data_a3($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1 and titik_x < 480 and titik_y > 271 and titik_y > 540");
        return $hasil->num_rows();
    }

    public function tampil_data_a4($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1 and titik_x < 480 and titik_y > 1 and titik_y > 270");
        return $hasil->num_rows();
    }

    public function tampil_data_b1($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 961 and titik_x < 1440 and titik_y > 271 and titik_y > 540");
        return $hasil->num_rows();
    }

    public function tampil_data_b2($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 961 and titik_x < 1440 and titik_y > 1 and titik_y > 270");
        return $hasil->num_rows();
    }

    public function tampil_data_b3($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1441 and titik_x < 1920 and titik_y > 271 and titik_y > 540");
        return $hasil->num_rows();
    }

    public function tampil_data_b4($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1441 and titik_x < 1920 and titik_y > 1 and titik_y > 270");
        return $hasil->num_rows();
    }

    public function tampil_data_c1($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 961 and titik_x < 1440 and titik_y > 541 and titik_y > 810");
        return $hasil->num_rows();
    }

    public function tampil_data_c2($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 961 and titik_x < 1440 and titik_y > 811 and titik_y > 1080");
        return $hasil->num_rows();
    }

    public function tampil_data_c3($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1441 and titik_x < 1920 and titik_y > 541 and titik_y > 810");
        return $hasil->num_rows();
    }

    public function tampil_data_c4($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1441 and titik_x < 1920 and titik_y > 811 and titik_y > 1080");
        return $hasil->num_rows();
    }

    public function tampil_data_d1($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 481 and titik_x < 960 and titik_y > 541 and titik_y > 810");
        return $hasil->num_rows();
    }

    public function tampil_data_d2($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 481 and titik_x < 960 and titik_y > 811 and titik_y > 1080");
        return $hasil->num_rows();
    }

    public function tampil_data_d3($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1 and titik_x < 480 and titik_y > 541 and titik_y > 810");
        return $hasil->num_rows();
    }

    public function tampil_data_d4($mhs)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1 and titik_x < 480 and titik_y > 811 and titik_y > 1080");
        return $hasil->num_rows();
    }

    public function tampil_data_total($id_mhs)
    {
        $this->db->select('*');
        $this->db->from('tbl_hasil');
        $this->db->where('id_mhs', $id_mhs);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function tampil_data_a11()
    {
        $query = "SELECT * FROM tbl_uji";
        return $this->db->query($query)->result();
        return $this->db->get('tbl_uji');
    }

    public function nilai_skor($id_mhs)
    {
        $query = $this->db->get_where('tbl_hasil_manual', array('id_mhs' => $id_mhs))->row_array();
        return $query;
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
