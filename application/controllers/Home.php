<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->helper(array('url'));
				$this->load->library('table');
        $this->load->model("content_model");
    }

	public function index()
	{

		//Controllo se ci sono i dati in sessione
    if($this->session->has_userdata('username','password')){
    //Salvo la sessione in $sess_user
    $sess_user = $this->session->userdata();

			$id_user = $this->auth_model->get_id_user($sess_user);
			$data = $this->content_model->get_content($id_user);
			// $data = array(
	    //   'flag' => $this->content_model->get_content($id_user)->flag,
	    //   'nome' => $this->content_model->get_content($id_user)->nome,
	    //   'descrizione' => $this->content_model->get_content($id_user)->descrizione,
	    //   'data_agg' => $this->content_model->get_content($id_user)->data_agg,
	    //   'data_mod' => $this->content_model->get_content($id_user)->data_mod
	    // );

		$this->load->view('vw_header');
		$this->load->view('home/vw_home',$data);
		$this->load->view('vw_footer');
		}
		else{
			$this->load->view('vw_header');
			$this->load->view('err_login');
			$this->load->view('vw_footer');
		}
	}
}
