<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->load->model('M_registrasi');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('registrasi', $data);
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
        echo "<script>
                alert('Anda Berhasil Registrasi, Silahkan Lanjut Atur Jadwal Uji Kecemasan');
                window.location='".site_url('atur_jadwal')."';
            </script>";
    }
}