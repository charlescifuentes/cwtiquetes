<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctiquetes extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mlogin');
                $this->load->model('mtiquetes');
                $this->load->model('mconfiguracion');
    }

    public function index()
    {
        $data['vehiculos'] = $this->mtiquetes->get_vehiculos();
        $data['rutas'] = $this->mtiquetes->get_rutas();
        $data['clientes'] = $this->mtiquetes->get_clientes();
        $data['cons_tiquete'] = $this->mtiquetes->get_last_tiquete();

        $data['title'] = "Tiquetes";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tiquetes/vtiquetes',$data);
        $this->load->view('templates/footer');
    }

    public function create_tiquete()
    {
        $this->form_validation->set_rules('vehiculo', 'Vehiculo', 'required',
                        array('required' => 'Debe seleccionar un %s.')
                );
        $this->form_validation->set_rules('ruta', 'Ruta', 'required',
                        array('required' => 'Debe seleccionar una %s.')
                );

        if ($this->form_validation->run() === FALSE)
        {
            $data['vehiculos'] = $this->mtiquetes->get_vehiculos();
            $data['rutas'] = $this->mtiquetes->get_rutas();
            $data['clientes'] = $this->mtiquetes->get_clientes();
            $data['cons_tiquete'] = $this->mtiquetes->get_last_tiquete();

            $data['title'] = "Tiquetes";

            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('tiquetes/vtiquetes',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $data['last_id'] = $this->mtiquetes->set_tiquetes();
            $this->mtiquetes->set_cupo_vehiculo();
            $data['last_sale'] = $this->mtiquetes->get_last_sale($data['last_id']);
            $id_config = 1;
            $data['config'] = $this->mconfiguracion->get_config($id_config);

            $data['title'] = "Tiquete";

            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('tiquetes/vreceipt',$data);
            $this->load->view('templates/footer');
        }
    }

    public function get_clase_vehiculo()
    {
        $s = $this->input->post('numero_vehiculo');
        $res = $this->mtiquetes->get_vehiculo_type($s);

        echo json_encode($res);
    }

    public function get_valor_ruta()
    {
        $s = $this->input->post('ruta');
        $res = $this->mtiquetes->get_ruta_valor($s);

        echo json_encode($res);
    }

    public function get_cliente()
    {
        $s = $this->input->post('doc_cliente');
        $res = $this->mtiquetes->get_cliente($s);

        echo json_encode($res);
    }

    public function update_cupo_vehiculo()
    {
        $this->mtiquetes->update_vehiculo_cupo();
        $this->mtiquetes->desenturnar_vehiculo();
        $this->mtiquetes->cuota_administracion();
    }

    public function create_cliente()
    {
        $res = $this->mtiquetes->insert_cliente();

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }
}
