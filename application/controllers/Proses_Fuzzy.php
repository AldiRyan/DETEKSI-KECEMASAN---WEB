<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_Fuzzy extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_proses_fuzzy');
        $this->load->model('M_hasil_kecemasan');
        // if (empty($_SESSION['nama'])) {
        //     redirect(site_url('Auth'));
        // }
    }

    public function index()
    {
        // $data['data_sum_co'] = $this->M_proses_fuzzy->get_nilai_co_data_akhir();
        // $data['data_sum_no'] = $this->M_proses_fuzzy->get_nilai_no_data_akhir();
        $data['nilai_hasil'] = $this->M_proses_fuzzy->get_hasil_fuzzy();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // $r1 = max(5, 4);
        // var_dump($r1);
        // die();

        $data['title'] = "Data Kriteria";
        $this->load->view('Template/header', $data);
        $this->load->view('v_proses_fuzzy', $data);
        $this->load->view('Template/footer');
    }

    public function hapus($id)
    {
        $where = array('id_hasil' => $id);
        $this->M_proses_fuzzy->hapus($where, 'tbl_hasil_fuzzy');
        redirect('Proses_fuzzy');
    }


    public function fuzzyfikasi()
    {
        $user_data = $this->session->userdata('userdata');
        $mhs = $user_data['id_mhs'];
        $nim_mhs = $user_data['nim_mhs'];

        $nilai_palingKiri = $this->M_proses_fuzzy->get_data_palingkiri($mhs);
        $nilai_kiri = $this->M_proses_fuzzy->get_data_kiri($mhs);
        $nilai_tengah = $this->M_proses_fuzzy->get_data_tengah($mhs);
        $nilai_kanan = $this->M_proses_fuzzy->get_data_kanan($mhs);
        $nilai_palingKanan = $this->M_proses_fuzzy->get_data_palingkanan($mhs);

        $nilai_blindspot = $this->M_proses_fuzzy->get_data_blindspot($mhs);

        // $nilai_kiri = 250;
        // $nilai_tengah = 150;
        // $nilai_kanan = 105;
        // $nilai_blindspot = 50;

        $derajat_nilai = 1;
        if ($derajat_nilai == 1) {

            //Derajat Keanggotaan Paling Kiri Himpunan Sedikit
            if ($nilai_palingKiri >= 0 && $nilai_palingKiri <= 100) {
                $sedikit_palingkiri = 1;
            } else if ($nilai_palingKiri > 100 && $nilai_palingKiri <= 400) {
                $sedikit_palingkiri = (400 - $nilai_palingKiri) / (400 - 100);
            } else if ($nilai_palingKiri > 400) {
                $sedikit_palingkiri = 0;
            } else {
                $sedikit_palingkiri = 0;
            }
            $h_sedikit_palingkiri = round($sedikit_palingkiri, 2);

            //Derajat Keanggotaan Paling Kiri Himpunan Banyak 
            if ($nilai_palingKiri >= 400) {
                $banyak_palingkiri = 1;
            } else if ($nilai_palingKiri > 100 && $nilai_palingKiri <= 400) {
                $banyak_palingkiri = ($nilai_palingKiri - 100) / (400 - 100);
            } else if ($nilai_palingKiri < 100) {
                $banyak_palingkiri = 0;
            } else {
                $banyak_palingkiri = 0;
            }
            $h_banyak_palingkiri = round($banyak_palingkiri, 2);

            // =================================================================

            //Derajat Keanggotaan Kiri Himpunan Sedikit
            if ($nilai_kiri >= 0 && $nilai_kiri <= 100) {
                $sedikit_kiri = 1;
            } else if ($nilai_kiri > 100 && $nilai_kiri <= 400) {
                $sedikit_kiri = (400 - $nilai_kiri) / (400 - 100);
            } else if ($nilai_kiri > 400) {
                $sedikit_kiri = 0;
            } else {
                $sedikit_kiri = 0;
            }
            $h_sedikit_kiri = round($sedikit_kiri, 2);

            //Derajat Keanggotaan Kiri Himpunan Banyak 
            if ($nilai_kiri >= 400) {
                $banyak_kiri = 1;
            } else if ($nilai_kiri > 100 && $nilai_kiri <= 400) {
                $banyak_kiri = ($nilai_kiri - 100) / (400 - 100);
            } else if ($nilai_kiri < 100) {
                $banyak_kiri = 0;
            } else {
                $banyak_kiri = 0;
            }
            $h_banyak_kiri = round($banyak_kiri, 2);

            // =================================================================

            //Derajat Keanggotaan Tengah Himpunan Sedikit 
            if ($nilai_tengah >= 0 && $nilai_tengah <= 100) {
                $sedikit_tengah = 1;
            } else if ($nilai_tengah > 100 && $nilai_tengah <= 700) {
                $sedikit_tengah = (700 - $nilai_tengah) / (700 - 100);
            } else if ($nilai_tengah > 700) {
                $sedikit_tengah = 0;
            } else {
                $sedikit_tengah = 0;
            }
            $h_sedikit_tengah = round($sedikit_tengah, 2);

            //Derajat Keanggotaan Tengah Himpunan Banyak
            if ($nilai_tengah >= 700) {
                $banyak_tengah = 1;
            } else if ($nilai_tengah > 100 && $nilai_tengah <= 700) {
                $banyak_tengah = ($nilai_tengah - 100) / (700 - 100);
            } else if ($nilai_tengah < 100) {
                $banyak_tengah = 0;
            } else {
                $banyak_tengah = 0;
            }
            $h_banyak_tengah = round($banyak_tengah, 2);

            // =================================================================

            //Derajat Keanggotaan Kanan Himpunan Sedikit
            if ($nilai_kanan >= 0 && $nilai_kanan <= 100) {
                $sedikit_kanan = 1;
            } else if ($nilai_kanan > 100 && $nilai_kanan <= 400) {
                $sedikit_kanan = (400 - $nilai_kanan) / (400 - 100);
            } else if ($nilai_kanan > 400) {
                $sedikit_kanan = 0;
            } else {
                $sedikit_kanan = 0;
            }
            $h_sedikit_kanan = round($sedikit_kanan, 2);

            //Derajat Keanggotaan Kanan Himpunan Banyak 
            if ($nilai_kanan >= 400) {
                $banyak_kanan = 1;
            } else if ($nilai_kanan > 100 && $nilai_kanan <= 400) {
                $banyak_kanan = ($nilai_kanan - 100) / (400 - 100);
            } else if ($nilai_kanan < 100) {
                $banyak_kanan = 0;
            } else {
                $banyak_kanan = 0;
            }
            $h_banyak_kanan = round($banyak_kanan, 2);

            // =================================================================

            //Derajat Keanggotaan Kanan Himpunan Sedikit
            if ($nilai_palingKanan >= 0 && $nilai_palingKanan <= 100) {
                $sedikit_palingkanan = 1;
            } else if ($nilai_palingKanan > 100 && $nilai_palingKanan <= 400) {
                $sedikit_palingkanan = (400 - $nilai_palingKanan) / (400 - 100);
            } else if ($nilai_palingKanan > 400) {
                $sedikit_palingkanan = 0;
            } else {
                $sedikit_palingkanan = 0;
            }
            $h_sedikit_palingkanan = round($sedikit_palingkanan, 2);

            //Derajat Keanggotaan Kanan Himpunan Banyak 
            if ($nilai_palingKanan >= 400) {
                $banyak_palingkanan = 1;
            } else if ($nilai_palingKanan > 100 && $nilai_palingKanan <= 400) {
                $banyak_palingkanan = ($nilai_palingKanan - 100) / (400 - 100);
            } else if ($nilai_palingKanan < 100) {
                $banyak_palingkanan = 0;
            } else {
                $banyak_palingkanan = 0;
            }
            $h_banyak_palingkanan = round($banyak_palingkanan, 2);

            // =================================================================

        }

        // ===================================================
        # Pembentukan Rule
        // ===================================================

        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r1 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r2 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r3 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r4 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r5 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r6 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r7 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Sedikit AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r8 = min($h_sedikit_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r9 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r10 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r11 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r12 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r13 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r14 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r15 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Sedikit AND Kiri Banyak AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r16 = min($h_sedikit_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_banyak_palingkanan);

        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r17 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r18 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r19 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r20 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r21 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r22 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r23 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r24 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Sedikit AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r25 = min($h_banyak_palingkiri, $h_sedikit_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r26 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Sedikit AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r27 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Sedikit THEN Tidak Cemas = 0 
        $r28 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_sedikit_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Sedikit AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r29 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_sedikit_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Banyak AND Kanan Sedikit AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r30 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_sedikit_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r31 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_banyak_palingkanan);
        // IF Paling Kiri Banyak AND Kiri Banyak AND Tengah Banyak AND Kanan Banyak AND Paling Kanan Banyak THEN Tidak Cemas = 0 
        $r32 = min($h_banyak_palingkiri, $h_banyak_kiri, $h_banyak_tengah, $h_banyak_kanan, $h_banyak_palingkanan);


        // =============================================================
        # Deffuzyfikasi Sugeno Weight Average
        // =============================================================


        $wa = (($r1 * 10) + ($r2 * 100) + ($r3 * 25) + ($r4 * 100) + ($r5 * 10) + ($r6 * 75) + ($r7 * 50) + ($r8 * 100) + ($r9 * 25) + ($r10 * 100) +
            ($r11 * 75) + ($r12 * 100) + ($r13 * 50) + ($r14 * 100) + ($r15 * 75) + ($r16 * 10)) / ($r1 + $r2 + $r3 + $r4 + $r5 + $r6 + $r7 + $r8 + $r9 + $r10 +
            $r11 + $r12 + $r13 + $r14 + $r15 + $r16);

        $data = [
            'nim_mhs' => $nim_mhs,
            'kiri_sedikit' => $h_sedikit_kiri, 'kiri_banyak' => $h_banyak_kiri, 'tengah_sedikit' => $h_sedikit_tengah, 'tengah_banyak' => $h_banyak_tengah, 'kanan_sedikit' => $h_sedikit_kanan,
            'kanan_banyak' => $h_banyak_kanan, 'blindspot_sedikit' => $h_sedikit_blindspot, 'blindspot_banyak' => $h_banyak_blindspot,
        ];

        $data2 = [
            'r1' => $r1, 'r2' => $r2, 'r3' => $r3, 'r4' => $r4, 'r5' => $r5, 'r6' => $r6, 'r7' => $r7, 'r8' => $r8, 'r9' => $r9, 'r10' => $r10,
            'r11' => $r11, 'r12' => $r12, 'r13' => $r13, 'r14' => $r14, 'r15' => $r15, 'r16' => $r16
        ];

        $data3 = [
            'rata_nilai_kiri' => $nilai_kiri,
            'rata_nilai_tengah' => $nilai_tengah,
            'rata_nilai_kanan' => $nilai_kanan,
            'rata_nilai_blindspot' => $nilai_blindspot,
            'hasil_fuzzy' => $wa
        ];

        //$data_kirim['nilai_skor'] =  $this->M_hasil_kecemasan->nilai_skor($mhs);
        $data_kirim = [
            'rata_nilai_kiri' => $nilai_kiri,
            'rata_nilai_tengah' => $nilai_tengah,
            'rata_nilai_kanan' => $nilai_kanan,
            'rata_nilai_blindspot' => $nilai_blindspot,
            'hasil_fuzzy' => $wa,
            'nilai_skor' => $this->M_hasil_kecemasan->nilai_skor($mhs),

        ];

        $this->M_proses_fuzzy->i_rule_nilai($data2);
        $this->M_proses_fuzzy->hasil_fuzzy($data3);
        $this->M_proses_fuzzy->i_derajat_keanggotaan($data);


        $this->load->view('user/hasil', $data_kirim);
        //redirect(site_url('user/Uji_kecemasan'));
    }

    public function detail_fuzzy($id)
    {

        $data['nilai_derajat'] = $this->M_proses_fuzzy->getId_nilai_derajat($id);
        $data['nilai_rule'] = $this->M_proses_fuzzy->getId_nilai_rule($id);
        $data['hasil'] = $this->M_proses_fuzzy->getId_hasil($id);

        $data['title'] = "Detail Fuzzy";
        $this->load->view('Template/header', $data);
        $this->load->view('v_detail_fuzzy', $data);
        $this->load->view('Template/footer');
    }
}
