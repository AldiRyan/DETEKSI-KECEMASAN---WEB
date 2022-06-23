<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Search_data extends CI_Controller {

    public function index(){
        $this->load->model('M_search'); 
        $keyword = $this->input->get('keyword');
        $data = $this->M_search->ambil_data($keyword);
        $data = array(
            'keyword' => $keyword,
            'data' => $data
        );
        $this->load->view('data_mahasiswa', $data);
    }
}