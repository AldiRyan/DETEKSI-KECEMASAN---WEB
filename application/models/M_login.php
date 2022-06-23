<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function cek($in)
    {
        $username = $in['username'];
        $password = $in['password'];

        $mhs = $this->db->query("SELECT nim_mhs, id_mhs, password_mhs, nama_mhs as nama, id_mhs, status FROM tbl_mhs WHERE nim_mhs='$username'");
        $admin = $this->db->query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");

        if ($mhs->num_rows() > 0) {
            foreach ($mhs->result() as $data) {
                if ($data->password_mhs != $password) {
                    $this->session->set_flashdata('pesan', 'Password yang Anda Masukkan Salah');
                    redirect(base_url('login'));
                } else if ($data->status == 0) {
                    $this->session->set_flashdata('pesan', 'Anda Belum Registrasi');
                    redirect(base_url('login'));
                } else {
                    $session['nim_mhs'] = $data->nim_mhs;
                    $session['id_mhs'] = $data->id_mhs;
                    $session['nama_mhs'] = $data->nama;
                    $session['hak akses'] = 'mahasiswa';
                    $this->session->set_userdata('userdata', $session);
                }
            }
            echo "<script>
                    alert('Selamat Datang');
                    window.location='" . site_url('user/home') . "';
                </script>";
        } elseif ($admin->num_rows() > 0) {
            foreach ($admin->result() as $data) {
                if ($data->password != $password) {
                    $this->session->set_flashdata('pesan', 'Password yang Anda Masukkan Salah');
                    redirect(base_url('login'));
                } else if ($data->status == 0) {
                    $this->session->set_flashdata('pesan', 'Akun Anda Belum Aktif');
                    redirect(base_url('login'));
                } else {
                    $session['username'] = $data->username;
                    $session['id_admin'] = $data->id_admin;
                    $session['nama_admin'] = $data->nama_admin;
                    $session['hak akses'] = 'administrator';
                    $this->session->set_userdata('userdata', $session);
                    // print_r($session);  
                }
            }
            echo "<script>
                    alert('Selamat Datang');
                    window.location='" . site_url('dashboard') . "';
                </script>";
        } else {
            "<script>
                    alert('Login Gagal, Mohon Cek Kembali NIM atau Username Anda');
                    window.location='" . site_url('login') . "';
                </script>";
        }
    }
}
