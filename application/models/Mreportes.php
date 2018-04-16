<?php
class Mreportes extends CI_Model {

        public function __construct()
        {

        }

        public function tiquetes_report($desde, $hasta, $ruta)
        {
            $this->db->select('*');
    		$this->db->from('lt_tiquetes');
    		$this->db->join('lt_clientes','lt_clientes.doc_cliente = lt_tiquetes.doc_cliente');
            $this->db->join('lt_rutas','lt_rutas.id_ruta = lt_tiquetes.id_ruta');
            $this->db->join('lt_vehiculos','lt_vehiculos.numero_vehiculo = lt_tiquetes.numero_vehiculo');
    		$this->db->where('fecha_venta_tiq >=', $desde);
            $this->db->where('fecha_venta_tiq <=', $hasta);
            if($ruta != "null"){
                $this->db->where('lt_tiquetes.id_ruta =', $ruta);
            }
            return $query = $this->db->get()->result_array();
        }

        public function bodega_report($desde, $hasta)
        {
            $this->db->select('*');
    		$this->db->from('lt_bodega');
    		$this->db->join('lt_clientes','lt_clientes.doc_cliente = lt_bodega.doc_cliente');
            $this->db->join('lt_servicios','lt_servicios.id_servicio = lt_bodega.id_servicio');
    		$this->db->where('fecha_venta_bod >=', $desde);
            $this->db->where('fecha_venta_bod <=', $hasta);
            $this->db->order_by('lt_bodega.id_bodega','asc');

            return $query = $this->db->get()->result_array();
        }

        public function administracion_report($desde, $hasta, $ruta)
        {
            $this->db->select('*');
    		$this->db->from('lt_cuota_administracion');
    		$this->db->join('lt_vehiculos','lt_vehiculos.numero_vehiculo = lt_cuota_administracion.numero_vehiculo');
            $this->db->join('lt_rutas','lt_rutas.id_ruta = lt_cuota_administracion.id_ruta');
    		$this->db->where('fecha_venta >=', $desde);
            $this->db->where('fecha_venta <=', $hasta);
            if($ruta != "null"){
                $this->db->where('lt_cuota_administracion.id_ruta =', $ruta);
            }
            $this->db->order_by('lt_cuota_administracion.id_cadmin','asc');
            return $query = $this->db->get()->result_array();
        }

        public function cuota_delete($id)
        {
            if ( ! $this->db->delete('lt_cuota_administracion', array('id_cadmin' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function tiquete_delete($tiq)
        {
            if ( ! $this->db->delete('lt_tiquetes', array('id_tiquete' => $tiq)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function delete_pasajeros_vehiculo($veh, $pas)
        {
            $this->db->where('numero_vehiculo', $veh);
            $this->db->set('pasajeros_asignados','pasajeros_asignados - '.$pas.'',false);
            $this->db->update('lt_vehiculos');
        }
}
