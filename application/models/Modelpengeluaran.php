<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelpengeluaran extends CI_Model{

	function datapengeluaran(){
		return $this->db->query("SELECT kodetransaksikeluar,tglkeluar,namaakun,jumlah FROM pengeluaran INNER JOIN akun ON pengeluaran.jenisakun=akun.kodeakun;");
	}
	function data(){
		return $this->db->query("SELECT * from pengeluaran order by kodepengeluaran desc ");
	}
	function ambildata($kode)
	{
		return $this->db->query("SELECT kodetransaksikeluar,tglkeluar,pengeluaran.jenisakun,pengeluaran.kodesaldo,jumlah FROM pengeluaran 
			INNER JOIN akun ON pengeluaran.jenisakun=akun.kodeakun
			INNER JOIN saldo ON pengeluaran.kodesaldo=saldo.kodesaldo WHERE kodetransaksikeluar='$kode';");
	}

	function simpandata(){   
		
		$kda = $this->input->post('kdtran', TRUE);
		$tgl = $this->input->post('tglpend', TRUE);
		$jn = $this->input->post('cbakun', TRUE);
		$jm = $this->input->post('jumlah', TRUE);

		$kds = $this->input->post('kdsal', TRUE);
		$jmsaldo = $this->input->post('sda', TRUE);

		$ab= $jmsaldo-$jm;

		$a = $this->db->query("update saldo set saldoakhir='$ab' where kodesaldo='$kds'");
		$b = $this->db->query("insert into pengeluaran values('$kda','$tgl','$jn','$kds','$jm')");
		return $a; return $b;
	} 	
	function updatedata(){
		$kda = $this->input->post('kdtran', TRUE);
		$tgl = $this->input->post('tglpend', TRUE);
		$jn = $this->input->post('cbakun', TRUE);
		$jm = $this->input->post('jumlah', TRUE);

		$kds = $this->input->post('kdsal', TRUE);

		$a = $this->db->query("update saldo,pengeluaran set saldo.saldoakhir=(saldo.saldoakhir-pengeluaran.jumlah+'$jm') where saldo.kodesaldo=pengeluaran.kodesaldo");
		$b = $this->db->query("update pengeluaran set jenisakun='$jn',kodesaldo='$kds',jumlah='$jm' where kodetransaksikeluar='$kda'");
		return $a;
		return $b;

	}
	function hapusdata($kode){
		$kds = $this->input->post('kdsal', TRUE);
		$jmsaldo = $this->input->post('sda', TRUE);

		$ab= $jmsaldo-$jm;

		$a = $this->db->query("UPDATE saldo,pengeluaran SET saldo.saldoakhir=saldo.saldoakhir+pengeluaran.jumlah WHERE saldo.kodesaldo=pengeluaran.kodesaldo;");

		$b = $this->db->query("delete from pengeluaran where kodetransaksikeluar='$kode'");
		return $a; return $b;
	}

}
?>