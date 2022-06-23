<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nonaktivasi_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Nonaktivasi User';
        $this->load->view('nonaktivasi_user', $data);
    }

    public function ambildata($type) {
        if($type == 1){
            $data = $this->db->query("SELECT *, nim_mhs as nomor FROM tbl_mhs")->result_array();
        }else {
            $data = $this->db->query("SELECT *, username as nomor FROM tbl_admin")->result_array();
        }
        echo json_encode($data);
    }

    public function nonaktifkan_akun(){
        $nomor = $this->input->post('identitas');
        $type = $this->input->post('type');
        if($type == 1){
            $table = 'tbl_mhs';
            $arr = ['status' => 0];
            $where = ['nim_mhs' => $nomor];
        }else {
            $table = 'tbl_admin';
            $arr = ['status' => 0];
            $where = ['username' => $nomor];
        }
        $this->db->update($table, $arr, $where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dinonaktifkan!</div>');
        redirect(base_url('nonaktivasi_user'));
    }
}
