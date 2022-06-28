<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_proses_fuzzy extends CI_Model
{
    public function get_data_kiri($mhs) // menghitung jumlah data titik kiri
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 0 and titik_x < 240");
        return $hasil->num_rows();
    }

    public function get_data_tengah($mhs) // menghitung jumlah data titik tengah
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 241 and titik_x < 1680");
        return $hasil->num_rows();
    }

    public function get_data_kanan($mhs) // menghitung jumlah data titik kanan
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x > 1681 and titik_x < 1920");
        return $hasil->num_rows();
    }

    public function get_data_blindspot($mhs) // menghitung jumlah data titik blindspot
    {
        $hasil = $this->db->query("SELECT * FROM tbl_hasil WHERE id_mhs=" . $mhs . " and titik_x = 'NaN'");
        return $hasil->num_rows();
    }

    public function i_derajat_keanggotaan($data)
    {
        $data = [

            'id_nilai_derajat' => $this->autonumber_nilai_derajat(),
            'nim_mhs' => $data['nim_mhs'],

            'kiri_sedikit' => $data['kiri_sedikit'],
            'kiri_banyak' => $data['kiri_banyak'],
            'tengah_sedikit' => $data['tengah_sedikit'],
            'tengah_banyak' => $data['tengah_banyak'],
            'kanan_sedikit' => $data['kanan_sedikit'],

            'kanan_banyak' => $data['kanan_banyak'],
            'blindspot_sedikit' => $data['blindspot_sedikit'],
            'blindspot_banyak' => $data['blindspot_banyak'],

        ];

        $this->db->insert('tbl_nilai_derajat', $data);
    }

    public function i_rule_nilai($data2)
    {
        $data = [
            'id_nilai_derajat' => $this->autonumber_nilai_derajat(),
            'rule_1' => $data2['r1'], 'rule_2' => $data2['r2'], 'rule_3' => $data2['r3'], 'rule_4' => $data2['r4'], 'rule_5' => $data2['r5'],
            'rule_6' => $data2['r6'], 'rule_7' => $data2['r7'], 'rule_8' => $data2['r8'], 'rule_9' => $data2['r9'], 'rule_10' => $data2['r10'],
            'rule_11' => $data2['r11'], 'rule_12' => $data2['r12'], 'rule_13' => $data2['r13'], 'rule_14' => $data2['r14'], 'rule_15' => $data2['r15'],
            'rule_16' => $data2['r16']
        ];

        $this->db->insert('tbl_nilai_rule', $data);
    }

    public function hasil_fuzzy($data3)
    {
        $data = [
            'id_nilai_derajat'      => $this->autonumber_nilai_derajat(),
            'rata_nilai_kiri'       => $data3['rata_nilai_kiri'],
            'rata_nilai_tengah'     => $data3['rata_nilai_tengah'],
            'rata_nilai_kanan'      => $data3['rata_nilai_kanan'],
            'rata_nilai_blindspot'  => $data3['rata_nilai_blindspot'],
            'hasil_fuzzy'           => $data3['hasil_fuzzy'],
        ];

        $this->db->insert('tbl_hasil_fuzzy', $data);
    }

    public function get_hasil_fuzzy()
    {
        // $this->db->select('*');
        // $this->db->from('tbl_hasil_fuzzy');
        // return $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_hasil_fuzzy');
        $result = $this->db->get()->result(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //membuat auto code 
    function autonumber_nilai_derajat()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_nilai_derajat,2)) AS kd_max FROM tbl_nilai_derajat");
        $kd = "";
        $i = "ND";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $i . $kd;
    }

    public function getId_nilai_derajat($id)
    {
        return $this->db->get_where('tbl_nilai_derajat', ['id_nilai_derajat' => $id])->row_array();
    }

    public function getId_nilai_rule($id)
    {
        return $this->db->get_where('tbl_nilai_rule', ['id_nilai_derajat' => $id])->row_array();
    }

    public function getId_hasil($id)
    {
        return $this->db->get_where('tbl_hasil_fuzzy', ['id_nilai_derajat' => $id])->row_array();
    }
}
