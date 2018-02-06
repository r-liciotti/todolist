<?php
class Content_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function save_content($data)
        {

          $this->db->insert('Content',$data);

        }

        public function get_content($user_id)
        {
          $this->db->select("*");
          $this->db->from("Content");
          $this->db->where('id_utente',$user_id);
          $this->db->limit(5);
          $query = $this->db->get();
          if ($query->num_rows() > 1) {
            return $query->result_array();
          }else {
            return false;
          }
        }
}
