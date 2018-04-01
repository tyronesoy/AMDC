<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function logindata($username,$password){
		$this->db->where("(user_email = '$username' OR username = '$username')");
		$this->db->where('password', $password);

		$query = $this->db->get('users');
		if ($query->num_rows() >0){
			foreach ($query->result() as $row){
				if(($username == $row->username && $password == $row->password)
					||($username == $row->user_email && $password == $row->password)){

					$sess = array(
					'fname' => $row->fname,
					'lname' => $row->lname,
					'username' => $row->username,
					'user_email' => $row->user_email,
					'password' => $row->password,
					'type'	   => $row->user_type,
					'stts'	   => $row->user_status,
					);

					$this->session->set_userdata($sess);
					if($row->user_type == 'BusinessManager' && $row->user_status == 'Active'){
						$_SESSION['logged_in'] = 'True';
						redirect('dashboard');
					}else if($row->user_type == 'Assistant' && $row->user_status == 'Active'){
						$_SESSION['logged_in'] = 'True';
						redirect('dashboard');
					}else if($row->user_type == 'Supervisor' && $row->user_status == 'Active'){
						$_SESSION['logged_in'] = 'True';
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
	public function getRecoverDepartments(){
		$query=$this->db->query("SELECT * FROM departments");
		return $query->result();
	}
	public function getBaguioDepartments(){
		$query=$this->db->query("SELECT * FROM departments WHERE location = 'Baguio City'");
		return $query->result();
	}
	public function getLADepartments(){
		$query=$this->db->query("SELECT * FROM departments WHERE location = 'La Trinidad'");
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
	public function getMemoRecover(){
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
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type = 'Medical'");
		return $query->result();
	}
	public function getOfficeSuppliesRecover(){
		$query=$this->db->query("SELECT * FROM supplies WHERE supply_Type = 'Office'");
		return $query->result();
	}

	public function getLogs(){
		$query=$this->db->query("SELECT * FROM logs");
		return $query->result();
	}


	// ORDERSSSSSSSSSSS
	public function getOrdersData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM orders WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM orders ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the orders item data
	public function getOrdersItemData($order_id = null)
	{
		if(!$order_id) {
			return false;
		}

		$sql = "SELECT * FROM orders_item WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');
		$bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bill_no' => $bill_no,
    		'customer_name' => $this->input->post('customer_name'),
    		'customer_address' => $this->input->post('customer_address'),
    		'customer_phone' => $this->input->post('customer_phone'),
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		

    		'user_id' => $user_id
    	);

		$insert = $this->db->insert('orders', $data);
		$order_id = $this->db->insert_id();

		$this->load->model('model_products');

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'order_id' => $order_id,
    			'product_id' => $this->input->post('product')[$x],
    			'qty' => $this->input->post('qty')[$x]
    		);

    		$this->db->insert('orders_item', $items);

    		// now decrease the stock from the product
    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

    		$update_product = array('qty' => $qty);


    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
    	}

		return ($order_id) ? $order_id : false;
	}

	public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM orders_item WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
				'customer_name' => $this->input->post('customer_name'),
	    		'customer_address' => $this->input->post('customer_address'),
	    		'customer_phone' => $this->input->post('customer_phone'),
	    		'gross_amount' => $this->input->post('gross_amount_value'),
	    		'service_charge_rate' => $this->input->post('service_charge_rate'),
	    		'service_charge' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value'):0,
	    		'vat_charge_rate' => $this->input->post('vat_charge_rate'),
	    		'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
	    		'net_amount' => $this->input->post('net_amount_value'),
	    		'discount' => $this->input->post('discount'),
	    		'paid_status' => $this->input->post('paid_status'),
	    		'user_id' => $user_id
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('orders', $data);

			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getOrdersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}

			// now remove the order item data 
			$this->db->where('order_id', $id);
			$this->db->delete('orders_item');

			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'order_id' => $id,
	    			'product_id' => $this->input->post('product')[$x],
	    			'qty' => $this->input->post('qty')[$x],
	    			'rate' => $this->input->post('rate_value')[$x],
	    			'amount' => $this->input->post('amount_value')[$x],
	    		);
	    		$this->db->insert('orders_item', $items);

	    		// now decrease the stock from the product
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

	    		$update_product = array('qty' => $qty);
	    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
	    	}

			return true;
		}
	}



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('orders');

			$this->db->where('order_id', $id);
			$delete_item = $this->db->delete('orders_item');
			return ($delete == true && $delete_item) ? true : false;
		}
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}
