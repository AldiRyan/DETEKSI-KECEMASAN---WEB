<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_home');
        // $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Home';
        // $data['home'] = $this->m_home->tampil_data();
        $this->load->view('user/home', $data);
    }
}