<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_aturjadwal');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Atur Jadwal';
        $data['mhs'] = $this->db->get('tbl_mhs')->result_array();
        $data['psi'] = $this->db->get('tbl_psikolog')->result_array();
        $this->load->view('atur_jadwal', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('nama_mhs', 'Nama', 'required');
        $this->form_validation->set_rules('nama_psikolog', 'Psikolog', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('agenda', 'Agenda', 'required');
        $data['mhs'] = $this->db->get('tbl_mhs')->result_array();
        $data['psi'] = $this->db->get('tbl_psikolog')->result_array();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('atur_jadwal', $data);
            // $data['query'] = $this->M_aturjadwal->countRow/();
        } else {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'nama_psikolog' => $this->input->post('nama_psikolog'),
                'tanggal_jadwal' => $this->input->post('waktu'),
                'agenda' => $this->input->post('agenda')
            );
            $cek = $this->db->query('SELECT * FROM tbl_jadwal where DATE(tanggal_jadwal)=DATE("' . $this->input->post('waktu') . '")')->num_rows();
            // echo "<pre>";
            print_r($cek);
            if ($cek < 10) {

                $this->M_aturjadwal->form_insert($data);
                echo "<script>
                    alert('Data Berhasil Disimpan. Silahkan Kembali ke Halaman Login');
                    window.location='" . site_url('atur_jadwal') . "';
                </script>";
                redirect('atur_jadwal');
            } else {
                echo "<script>
                    alert('Kuota Terbatas, Silahkan Mendaftar Besok');
                    window.location='" . site_url('atur_jadwal') . "';
                </script>";

                // redirect('atur_jadwal');
            }
        }
    }
}
