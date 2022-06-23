<?php 

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Psikolog extends REST_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Psikolog_model');
    }

    //Get Data
    public function index_get(){
        $id = $this->get('id_psikolog');
        if($id === null){
            $psikolog = $this->Psikolog_model->getPsikolog();
        }else{
            $psikolog = $this->Psikolog_model->getPsikolog($id);
        }

        if($psikolog){
            $this->response([
                'status' => true,
                'data' => $psikolog
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
        $id = $this->delete('id_psikolog');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->Psikolog_model->deletePsikolog($id) > 0){
                $this->response([
                    'status' => true,
                    'id_psikolog' => $id,
                    'message' => 'deleted success'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    //Post Data
    public function index_post(){
        $data = [
            'nama_psikolog' => $this->post('nama_psikolog'),
            'nohp_psikolog' => $this->post('nohp_psikolog'),
            'email_psikolog' => $this->post('email_psikolog'),
            'alamat_psikolog' => $this->post('alamat_psikolog')
        ];

        if($this->Psikolog_model->createPsikolog($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new psikolog has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new psikolog'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Update Data
    public function index_put(){
        $id = $this->put('id_psikolog');
        $data = [
            'nama_psikolog' => $this->put('nama_psikolog'),
            'nohp_psikolog' => $this->put('nohp_psikolog'),
            'email_psikolog' => $this->put('email_psikolog'),
            'alamat_psikolog' => $this->put('alamat_psikolog')
        ];

        if($this->Psikolog_model->updatePsikolog($data, $id) > 0){
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