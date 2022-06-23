<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mhs');
        $this->load->database();
    }


    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->M_mhs->tampil_data();
        $this->load->view('data_mahasiswa', $data);
    }


    public function tambah_aksi(){
        $nim        = $this->input->post('nim');
        $nama       = $this->input->post('nama');
        $jurusan    = $this->input->post('jurusan');
        $prodi      = $this->input->post('prodi');
        $semester   = $this->input->post('semester');
        $golongan   = $this->input->post('golongan');
        $alamat     = $this->input->post('alamat');
        $nohp       = $this->input->post('nohp');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $data = array(
            'nim_mhs'       => $nim,
            'nama_mhs'      => $nama,
            'jurusan_mhs'   => $jurusan,
            'prodi_mhs'     => $prodi,
            'semester_mhs'  => $semester,
            'gol_mhs'       => $golongan,
            'alamat_mhs'    => $alamat,
            'nohp_mhs'      => $nohp,
            'email_mhs'     => $email,
            'password_mhs'  => $password
        );

        $this->db->insert('tbl_mhs',$data);
        redirect('data_mahasiswa/');
    }


   public function update_aksi($id_mhs){
        $nim        = $this->input->post('nim');
        $nama       = $this->input->post('nama');
        $jurusan    = $this->input->post('jurusan');
        $prodi      = $this->input->post('prodi');
        $semester   = $this->input->post('semester');
        $golongan   = $this->input->post('golongan');
        $alamat     = $this->input->post('alamat');
        $nohp       = $this->input->post('nohp');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $data = array(
            'nim_mhs'       => $nim,
            'nama_mhs'      => $nama,
            'jurusan_mhs'   => $jurusan,
            'prodi_mhs'     => $prodi,
            'semester_mhs'  => $semester,
            'gol_mhs'       => $golongan,
            'alamat_mhs'    => $alamat,
            'nohp_mhs'      => $nohp,
            'email_mhs'     => $email,
            'password_mhs'  => $password
        );

        $this->db->where('id_mhs',$id_mhs);
        $this->db->update('tbl_mhs',$data);
        redirect('data_mahasiswa/');
    }


    public function hapus($id_mhs){
        $this->db->where('id_mhs',$id_mhs);
        $this->db->delete('tbl_mhs');
        redirect('data_mahasiswa/');
    }


    public function search(){
        $data['title'] = 'Data Mahasiswa';
        $keyword = $this->input->post('keyword');
        $data['mahasiswa'] = $this->M_mhs->get_keyword($keyword);
        $this->load->view('data_mahasiswa', $data);
    }

}
