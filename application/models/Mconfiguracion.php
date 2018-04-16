<?php
class Mconfiguracion extends CI_Model {

        public function __construct()
        {

        }

        public function get_config($str)
        {
            $query = $this->db->get_where('lt_configuracion', array('id_configuracion' => $str));
            return $query->row_array();
        }

        public function update_config()
        {
            $data = array(
            'nombre_empresa' => $this->input->post('nombre_empresa'),
            'nit_empresa' => $this->input->post('nit_empresa'),
            'direccion_empresa' => $this->input->post('direccion_empresa'),
            'telefono_empresa' => $this->input->post('telefono_empresa'),
            'cia_aseguradora' => $this->input->post('cia_aseguradora'),
            'poliza_numero' => $this->input->post('poliza_numero')
            );

            $this->db->update('lt_configuracion', $data);
        }

}
