<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelsaldo extends CI_Model{

	function datasaldo(){
		return $this->db->query("SELECT * from saldo ");
	}
	function datasaldotran(){
		return $this->db->query("SELECT * from saldo order by kodesaldo desc ");
	}
	function data(){
		return $this->db->query("SELECT * from saldo order by kodesaldo desc ");
	}

	function simpandata(){   
		$kds = $this->input->post('kdsaldo', TRUE);
		$kda = $this->input->post('tglsaldo', TRUE);
        $nma = $this->input->post('saldoawl', TRUE);
        $jna = $this->input->post('saldoakr', TRUE);
        $ab= $nma+$jna;

        $a = $this->db->query("insert into saldo values('$kds','$kda','$nma','$ab')");
		return $a;
	} 

	function ambildata($kode)
	{
		return $this->db->query("SELECT * from saldo where kodesaldo='$kode'");
	}
	
	function updatedata(){
		$kda = $this->input->post('kdsaldo', TRUE);
        $nma = $this->input->post('nmsaldo', TRUE);
        $jna = $this->input->post('jnsaldo', TRUE);

        return $this->db->query("update saldo set jenissaldo='$jna',namasaldo='$nma' where kodesaldo='$kda'");
		 	
	}
	function hapusdata($kode){
		return $this->db->query("delete from saldo where kodesaldo='$kode'");
	}

}
?>