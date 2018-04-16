<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cvehiculos extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mlogin');
                $this->load->model('mvehiculos');
    }

    public function index()
    {
        $data['title'] = "Vehiculos";

        $data['vehiculos'] = $this->mvehiculos->get_vehiculos();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('vehiculos/vvehiculos',$data);
        $this->load->view('templates/footer');
    }

    public function view($str)
    {
        $data['title'] = "Editar Vehiculo";

        $data['vehiculo'] = $this->mvehiculos->get_vehiculo($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('vehiculos/vvehiculos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->mvehiculos->update_vehiculo();
        redirect('cvehiculos');
    }

    public function delete()
    {
        $s = $this->input->post('vehiculo');
        $res = $this->mvehiculos->delete_vehiculo($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function insert()
    {
        $this->mvehiculos->insert_vehiculo();
        redirect('cvehiculos');
    }

    public function create()
    {
        $data['title'] = "Crear Vehiculo";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('vehiculos/vvehiculos_create',$data);
        $this->load->view('templates/footer');

    }

    public function enturnar()
    {
        $s = $this->input->post('vehiculo');
        $res = $this->mvehiculos->enturnar_vehiculo($s);

        echo json_encode($res);
    }

    public function desenturnar()
    {
        $s = $this->input->post('vehiculo');
        $res = $this->mvehiculos->desenturnar_vehiculo($s);

        echo json_encode($res);
    }
}
