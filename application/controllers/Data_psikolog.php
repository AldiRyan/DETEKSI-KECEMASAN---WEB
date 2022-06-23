<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_psikolog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_psikolog');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Data Psikolog';
        $data['psikolog'] = $this->m_psikolog->tampil_data();
        $this->load->view('data_psikolog', $data);
    }


    public function tambah_aksi(){
        $nama   = $this->input->post('nama');
        $nohp   = $this->input->post('nohp');
        $email  = $this->input->post('email');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nama_psikolog'     => $nama,
            'nohp_psikolog'     => $nohp,
            'email_psikolog'    => $email,
            'alamat_psikolog'   => $alamat
        );

        $this->db->insert('tbl_psikolog',$data);
        redirect('data_psikolog');
    }


    public function hapus($id){
        $where = array('id_psikolog' => $id);
        $this->m_psikolog->hapus_data($where, 'tbl_psikolog');
        redirect('data_psikolog/');
    }


    public function update_aksi($id_psikolog){
        $nama   = $this->input->post('nama');
        $nohp   = $this->input->post('nohp');
        $email  = $this->input->post('email');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nama_psikolog'     => $nama,
            'nohp_psikolog'     => $nohp,
            'email_psikolog'    => $email,
            'alamat_psikolog'   => $alamat
        );

        $this->db->update('tbl_psikolog',$data, ['id_psikolog' => $id_psikolog]);
        redirect('data_psikolog/');
    }
}
