<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchLA extends CI_Controller {

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
	public function index()
	{
		$this->load->model('db_model');
		$data['branchLA']=$this->db_model->getLADepartments();
		$this->load->view('Supervisor/php/branchLA', $data);
		/*
		$check = $this->session->userdata('stts');
		if($check == 'Supervisor'){
			$this->load->view('Supervisor/medical_supplies');
		}else if($check == 'Assistant'){
			$this->load->view('Assistant/medical_supplies');
		}else if($check == 'Supervisor'){
			$this->load->view('Supervisor/medical_supplies');
		}else{
			header('Location: ../login');
		} */
		
	}
	public function getLADepartment(){
		$this->load->view('Supervisor/php/departmentsLAFetch');
	}
	public function editLADepartment(){
		$this->load->view('Supervisor/php/departmentsEdit');
	}
}
