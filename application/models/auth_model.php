<?php
class Auth_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_id_user($user){

          $this->db->select("id");
          $this->db->from("Utente");
          $this->db->where('username',$user['username']);
          $this->db->where('password',$user['password']);
          $this->db->limit(1);
          $query = $this->db->get();

          if ($query->num_rows() == 1) {
              $row = $query->row();
              return $row->id;
            } else {
              return false;
            }
        }

        public function get_session()
        {
          if($this->session->has_userdata('session')==true){
          return true;
        }else{
          return false;
        }
        }

        public function login($user){
          //Creo la condizione per interrogare il database
          $condition = "username =" . "'" . $user['username'] . "' AND " . "password =" . "'" . $user['password'] . "'";

          $this->db->select("*");
          $this->db->from("Utente");
          $this->db->where($condition);
          $this->db->limit(1);
          $query = $this->db->get();
          if ($query->num_rows() == 1) {
              $sess = array("session" => true);
              $this->db->where($condition);
              $this->db->update("Utente",$sess );
              return true;
            } else {
              return false;
            }
        }

        public function logout($user){
          //Creo la condizione per interrogare il database
          $condition = "username =" . "'" . $user['username'] . "' AND " . "password =" . "'" . $user['password'] . "'";

          $this->db->select("*");
          $this->db->from("Utente");
          $this->db->where($condition);
          $this->db->limit(1);
          $query = $this->db->get();
          if ($query->num_rows() == 1) {
              $sess = array("session" => false);
              $this->db->where($condition);
              $this->db->update("Utente",$sess );
              return true;
            } else {
              return false;
            }
        }


        public function registrazione($user){

          $this->db->insert('Utente',$user);

        }
}
