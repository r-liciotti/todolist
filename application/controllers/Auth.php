<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        $this->load->helper(array('url','form'));
        $this->load->model("auth_model");
    }

	public function index()
	{
		$this->load->view('vw_header');
		$this->load->view('session/vw_login');
		$this->load->view('vw_footer');
	}

  public function login(){
    $this->load->view('vw_header');
		$this->load->view('session/vw_login');
		$this->load->view('vw_footer');
  }


  public function send_login(){
    //Prende i dati dal form
    $user=array(
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'session' => true
    );

    if($this->auth_model->login($user)){
      //Salvo l' array nella sessione
      $this->session->set_userdata($user);

      redirect('/Codigniter');
    }else{
      $this->load->view('vw_header');
  		$this->load->view('session/vw_login');
  		$this->load->view('vw_footer');
    }
  }

  public function logout()
  {
    //Controllo se ci sono i dati in sessione
    if($this->session->has_userdata('username','password', 'session')){
    //Se ci sono li recupero per poi cancellarli ed impostarre il flag Session a flase sul db
    $user = $this->session->userdata();
    $this->auth_model->logout($user);
    $this->session->unset_userdata('username','password', 'session');
    $this->session->sess_destroy();
    $this->load->view('vw_header');
    $this->load->view('err_login');
    $this->load->view('vw_footer');
    }
    else {
      $this->load->view('vw_header');
      $this->load->view('err_login');
      $this->load->view('vw_footer');
    }
  }



  public function registrazione(){
    $this->load->view('vw_header');
		$this->load->view('session/vw_register');
		$this->load->view('vw_footer');
  }



  public function send_registrazione(){
    // Prende i dati del form
    $user=array(
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password')
        );
    $this->auth_model->registrazione($user);

    $this->load->view('vw_header');
		$this->load->view('home/vw_home');
		$this->load->view('vw_footer');
  }
}
