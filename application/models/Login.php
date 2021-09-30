<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Model{
		function in($user,$pass){
	return $this->db->query("SELECT * FROM user where username='$user' and password=md5('$pass')");
		}
}		
?>