<?php
class Mclientes extends CI_Model {

        public function __construct()
        {

        }

        public function get_clientes()
        {
            $query = $this->db->get('lt_clientes');
            return $query->result_array();
        }

        public function get_cliente($str)
        {
            $query = $this->db->get_where('lt_clientes', array('doc_cliente' => $str));
            return $query->row_array();
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

            return $this->db->insert('lt_clientes', $data);
        }

        public function update_cliente()
        {
            $doc_cliente = $this->input->post('doc_cliente');

            $data = array(
            'nom_cliente' => $this->input->post('nom_cliente'),
            'apell_cliente' => $this->input->post('apell_cliente'),
            'tel_cliente' => $this->input->post('tel_cliente'),
            'email_cliente' => $this->input->post('email_cliente'),
            'ciudad_cliente' => $this->input->post('ciudad_cliente')
            );

            $this->db->where('doc_cliente', $doc_cliente);
            $this->db->update('lt_clientes', $data);
        }

        public function delete_cliente($id)
        {
            if ( ! $this->db->delete('lt_clientes', array('doc_cliente' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function get_last_idcliente()
        {
            return $this->db->select('doc_cliente')->order_by('doc_cliente', 'DESC')->limit(1)->get('lt_clientes')->row('doc_cliente');
        }
}
