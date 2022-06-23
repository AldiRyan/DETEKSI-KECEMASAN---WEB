<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_profil');
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $user_data = $this->session->userdata('userdata');
        $profil = $this->M_profil->detail_data($user_data['id_mhs']);
        $data['profil'] = $profil;
        $this->load->view('user/profil', $data);
    }
}
