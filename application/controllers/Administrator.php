<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_administrator');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Administrator';
        $data['admin'] = $this->m_administrator->tampil_data();
        $this->load->view('administrator', $data);
        
    }


    public function tambah_aksi() {
        $nama       = $this->input->post('nama');
        $nohp       = $this->input->post('nohp');
        $email      = $this->input->post('email');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $data = array(
            'nama_admin'  => $nama,
            'nohp_admin'  => $nohp,
            'email_admin' => $email,
            'username'    => $username,
            'password'    => $password
        );

        $this->db->insert('tbl_admin',$data);
        redirect('administrator');
    }


    public function hapus($id){
        $where = array('id_admin' => $id);
        $this->m_administrator->hapus_data($where, 'tbl_admin');
        redirect('administrator/');
    }


    public function update_aksi($id_admin){
        $nama       = $this->input->post('nama');
        $nohp       = $this->input->post('nohp');
        $email      = $this->input->post('email');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        
        $data = array(
            'nama_admin'  => $nama,
            'nohp_admin'  => $nohp,
            'email_admin' => $email,
            'username'    => $username,
            'password'    => $password
        );

        $this->db->update('tbl_admin',$data, ['id_admin' => $id_admin]);
        redirect('administrator/');
    }
}
