<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class AturJadwal extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('AturJadwal_model');
    }

    //Get Data
    public function index_get(){
        $id = $this->get('id_jadwal');
        if($id === null){
            $jadwal = $this->AturJadwal_model->getJadwal();
        }else{
            $jadwal = $this->AturJadwal_model->getJadwal($id);
        }

        if($jadwal){
            $this->response([
                'status' => true,
                'data' => $jadwal
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
        $id = $this->delete('id_jadwal');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->AturJadwal_model->deleteJadwal($id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'id_jadwal' => $id,
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

    //Post data
    public function index_post(){
        $data = [
            'nama_mhs' => $this->post('nama_mhs'),
            'nama_psikolog' => $this->post('nama_psikolog'),
            'agenda' => $this->post('agenda')
        ];

        if($this->AturJadwal_model->createJadwal($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new jadwal has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new jadwal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Update Data 
    public function index_put(){
        $id = $this->put('id_jadwal');
        $data = [
            'nama_mhs' => $this->put('nama_mhs'),
            'nama_psikolog' => $this->put('nama_psikolog'),
            'agenda' => $this->put('agenda')
        ];

        if($this->AturJadwal_model->updateJadwal($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'jadwal has been updated'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update jadwal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}