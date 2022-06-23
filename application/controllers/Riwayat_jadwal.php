<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_riwayatJadwal');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Riwayat Jadwal';
        $data['jadwal'] = $this->m_riwayatJadwal->tampil_data();
        $this->load->view('riwayat_jadwal', $data);
    }

    public function hapus($id)
    {
        $where = array('id_jadwal' => $id);
        $this->m_riwayatJadwal->hapus_data($where, 'tbl_jadwal');
        redirect('riwayat_jadwal/');
    }

    public function search(){
        $data['title'] = 'Riwayat Jadwal';
        $keyword = $this->input->post('keyword');
        $data['jadwal'] = $this->m_riwayatJadwal->get_keyword($keyword);
        $this->load->view('riwayat_jadwal', $data);
    }
}
