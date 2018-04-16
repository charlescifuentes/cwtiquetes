<?php
class Mvehiculos extends CI_Model {

        public function __construct()
        {

        }

        public function get_vehiculos()
        {
            $query = $this->db->get('lt_vehiculos');
            return $query->result_array();
        }

        public function get_vehiculo($str)
        {
            $query = $this->db->get_where('lt_vehiculos', array('numero_vehiculo' => $str));
            return $query->row_array();
        }

        public function insert_vehiculo()
        {
            $data = array(
            'numero_vehiculo' => $this->input->post('numero_vehiculo'),
            'placa_vehiculo' => $this->input->post('placa_vehiculo'),
            'nombres_conductor' => $this->input->post('nombres_conductor'),
            'apellidos_conductor' => $this->input->post('apellidos_conductor'),
            'telefono_conductor' => $this->input->post('telefono_conductor'),
            'numero_licencia' => $this->input->post('numero_licencia'),
            'categoria_licencia' => $this->input->post('categoria_licencia'),
            'venc_licencia' => $this->input->post('venc_licencia'),
            'numero_soat' => $this->input->post('numero_soat'),
            'venc_soat' => $this->input->post('venc_soat'),
            'num_tarjeta_operacion' => $this->input->post('num_tarjeta_operacion'),
            'venc_tarjeta_operacion' => $this->input->post('venc_tarjeta_operacion'),
            'extracto_contractual' => $this->input->post('extracto_contractual'),
            'venc_extracto_contractual' => $this->input->post('venc_extracto_contractual'),
            'num_tecnico_mecanica' => $this->input->post('num_tecnico_mecanica'),
            'venc_tecnico_mecanica' => $this->input->post('venc_tecnico_mecanica'),
            'clase_vehiculo' => $this->input->post('clase_vehiculo'),
            'capacidad_pasajeros' => $this->input->post('capacidad_pasajeros'),
            'nombres_propietario' => $this->input->post('nombres_propietario'),
            'apellidos_propietario' => $this->input->post('apellidos_propietario'),
            'telefono_propietario' => $this->input->post('telefono_propietario')
            );

            return $this->db->insert('lt_vehiculos', $data);
        }

        public function update_vehiculo()
        {
            $numero_vehiculo = $this->input->post('numero_vehiculo');

            $data = array(
            'placa_vehiculo' => $this->input->post('placa_vehiculo'),
            'nombres_conductor' => $this->input->post('nombres_conductor'),
            'apellidos_conductor' => $this->input->post('apellidos_conductor'),
            'telefono_conductor' => $this->input->post('telefono_conductor'),
            'numero_licencia' => $this->input->post('numero_licencia'),
            'categoria_licencia' => $this->input->post('categoria_licencia'),
            'venc_licencia' => $this->input->post('venc_licencia'),
            'numero_soat' => $this->input->post('numero_soat'),
            'venc_soat' => $this->input->post('venc_soat'),
            'num_tarjeta_operacion' => $this->input->post('num_tarjeta_operacion'),
            'venc_tarjeta_operacion' => $this->input->post('venc_tarjeta_operacion'),
            'extracto_contractual' => $this->input->post('extracto_contractual'),
            'venc_extracto_contractual' => $this->input->post('venc_extracto_contractual'),
            'num_tecnico_mecanica' => $this->input->post('num_tecnico_mecanica'),
            'venc_tecnico_mecanica' => $this->input->post('venc_tecnico_mecanica'),
            'clase_vehiculo' => $this->input->post('clase_vehiculo'),
            'capacidad_pasajeros' => $this->input->post('capacidad_pasajeros'),
            'nombres_propietario' => $this->input->post('nombres_propietario'),
            'apellidos_propietario' => $this->input->post('apellidos_propietario'),
            'telefono_propietario' => $this->input->post('telefono_propietario')
            );

            $this->db->where('numero_vehiculo', $numero_vehiculo);
            $this->db->update('lt_vehiculos', $data);
        }

        public function delete_vehiculo($id)
        {
            if ( ! $this->db->delete('lt_vehiculos', array('numero_vehiculo' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function enturnar_vehiculo($id)
        {
            $this->db->where('numero_vehiculo', $id);
            $this->db->set('enturnar',1);
            $this->db->update('lt_vehiculos');

            return 1;
        }

        public function desenturnar_vehiculo($id)
        {
            $this->db->where('numero_vehiculo', $id);
            $this->db->set('enturnar',0);
            $this->db->update('lt_vehiculos');

            return 0;
        }

}
