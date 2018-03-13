<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MedicalSuppliesTotalQuantity extends CI_Controller {

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
		$data['medicalSupplies']=$this->db_model->getMedicalSuppliesTotalQuantity();
		$this->load->view('BusinessManager/php/medTotalQty', $data);
		/*
		$check = $this->session->userdata('stts');
		if($check == 'BusinessManager'){
			$this->load->view('BusinessManager/medical_supplies');
		}else if($check == 'Assistant'){
			$this->load->view('Assistant/medical_supplies');
		}else if($check == 'Supervisor'){
			$this->load->view('Supervisor/medical_supplies');
		}else{
			header('Location: ../login');
		} */
		
	}
	public function getMedicalSupplies(){
		$this->load->view('BusinessManager/php/medicalSuppliesFetch');
	}
	public function addMedicalSupplies(){
		$this->load->view('BusinessManager/php/medicalSuppliesAdd');
	}
	public function deleteMedicalSupplies(){
		$this->load->view('BusinessManager/php/medicalSuppliesDelete');
	}
	public function editMedicalSupplies(){
		$this->load->view('BusinessManager/php/medicalSuppliesEdit');
	}
	public function reconcileMedicalSupplies(){
		$this->load->view('BusinessManager/php/medicalSuppliesReconcile');
	}

}