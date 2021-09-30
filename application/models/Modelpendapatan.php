<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelpendapatan extends CI_Model{

	function datapendapatan(){
		return $this->db->query("SELECT kodetransaksi,tgltransaksi,namaakun,jumlah FROM pendapatan INNER JOIN akun ON pendapatan.jenisakun=akun.kodeakun;");
	}
	function data(){
		return $this->db->query("SELECT * from pendapatan order by kodetransaksi desc ");
	}
	function ambildata($kode)
	{
		return $this->db->query("SELECT kodetransaksi,tgltransaksi,pendapatan.jenisakun,pendapatan.kodesaldo,jumlah FROM pendapatan 
			INNER JOIN akun ON pendapatan.jenisakun=akun.kodeakun
			INNER JOIN saldo ON pendapatan.kodesaldo=saldo.kodesaldo WHERE kodetransaksi='$kode';");
	}

	function simpandata(){   
		
		$kda = $this->input->post('kdtran', TRUE);
		$tgl = $this->input->post('tglpend', TRUE);
		$jn = $this->input->post('cbakun', TRUE);
		$jm = $this->input->post('jumlah', TRUE);

		$kds = $this->input->post('kdsal', TRUE);
		$jmsaldo = $this->input->post('sda', TRUE);

		$ab= $jmsaldo+$jm;

		$a = $this->db->query("update saldo set saldoakhir='$ab' where kodesaldo='$kds'");
		$b = $this->db->query("insert into pendapatan values('$kda','$tgl','$jn','$kds','$jm')");
		return $a; return $b;
	} 	
	function updatedata(){
		$kda = $this->input->post('kdtran', TRUE);
		$tgl = $this->input->post('tglpend', TRUE);
		$jn = $this->input->post('cbakun', TRUE);
		$jm = $this->input->post('jumlah', TRUE);

		$kds = $this->input->post('kdsal', TRUE);

		$a = $this->db->query("update saldo,pendapatan set saldo.saldoakhir=(saldo.saldoakhir-pendapatan.jumlah+'$jm') where saldo.kodesaldo=pendapatan.kodesaldo");
		$b = $this->db->query("update pendapatan set jenisakun='$jn',kodesaldo='$kds',jumlah='$jm' where kodetransaksi='$kda'");
		return $a;
		return $b;

	}
	function hapusdata($kode){
		$kds = $this->input->post('kdsal', TRUE);
		$jmsaldo = $this->input->post('sda', TRUE);

		$ab= $jmsaldo-$jm;

		$a = $this->db->query("UPDATE saldo,pendapatan SET saldo.saldoakhir=saldo.saldoakhir-pendapatan.jumlah WHERE saldo.kodesaldo=pendapatan.kodesaldo;");

		$b = $this->db->query("delete from pendapatan where kodetransaksi='$kode'");
		return $a; return $b;
	}

}
?>