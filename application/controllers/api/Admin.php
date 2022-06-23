<?php 

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin extends REST_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Admin_model');
    }

    //Get Data
    public function index_get(){
        $id = $this->get('id_admin');
        if($id === null){
            $admin = $this->Admin_model->getAdmin();
        }else{
            $admin = $this->Admin_model->getAdmin($id);
        }

        if($admin){
            $this->response([
                'status' => true,
                'data' => $admin
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
        $id = $this->delete('id_admin');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->Admin_model->deleteAdmin($id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'id_admin' => $id,
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
            'nama_admin' => $this->post('nama_admin'),
            'nohp_admin' => $this->post('nohp_admin'),
            'email_admin' => $this->post('email_admin'),
            'username' => $this->post('username'),
            'password' => $this->post('password')
        ];

        if($this->Admin_model->createAdmin($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new admin has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Put data
    public function index_put(){
        $id = $this->put('id_admin');
        $data = [
            'nama_admin' => $this->put('nama_admin'),
            'nohp_admin' => $this->put('nohp_admin'),
            'email_admin' => $this->put('email_admin'),
            'username' => $this->put('username'),
            'password' => $this->put('password')
        ];

        if($this->Admin_model->updateAdmin($data, $id) > 0){
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