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
		$this->load->model('db_model');
		$data['memo']=$this->db_model->getMemo();
		$this->load->view('BusinessManager/memo', $data);
		//$check = $this->session->userdata('stts');
		//if($check == 'BusinessManager'){
		//	$this->load->view('BusinessManager/user_accounts');
		//}else if($check == 'Assistant'){
		//	$this->load->view('Assistant/user_accounts');
		//}else if($check == 'Supervisor'){
		//	$this->load->view('Supervisor/user_accounts');
		//}else{
		//	header('Location: ../login');
		//}
		
	}
	public function getMemo(){
		$this->load->view('BusinessManager/php/memoFetch');
	}
	public function addMemo(){
		$this->load->view('BusinessManager/php/memoAdd');
	}
	
	
	public function editMemo(){
		$this->load->view('BusinessManager/php/memoEdit');
	}
}
