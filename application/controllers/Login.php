<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_login');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }

    public function cek()
    {
        if ($this->input->method(TRUE) == 'POST' && !empty($_POST)) {
            $in['username'] = $this->input->post('username');
            $in['password'] = $this->input->post('password');
            echo $this->M_login->cek($in);
        } else {
            redirect(base_url());
        }
    }

    public function logout()
    {
        $params = array('id_admin');
        $this->session->unset_userdata($params);
        session_destroy();
        redirect('login');
    }

    
}
