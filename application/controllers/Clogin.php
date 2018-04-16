<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Clogin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('security');

        // Load database
        $this->load->model('mlogin');
    }

    // Show login page
    public function index() {
        $this->load->view('login/vlogin');
    }

    // Show registration page
    public function user_registration_show() {
        $this->load->view('login/vlogin_registration_form');
    }

    // Validate and store registration data in database
    public function new_user_registration() {

        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/vlogin_registration_form');
        } else {
            $data = array(
            'user_name' => $this->input->post('username'),
            'user_email' => $this->input->post('email_value'),
            'user_password' => $this->input->post('password')
            );
            $result = $this->mlogin->registration_insert($data);

            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login/vlogin', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('login/vlogin_registration_form', $data);
                }
            }
    }

    // Check for user login process
    public function user_login_process() {

        $this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean',
                                            array('required' => 'Debe escribir un %s.'));
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean',
                                            array('required' => 'Debe escribir una %s.'));

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $data['title'] = "Panel de Control";

                $this->load->view('templates/header',$data);
                $this->load->view('templates/menu');
                $this->load->view('home',$data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('login/vlogin');
            }
        } else {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );
        $result = $this->mlogin->login($data);

        if ($result == TRUE) {

            $username = $this->input->post('username');
            $result = $this->mlogin->read_user_information($username);

            if ($result != false) {
                $session_data = array(
                'username' => $result[0]->user_name,
                'email' => $result[0]->user_email,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);

                $data['title'] = "Panel de Control";

                $this->load->view('templates/header',$data);
                $this->load->view('templates/menu');
                $this->load->view('home',$data);
                $this->load->view('templates/footer');
            }
        } else {
            $data = array(
            'error_message' => 'Usuario o Contraseña Invalidos'
            );
            $this->load->view('login/vlogin', $data);
            }
        }
    }

    // Logout from admin page
    public function logout() {
        // Removing session data
        $sess_array = array(
            'username' => ''
        );

        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Sesión cerrada satisfactoriamente';
        $this->load->view('login/vlogin', $data);
    }
}
