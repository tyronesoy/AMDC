<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memo extends CI_Controller {

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
		$check = $this->session->userdata('type');
		if($check == 'Assistant'){
			// echo "<pre>";
			// 	print_r ( $this->session->all_userdata());
			// 	echo "</pre>";
		$this->load->model('db_model');
		$data['memo']=$this->db_model->getMemo();
		$this->load->view('Assistant/memo', $data);
	}
		//$check = $this->session->userdata('stts');
		//if($check == 'Assistant'){
		//	$this->load->view('Assistant/user_accounts');
		//}else if($check == 'Assistant'){
		//	$this->load->view('Assistant/user_accounts');
		//}else if($check == 'Supervisor'){
		//	$this->load->view('Supervisor/user_accounts');
		//}else{
		//	header('Location: ../login');
		//}
		
	}
	public function getMemo(){
		$this->load->view('Assistant/php/memoFetch');
	}
	public function addMemo(){
		$this->load->view('Assistant/php/memoAdd');
	}
	public function deleteMemo(){
		$this->load->view('Assistant/php/memoDelete');
	}
	
	public function editMemo(){
		$this->load->view('Assistant/php/memoEdit');
	}
}
