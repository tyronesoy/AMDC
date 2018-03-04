<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function getLoginData($usr, $pwd){
		$user = mysql_real_escape_string($usr);
		$pass = md5(mysql_real_escape_string($pwd));
		$check_login = $this->db->get_where('users', array('username' => $user, 'password' => $pass));
		if($check_login->num_rows() > 0){
			$query_data = $check_login->row();
			if($user == $query_data->username && $pass == $query_data->password){
				

				if($query_data->status == 'BusinessManager'){
					header('Location: BusinessManager/dashboard');
				}else if($query_data->status == 'Assistant'){
					header('Location: Assistant/dashboard');
				}else if($query_data->status == 'Supervisor'){
					header('Location: Supervisor/dashboard');
				}
			}
		}
	}
}
