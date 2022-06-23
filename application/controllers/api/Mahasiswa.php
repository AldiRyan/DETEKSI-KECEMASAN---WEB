<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    //Get Data
    public function index_get(){
        $id = $this->get('id_mhs');
        if($id === null){
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa();
        }else{
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa($id);
        }

        if($mahasiswa){
            $this->response([
                'status' => true,
                'data' => $mahasiswa
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
        $id = $this->delete('id_mhs');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if($this->Mahasiswa_model->deleteMahasiswa($id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'id_mhs' => $id,
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
            'nim_mhs' => $this->post('nim_mhs'),
            'nama_mhs' => $this->post('nama_mhs'),
            'jurusan_mhs' => $this->post('jurusan_mhs'),
            'prodi_mhs' => $this->post('prodi_mhs'),
            'semester_mhs' => $this->post('semester_mhs'),
            'gol_mhs' => $this->post('gol_mhs'),
            'alamat_mhs' => $this->post('alamat_mhs'),
            'nohp_mhs' => $this->post('nohp_mhs'),
            'email_mhs' => $this->post('email_mhs'),
            'password_mhs' => $this->post('password_mhs')
        ];

        if($this->Mahasiswa_model->createMahasiswa($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Put(Update) Data
    public function index_put(){
        $id = $this->put('id_mhs');
        $data = [
            'nim_mhs' => $this->put('nim_mhs'),
            'nama_mhs' => $this->put('nama_mhs'),
            'jurusan_mhs' => $this->put('jurusan_mhs'),
            'prodi_mhs' => $this->put('prodi_mhs'),
            'semester_mhs' => $this->put('semester_mhs'),
            'gol_mhs' => $this->put('gol_mhs'),
            'alamat_mhs' => $this->put('alamat_mhs'),
            'nohp_mhs' => $this->put('nohp_mhs'),
            'email_mhs' => $this->put('email_mhs'),
            'password_mhs' => $this->put('password_mhs')
        ];

        if($this->Mahasiswa_model->updateMahasiswa($data, $id) > 0){
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