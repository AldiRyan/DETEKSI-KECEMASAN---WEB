<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_hasilKonsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konsultasi');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Data Hasil Konsultasi';
        $data['konsultasi'] = $this->M_konsultasi->tampil_data();
        // var_dump($data);
        // die;
        $this->load->view('data_hasilKonsultasi', $data);
    }

    public function hapus($id)
    {
        $where = array('id_uji' => $id);
        $this->M_konsultasi->hapus_data($where, 'tbl_uji');
        redirect('data_hasilKonsultasi/');
    }

    public function search()
    {
        $data['title'] = 'Data Hasil Konsultasi';
        $keyword = $this->input->post('keyword');
        $data['konsultasi'] = $this->M_konsultasi->get_keyword($keyword);
        $this->load->view('data_hasilKonsultasi', $data);
    }
}
