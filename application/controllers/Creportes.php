<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mreportes');
    }

    public function index()
    {
        $this->load->model('mrutas');
        $data['rutas'] = $this->mrutas->get_rutas();
        $data['title'] = "Reportes";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vreportes',$data);
        $this->load->view('templates/footer');
    }

    public function report_tiquetes()
    {
        $data['desde'] = $this->input->post('tfecha_desde');
        $data['hasta'] = $this->input->post('tfecha_hasta');
        $data['ruta'] = $this->input->post('ruta');

        $data['results'] = $this->mreportes->tiquetes_report($data['desde'], $data['hasta'], $data['ruta']);

        $data['title'] = "Reporte de Tiquetes";

        $data['total_pasajeros'] = 0;
        $data['total_venta'] = 0;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vreportes_tiquetes',$data);
        $this->load->view('templates/footer');
    }

    public function report_bodega()
    {
        $data['desde'] = $this->input->post('tfecha_desde');
        $data['hasta'] = $this->input->post('tfecha_hasta');

        $data['results'] = $this->mreportes->bodega_report($data['desde'], $data['hasta']);

        $data['title'] = "Reporte de Bodega";

        $data['total'] = 0;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vreportes_bodega',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_bodega($desde, $hasta)
    {
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;

        $data['results'] = $this->mreportes->bodega_report($data['desde'], $data['hasta']);

        $data['title'] = "Reporte de Bodega";

        $data['total'] = 0;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vprint_bodega',$data);
        $this->load->view('templates/footer');
    }

    public function report_administracion()
    {
        $data['desde'] = $this->input->post('tfecha_desde');
        $data['hasta'] = $this->input->post('tfecha_hasta');
        $data['ruta'] = $this->input->post('ruta');

        $data['results'] = $this->mreportes->administracion_report($data['desde'], $data['hasta'], $data['ruta']);

        $data['title'] = "Reporte de Cuota de Administracion";

        $data['total_pasajeros'] = 0;
        $data['total_admin'] = 0;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vreportes_administracion',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_admin_grande($desde, $hasta, $ruta)
    {
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;
        $data['ruta'] = $ruta;

        $data['results'] = $this->mreportes->administracion_report($data['desde'], $data['hasta'], $data['ruta']);

        $data['title'] = "Reporte de Despacho Vehiculos";

        $data['total_pasajeros'] = 0;
        $data['total_admin'] = 0;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vprint_administracion_grande',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_admin_tirilla($desde, $hasta, $ruta)
    {
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;
        $data['ruta'] = $ruta;

        $data['results'] = $this->mreportes->administracion_tirilla_report($data['desde'], $data['hasta'], $data['ruta']);

        $data['title'] = "Reporte de Despacho Vehiculos";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vprint_administracion_tirilla',$data);
        $this->load->view('templates/footer');
    }

    public function delete_cuota()
    {
        $s = $this->input->post('id_cuota');
        $res = $this->mreportes->cuota_delete($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function delete_tiquete()
    {
        $tiq = $this->input->post('tiquete');
        $veh = $this->input->post('vehiculo');
        $pas = $this->input->post('pasajeros');

        $res = $this->mreportes->tiquete_delete($tiq);
        $this->mreportes->delete_pasajeros_vehiculo($veh, $pas);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function print_receipt_tiquetes($sale_id)
    {
        $this->load->model('mtiquetes');
        $this->load->model('mconfiguracion');
        $data['last_sale'] = $this->mtiquetes->get_last_sale($sale_id);
        $id_config = 1;
        $data['config'] = $this->mconfiguracion->get_config($id_config);

        $data['title'] = "Tiquete";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vreceipt_tiquetes',$data);
        $this->load->view('templates/footer');
    }

    public function print_receipt_bodega($sale_id)
    {
        $this->load->model('mbodega');
        $this->load->model('mconfiguracion');
        $data['last_sale'] = $this->mbodega->get_last_sale($sale_id);
        $id_config = 1;
        $data['config'] = $this->mconfiguracion->get_config($id_config);

        $data['title'] = "Tiquete";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/vreceipt_bodega',$data);
        $this->load->view('templates/footer');
    }
}
