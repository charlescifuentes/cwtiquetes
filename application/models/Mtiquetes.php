<?php
class Mtiquetes extends CI_Model {

        public function __construct()
        {

        }

        public function get_vehiculos()
        {
            $this->db->select('numero_vehiculo, nombres_conductor, apellidos_conductor, enturnar');
            $this->db->from('lt_vehiculos');
            return $query = $this->db->get()->result_array();
        }

        public function get_vehiculo_type($s)
        {
            $this->db->select('*');
            $this->db->from('lt_vehiculos');
            $this->db->where('numero_vehiculo', $s);
            return $query = $this->db->get()->result_array();
        }

        public function get_rutas()
        {
            $this->db->select('id_ruta, nom_ruta');
            $this->db->from('lt_rutas');
            return $query = $this->db->get()->result_array();
        }

        public function get_ruta_valor($s)
        {
            $this->db->select('nom_ruta, valor_ruta');
            $this->db->from('lt_rutas');
            $this->db->where('id_ruta', $s);
            return $query = $this->db->get()->result_array();
        }

        public function get_clientes()
        {
            $this->db->select('doc_cliente, nom_cliente, apell_cliente');
            $this->db->from('lt_clientes');
            return $query = $this->db->get()->result_array();
        }

        public function get_cliente($s)
        {
            $this->db->select('*');
            $this->db->from('lt_clientes');
            $this->db->where('doc_cliente', $s);
            return $query = $this->db->get()->result_array();
        }

        public function set_tiquetes()
        {
            $data = array(
                'fecha_venta_tiq' => $this->input->post('fecha'),
                'numero_vehiculo' => $this->input->post('vehiculo'),
                'doc_cliente' => $this->input->post('cliente'),
                'id_ruta' => $this->input->post('ruta'),
                'pasajeros' => $this->input->post('cant_pasajeros'),
                'valor_ruta' => $this->input->post('valor_pasaje'),
                'observaciones' => $this->input->post('observacion')
            );

            $this->db->insert('lt_tiquetes', $data);

            return $this->db->insert_id();
        }

        public function set_cupo_vehiculo()
        {
            $placa = $this->input->post('vehiculo');
            $pasajeros = $this->input->post('cant_pasajeros');

            $this->db->where('numero_vehiculo', $placa);
            $this->db->set('pasajeros_asignados','pasajeros_asignados + '.$pasajeros.'',false);
            $this->db->update('lt_vehiculos');
        }

        public function update_vehiculo_cupo()
        {
            $numero_vehiculo = $this->input->post('numero_vehiculo');

            $this->db->where('numero_vehiculo', $numero_vehiculo);
            $this->db->set('pasajeros_asignados', 0);
            $this->db->update('lt_vehiculos');
        }

        public function desenturnar_vehiculo()
        {
            $numero_vehiculo = $this->input->post('numero_vehiculo');

            $this->db->where('numero_vehiculo', $numero_vehiculo);
            $this->db->set('enturnar',0);
            $this->db->update('lt_vehiculos');
        }

        public function cuota_administracion()
        {
            $data = array(
                'fecha_venta' => $this->input->post('fecha_despacho'),
                'numero_vehiculo' => $this->input->post('numero_vehiculo'),
                'id_ruta' => $this->input->post('ruta_despacho'),
                'pasajeros' => $this->input->post('pasajeros_despacho'),
                'valor_admin' => $this->input->post('valor_admin')
            );

            $this->db->insert('lt_cuota_administracion', $data);
        }

        public function insert_cliente()
        {
            $data = array(
                'doc_cliente' => $this->input->post('doc_cliente'),
                'nom_cliente' => $this->input->post('nom_cliente'),
                'apell_cliente' => $this->input->post('apell_cliente'),
                'tel_cliente' => $this->input->post('tel_cliente'),
                'email_cliente' => $this->input->post('email_cliente'),
                'ciudad_cliente' => $this->input->post('ciudad_cliente')
            );

            if ( ! $this->db->insert('lt_clientes', $data))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function get_last_sale($sale_id)
        {
            $this->db->select('*');
    		$this->db->from('lt_tiquetes');
    		$this->db->join('lt_clientes','lt_clientes.doc_cliente = lt_tiquetes.doc_cliente');
            $this->db->join('lt_rutas','lt_rutas.id_ruta = lt_tiquetes.id_ruta');
            $this->db->join('lt_vehiculos','lt_vehiculos.numero_vehiculo = lt_tiquetes.numero_vehiculo');
    		$this->db->where('lt_tiquetes.id_tiquete',$sale_id);

            return $query = $this->db->get()->row_array();
        }

        public function get_last_tiquete()
        {
            return $this->db->select('id_tiquete')->order_by('id_tiquete', 'DESC')->limit(1)->get('lt_tiquetes')->row('id_tiquete');
        }
}
