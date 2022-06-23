<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivasi_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Aktivasi User';
        $this->load->view('aktivasi_user', $data);
    }

    public function ambildata($type) {
        if($type == 1){
            $data = $this->db->query("SELECT *, nim_mhs as nomor FROM tbl_mhs")->result_array();
        }else {
            $data = $this->db->query("SELECT *, username as nomor FROM tbl_admin")->result_array();
        }
        echo json_encode($data);
    }

    public function aktivasi_akun(){
        $nomor = $this->input->post('identitas');
        $type = $this->input->post('type');
        if($type == 1){
            $table = 'tbl_mhs';
            $arr = ['status' => 1];
            $where = ['nim_mhs' => $nomor];
        }else {
            $table = 'tbl_admin';
            $arr = ['status' => 1];
            $where = ['username' => $nomor];
        }
        $this->db->update($table, $arr, $where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diaktifkan!</div>');
        redirect(base_url('aktivasi_user'));
    }
}
