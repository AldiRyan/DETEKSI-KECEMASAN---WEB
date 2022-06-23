<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uji_kecemasan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_hasil_kecemasan');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Uji Kecemasan Mahasiswa';
        // $data['uji_kecemasan'] = $this->M_uji_kecemasan->tampil_data();
        $this->load->view('user/uji_kecemasan', $data);
    }

    public function lihat_hasil()
    {
        $user_data = $this->session->userdata('userdata');
        $mhs = $user_data['id_mhs'];

        $data['data_a1'] =  $this->M_hasil_kecemasan->tampil_data_a1($mhs);
        $data['data_a2'] =  $this->M_hasil_kecemasan->tampil_data_a2($mhs);
        $data['data_a3'] =  $this->M_hasil_kecemasan->tampil_data_a3($mhs);
        $data['data_a4'] =  $this->M_hasil_kecemasan->tampil_data_a4($mhs);
        $data['data_b1'] =  $this->M_hasil_kecemasan->tampil_data_b1($mhs);
        $data['data_b2'] =  $this->M_hasil_kecemasan->tampil_data_b2($mhs);
        $data['data_b3'] =  $this->M_hasil_kecemasan->tampil_data_b3($mhs);
        $data['data_b4'] =  $this->M_hasil_kecemasan->tampil_data_b4($mhs);
        $data['data_c1'] =  $this->M_hasil_kecemasan->tampil_data_c1($mhs);
        $data['data_c2'] =  $this->M_hasil_kecemasan->tampil_data_c2($mhs);
        $data['data_c3'] =  $this->M_hasil_kecemasan->tampil_data_c3($mhs);
        $data['data_c4'] =  $this->M_hasil_kecemasan->tampil_data_c4($mhs);
        $data['data_d1'] =  $this->M_hasil_kecemasan->tampil_data_d1($mhs);
        $data['data_d2'] =  $this->M_hasil_kecemasan->tampil_data_d2($mhs);
        $data['data_d3'] =  $this->M_hasil_kecemasan->tampil_data_d3($mhs);
        $data['data_d4'] =  $this->M_hasil_kecemasan->tampil_data_d4($mhs);

        $data['data_total'] =  $this->M_hasil_kecemasan->tampil_data_total($mhs);

        $data['nilai_skor'] =  $this->M_hasil_kecemasan->nilai_skor($mhs);

        $data['title'] = 'Uji Kecemasan Mahasiswa';
        // var_dump($data);
        // die;
        // $data['uji_kecemasan'] = $this->M_uji_kecemasan->tampil_data();
        $this->load->view('user/hasil', $data);
    }
}
