<?php
class Mrutas extends CI_Model {

        public function __construct()
        {

        }

        public function get_rutas()
        {
            $query = $this->db->get('lt_rutas');
            return $query->result_array();
        }

        public function get_ruta($str)
        {
            $query = $this->db->get_where('lt_rutas', array('id_ruta' => $str));
            return $query->row_array();
        }

        public function insert_ruta()
        {
            $data = array(
            'id_ruta' => $this->input->post('id_ruta'),
            'nom_ruta' => $this->input->post('nom_ruta'),
            'valor_ruta' => $this->input->post('valor_ruta'),
            'activo_ruta' => $this->input->post('activo_ruta')
            );

            return $this->db->insert('lt_rutas', $data);
        }

        public function update_ruta()
        {
            $id_ruta = $this->input->post('id_ruta');

            $data = array(
            'nom_ruta' => $this->input->post('nom_ruta'),
            'valor_ruta' => $this->input->post('valor_ruta'),
            'activo_ruta' => $this->input->post('activo_ruta')
            );

            $this->db->where('id_ruta', $id_ruta);
            $this->db->update('lt_rutas', $data);
        }

        public function delete_ruta($id)
        {
            if ( ! $this->db->delete('lt_rutas', array('id_ruta' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function get_last_idruta()
        {
            return $this->db->select('id_ruta')->order_by('id_ruta', 'DESC')->limit(1)->get('lt_rutas')->row('id_ruta');
        }
}
