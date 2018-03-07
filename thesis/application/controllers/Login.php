<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function _construct(){
		session_start();
	}

	public function index(){
		$checklogin = $this->session->userdata('username');
		if(empty($checklogin)){
			$this->load->view('login_view');
		}else{
			$st = $this->session->userdata('stts');

			if($st == 'BusinessManager'){
			redirect('/BusinessManager/dashboard');
			}else if($st == 'Assistant'){
			redirect('/Assistant/dashboard');
			}else if($st == 'Supervisor'){
			redirect('/Supervisor/dashboard');
			}
		}
		 
	}

	public function checklogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('db_model');
		$this->db_model->logindata($username,$password);
	}

	public function logout(){
		$this->session->set_userdata('username', FALSE);
		$this->session->sess_destroy();
		redirect('login');
	}
	
}
