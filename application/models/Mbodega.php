<?php
class Mbodega extends CI_Model {

        public function __construct()
        {

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

        public function get_servicios()
        {
            $this->db->select('id_servicio, nom_servicio');
            $this->db->from('lt_servicios');
            return $query = $this->db->get()->result_array();
        }

        public function get_servicio_valor($s)
        {
            $this->db->select('valor_servicio');
            $this->db->from('lt_servicios');
            $this->db->where('id_servicio', $s);
            return $query = $this->db->get()->result_array();
        }

        public function get_last_bodegaid()
        {
            return $this->db->select('id_bodega')->order_by('id_bodega', 'DESC')->limit(1)->get('lt_bodega')->row('id_bodega');
        }

        public function set_bodega()
        {
            $data = array(
                'fecha_venta_bod' => $this->input->post('fecha'),
                'doc_cliente' => $this->input->post('cliente'),
                'id_servicio' => $this->input->post('servicio'),
                'valor_servicio' => $this->input->post('valor_servicio'),
                'observaciones' => $this->input->post('observacion')
            );

            $this->db->insert('lt_bodega', $data);

            return $this->db->insert_id();
        }

        public function get_last_sale($sale_id)
        {
            $this->db->select('*');
    		$this->db->from('lt_bodega');
    		$this->db->join('lt_clientes','lt_clientes.doc_cliente = lt_bodega.doc_cliente');
            $this->db->join('lt_servicios','lt_servicios.id_servicio = lt_bodega.id_servicio');
    		$this->db->where('lt_bodega.id_bodega',$sale_id);

            return $query = $this->db->get()->row_array();
        }
}
