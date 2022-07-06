<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['jadwal'] = $this->M_dashboard->get_jadwal();
        // $data['konsultasi'] = $this->M_dashboard->get_konsultasi();
        $data['registrasi'] = $this->M_dashboard->get_mhs();
        $data['admin'] = $this->M_dashboard->jumlah_admin();
        $this->load->view('dashboard', $data);
    }

}
