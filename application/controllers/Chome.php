<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin');
    }

    public function index()
    {
        $data['title'] = "Panel de Control";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
}
