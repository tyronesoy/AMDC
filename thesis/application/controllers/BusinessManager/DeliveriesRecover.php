<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveriesRecover extends CI_Controller {

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
		// $this->load->view('BusinessManager/deliveries', $data);
		echo "<pre class = 'hidden'>";
				print_r ( $this->session->all_userdata());
				echo "</pre>";
				$_SESSION['logged_in'] = 'True';
		//$this->load->view('BusinessManager/deliveries');
		if($_SESSION['logged_in'] == 'True')  
      			{  
           			// echo 'dashboard';
           			//$this->load->view('BusinessManager/dashboard');
           			$this->load->view('BusinessManager/deliveriesRecover');
      			}  
      			else if ($_SESSION['logged_in'] != 'True')  
      			{  
           			// echo "BusinessManager/lockscreen";
           			$this->load->view('BusinessManager/lockscreen');
      			}
		//$check = $this->session->userdata('stts');
		//if($check == 'BusinessManager'){
		//	$this->load->view('BusinessManager/suppliers');
		//}
		//else if($check == 'Assistant'){
		//	$this->load->view('Assistant/suppliers');
		//}else if($check == 'Supervisor'){
		//	$this->load->view('Supervisor/suppliets');
		//}else{
		//	header('Location: ../login');
		//}
	}
	public function recoverDelivery(){
		$this->load->view('BusinessManager/php/deliveriesRestore');
	}


}
