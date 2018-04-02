<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficeSupplies extends CI_Controller {

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
		$check = $this->session->userdata('type');
		if($check == 'Supervisor'){
			echo "<pre class = 'hidden'>";
				print_r ( $this->session->all_userdata());
				echo "</pre>";
		$this->load->model('db_model');
		$data['office_supplies']=$this->db_model->getOfficeSupplies();
		$this->load->view('Supervisor/office_supplies', $data);
	}
		
	}
	public function getOfficeSupplies(){
		$this->load->view('Supervisor/php/OfficeSuppliesFetch');
	}
	public function addOfficeSupplies(){
		$this->load->view('Supervisor/php/OfficeSuppliesAdd');
	}
	public function OfficeSuppliesadd(){
		$this->load->view('Supervisor/php/OfficeSuppliesAddQuantity');
	}
	public function deleteOfficeSupplies(){
		$this->load->view('Supervisor/php/OfficeSuppliesDelete');
	}
	public function editOfficeSupplies(){
		$this->load->view('Supervisor/php/OfficeSuppliesEdit');
	}
	public function reconcileOfficeSupplies(){
		$this->load->view('Supervisor/php/OfficeSuppliesReconcile');
	}
	public function addOfficeSuppliesIssueTo(){
		$this->load->view('Supervisor/php/OfficeSuppliesIssueTo');
	}
	public function totalOfficeSupplies(){
		$this->load->view('Supervisor/php/OfficeSuppliesTotalQuantity');
	}
}
