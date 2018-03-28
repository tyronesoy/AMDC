<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliveries extends CI_Controller {

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
	public function index(){
		// $this->load->model('db_model');
		// $data['deliveries']=$this->db_model->getDeliveries();
		// $this->load->view('Assistant/deliveries', $data);
		$this->load->view('Assistant/deliveries');
		//$check = $this->session->userdata('stts');
		//if($check == 'Assistant'){
		//	$this->load->view('Assistant/suppliers');
		//}
		//else if($check == 'Assistant'){
		//	$this->load->view('Assistant/suppliers');
		//}else if($check == 'Supervisor'){
		//	$this->load->view('Supervisor/suppliets');
		//}else{
		//	header('Location: ../login');
		//}
	}
	public function getDelivery(){
		$this->load->view('Assistant/php/deliveryFetch');
	}
	// public function getChange(){
	// 	$this->load->view('Assistant/php/supplierChange');
	// }
	public function getFullDelivery(){
		$this->load->view('Assistant/php/deliveryFull');
	}
	
	public function getPartialDelivery(){
		$this->load->view('Assistant/php/deliveryPartial');
	}

}
