<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form','date'));
        $this->load->model("content_model");

    }

	public function index()
	{

	}

  public function add_content()
  {

   $this->load->view('vw_header');
   $this->load->view('content/vw_add_content');
   $this->load->view('vw_footer');
  }

  public function save_content()
  {
    //Controllo se ci sono i dati in sessione
    if($this->session->has_userdata('username','password')){
    //Salvo la sessione in $sess_user
    $sess_user = $this->session->userdata();


    $data = array(
      'flag' => false,
      'nome' => $this->input->post('name'),
      'descrizione' => $this->input->post('description'),
      'data_agg' => date("d/m/Y H:i:s"),
      'data_mod' => date("d/m/Y H:i:s"),
      //Recupero id utente che ha creato il contenuto
      "id_utente" => (int)$this->auth_model->get_id_user($sess_user)
    );

    //Salvo il contenuto nel DB
    $this->content_model->save_content($data);

    $this->load->view('vw_header');
    $this->load->view('home/vw_home');
    $this->load->view('vw_footer');

  }else {
    $this->load->view('vw_header');
    $this->load->view('err_login');
    $this->load->view('vw_footer');
  }

  }








}
