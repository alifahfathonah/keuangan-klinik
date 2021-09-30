<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelakun extends CI_Model{

	function dataakun(){
		return $this->db->query("SELECT * from akun ");
	}
	function dataakunpend(){
		return $this->db->query("SELECT * from akun where jenisakun='M' ");
	}
	function dataakunpeng(){
		return $this->db->query("SELECT * from akun where jenisakun='K' ");
	}

	function simpandata(){   
		
		$kda = $this->input->post('kdakun', TRUE);
        $nma = $this->input->post('nmakun', TRUE);
        $jna = $this->input->post('jnakun', TRUE);

        $a = $this->db->query("insert into akun values('$kda','$jna','$nma')");
		return $a;
	} 

	function ambildata($kode)
	{
		return $this->db->query("SELECT * from akun where kodeakun='$kode'");
	}
	
	function updatedata(){
		$kda = $this->input->post('kdakun', TRUE);
        $nma = $this->input->post('nmakun', TRUE);
        $jna = $this->input->post('jnakun', TRUE);

        return $this->db->query("update akun set jenisakun='$jna',namaakun='$nma' where kodeakun='$kda'");
		 	
	}
	function hapusdata($kode){
		return $this->db->query("delete from akun where kodeakun='$kode'");
	}

}
?>