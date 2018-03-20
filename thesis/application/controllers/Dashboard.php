<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		parent::_construct();
		$this->load->library('session');
	}

	public function index()
	{

		$checklogin = $this->session->userdata('username');
		if(empty($checklogin)){
			$this->load->view('login_view');
		}else{
			$ty = $this->session->userdata('type');
			$st = $this->session->userdata('stts');

			if($ty == 'BusinessManager' && $st == 'Active'){
				// echo "<pre>";
				// print_r ( $this->session->all_userdata());
				// echo "</pre>";
				$exit = $this->session->mark_as_temp(array('username', 'password'), 300);
					//$this->session->sess_destroy();

			$this->load->view('BusinessManager/dashboard');
			
			}else if($ty == 'Assistant' && $st == 'Active'){
			$this->load->view('Assistant/dashboard');
			}else if($ty == 'Supervisor' && $st == 'Active'){
			$this->load->view('Supervisor/dashboard');
			}else{
				$this->load->view('login_view');
			}
		}
		
	}

	public function departmentPage(){
	$check = $this->session->userdata('type');
		if($check == 'BusinessManager'){
			// echo "<pre>";
			// print_r ( $this->session->all_userdata());
			// echo "</pre>";
			$exit = $this->session->mark_as_temp(array('username', 'password'), 300);
			//		$this->session->sess_destroy();
			$this->load->view('BusinessManager/departments');
		//}else if($check == 'Assistant'){
		//	$this->load->view('Assistant/dashboard');
		//}else if($check == 'Supervisor'){
		//	$this->load->view('Supervisor/dashboard');
		//}else{
		//	header('Location: login');
		}
	}

	public function checklogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('db_model');
		$this->db_model->logindata($username,$password);
	}
}
