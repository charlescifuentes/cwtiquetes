<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbodega extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mlogin');
                $this->load->model('mbodega');
                $this->load->model('mconfiguracion');
    }

    public function index()
    {
        $data['clientes'] = $this->mbodega->get_clientes();
        $data['servicios'] = $this->mbodega->get_servicios();
        $data['cons_bodega'] = $this->mbodega->get_last_bodegaid();

        $data['title'] = "Bodega";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('bodega/vbodega',$data);
        $this->load->view('templates/footer');
    }

    public function create_servicio()
    {
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        $this->form_validation->set_rules('servicio', 'Servicio', 'required');
        $this->form_validation->set_rules('valor_servicio', 'Valor Servicio', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['clientes'] = $this->mbodega->get_clientes();
            $data['servicios'] = $this->mbodega->get_servicios();
            $data['cons_bodega'] = $this->mbodega->get_last_bodegaid();

            $data['title'] = "Bodega";

            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('bodega/vbodega',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $data['last_id'] = $this->mbodega->set_bodega();
            $data['last_sale'] = $this->mbodega->get_last_sale($data['last_id']);
            $id_config = 1;
            $data['config'] = $this->mconfiguracion->get_config($id_config);

            $data['title'] = "Tiquete";

            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('bodega/vreceipt',$data);
            $this->load->view('templates/footer');
        }
    }

    public function get_valor_servicio()
    {
        $s = $this->input->post('servicio');
        $res = $this->mbodega->get_servicio_valor($s);

        echo json_encode($res);
    }

    public function get_cliente()
    {
        $s = $this->input->post('doc_cliente');
        $res = $this->mtiquetes->get_cliente($s);

        echo json_encode($res);
    }
}
