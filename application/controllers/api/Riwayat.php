<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Riwayat extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Riwayat_model');
    }

    //Get Data 
    public function index_get(){
        $id = $this->get('id_uji');
        if($id === null){
            $riwayat = $this->Riwayat_model->getRiwayat();
        }else{
            $riwayat = $this->Riwayat_model->getRiwayat($id);
        }

        if($riwayat){
            $this->response([
                'status' => true,
                'data' => $riwayat
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //Delete Data
    public function index_delete(){
        $id = $this->delete('id_uji');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->Riwayat_model->deleteRiwayat($id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'id_uji' => $id,
                    'message' => 'deleted success'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    //Post Data
    public function index_post(){
        $data = [
            'nama_mhs' => $this->post('nama_mhs'),
            'nama_psikolog' => $this->post('nama_psikolog'),
            'hasil_konsultasi' => $this->post('hasil_konsultasi')
        ];
        if($this->Riwayat_model->createRiwayat($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Update Data
    public function index_put(){
        $id = $this->put('id_uji');
        $data = [
            'nama_mhs' => $this->put('nama_mhs'),
            'nama_psikolog' => $this->put('nama_psikolog'),
            'hasil_konsultasi' => $this->put('hasil_konsultasi')
        ];
        if($this->Riwayat_model->updateRiwayat($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'data has been updated'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}