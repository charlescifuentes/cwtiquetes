<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crutas extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mlogin');
                $this->load->model('mrutas');
    }

    public function index()
    {
        $data['title'] = "Rutas";

        $data['rutas'] = $this->mrutas->get_rutas();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('rutas/vrutas',$data);
        $this->load->view('templates/footer');
    }

    public function view($str)
    {
        $data['title'] = "Editar Ruta";

        $data['ruta'] = $this->mrutas->get_ruta($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('rutas/vrutas_view',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->mrutas->update_ruta();
        redirect('crutas');
    }

    public function delete()
    {
        $s = $this->input->post('ruta');
        $res = $this->mrutas->delete_ruta($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create()
    {
        $data['title'] = "Crear Ruta";
        $data['message_error'] = "";
        $data['id_ruta'] = $this->mrutas->get_last_idruta();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('rutas/vrutas_create',$data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules(
            'id_ruta', 'ID Ruta',
            'is_unique[lt_rutas.id_ruta]',
            array(
                    'is_unique'     => 'Este %s ya existe.'
            )
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Crear Ruta";
            $data['message_error'] = "";
            $data['id_ruta'] = $this->mrutas->get_last_idruta();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('rutas/vrutas_create',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->mrutas->insert_ruta();
            redirect('crutas');
        }
    }
}
