<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentsOrder extends CI_Controller {

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
		// $check = $this->session->userdata('type');
		// if($check == 'Assistant'){
		// 	echo "<pre>";
		// 		print_r ( $this->session->all_userdata());
		// 		echo "</pre>";
		// 	$this->load->model('db_model');
		// 	$data['departments']=$this->db_model->getDepartments();
		// 	$this->load->view('Assistant/departments', $data);

		// }
		$_SESSION['logged_in'] = 'True';
		//$this->load->view('Assistant/dep_orders');
		if($_SESSION['logged_in'] == 'True')  
      			{  
           			// echo 'dashboard';
           			$this->load->view('Assistant/dep_orders');
      			}  
      			else if ($_SESSION['logged_in'] != 'True')  
      			{  
           			// echo "Assistant/lockscreen";
           			$this->load->view('Assistant/lockscreen');
      			}
		//$check = $this->session->userdata('stts');
		//if($check == 'Assistant'){
		//	$this->load->view('Assistant/departments');
		//}else if($check == 'Assistant'){
		//	$this->load->view('Assistant/departments');
		//}else if($check == 'Supervisor'){
		//	$this->load->view('Supervisor/departments');
		//}else{
	//		header('Location: ../login');
	//	}
		
	}
	// public function getDepartment(){
	// 	$this->load->view('Assistant/php/departmentsFetch');
	// }
	public function editOrder(){
		$this->load->view('Assistant/php/edit_order');
	}
	public function viewOrder(){
		$this->load->view('Assistant/php/order_view');
	}
	public function acceptOrder(){
		$this->load->view('Assistant/php/accept_order');
	}
	public function declineOrder(){
		$this->load->view('Assistant/php/decline_order');
	}

}
