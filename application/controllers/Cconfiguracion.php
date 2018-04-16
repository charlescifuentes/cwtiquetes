<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cconfiguracion extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mlogin');
                $this->load->model('mconfiguracion');
    }

    public function index()
    {
        /*if(!$this->mlogin->is_logged_in())
		{
			redirect('clogin');
		}*/

        $data['title'] = "Configuración";

        $id_config = 1;
        $data['config'] = $this->mconfiguracion->get_config($id_config);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('configuracion/vconfiguracion',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->mconfiguracion->update_config();
        redirect('cconfiguracion');
    }
}
