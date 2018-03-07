<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function logindata($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('users');
		if ($query->num_rows() >0){
			foreach ($query->result() as $row){
				$sess = array(
					'username' => $row->username,
					'password' => $row->password
					);
			}
		$this->session->get_userdata($sess);
		redirect('/BusinessManager/dashboard');
		} else {
			$this->session->set_flashdata('info', 'The username or password is incorrect!');
			redirect('login');
		}
	}
}
