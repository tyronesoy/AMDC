<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function logindata($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('users');
		if ($query->num_rows() >0){
			foreach ($query->result() as $row){
				if($username == $row->username && $password == $row->password){

					$sess = array(
					'username' => $row->username,
					'password' => $row->password,
					'type'	   => $row->user_type,
					'stts'	   => $row->user_status
					);

					$this->session->set_userdata($sess);
					if($row->user_type == 'BusinessManager' && $row->user_status == 'Active'){
						redirect('dashboard');
					}else if($row->user_type == 'Assistant' && $row->user_status == 'Active'){
						redirect('dashboard');
					}else if($row->user_type == 'Supervisor' && $row->user_status == 'Active'){
						redirect('dashboard');
					}else{
						$this->session->set_flashdata('info', 'This account is inactive!');
						redirect('/thesis/login');
					}
				}
			}
		} else {
			$this->session->set_flashdata('info', 'The username or password is incorrect!');
			redirect('login');
		}
	}

	public function getSuppliers(){
		$query=$this->db->query("SELECT * FROM suppliers");
		return $query->result();
	}
	public function getDepartments(){
		$query=$this->db->query("SELECT * FROM departments");
		return $query->result();
	}
	public function getUsers(){
		$query=$this->db->query("SELECT * FROM users");
		return $query->result();
	}
	public function getPurchases(){
		$query=$this->db->query("SELECT * FROM purchase_orders");
		return $query->result();
	}
	/* public function deleteSupplier($supplier_id){
		$this->db->where("id", $supplier_id);
		$this->db->delete("suppliers");

	} */

	public function getMedicalSupplies(){
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type = 'Medical'");
		return $query->result();
	}
	public function getMedicalSuppliesTotalQuantity(){
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type = 'Medical'");
		return $query->result();
	}
	public function getIssuedSupplies(){
		$query=$this->db->query("SELECT * FROM request_supplies");
		return $query->result();
	}
	public function getMemo(){
		$query=$this->db->query("SELECT * FROM memo");
		return $query->result();
	}
	public function getOfficeSupplies(){
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type= 'Office' ");
		return $query->result();
	}
	public function getOfficeSuppliesTotalQuantity(){
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type = 'Office'");
		return $query->result();
	}
	public function getMedicalSuppliesRecover(){
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type = 'Medical' AND soft_deleted='Y' ");
		return $query->result();
	}

}
