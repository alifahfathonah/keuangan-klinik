<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Modellaporan extends CI_Model{
	function lap_pendapatan($tgl1,$tgl2){
		return $this->db->query("SELECT tgltransaksi,namaakun,jumlah FROM pendapatan 
			INNER JOIN akun ON pendapatan.jenisakun=akun.kodeakun WHERE MONTH(tgltransaksi) BETWEEN '$tgl1' AND '$tgl2' GROUP BY kodetransaksi;");
	}
	function lap_pendapatanrek($tgl1,$tgl2){
		return $this->db->query("SELECT tgltransaksi,namaakun,jumlah FROM pendapatan 
			INNER JOIN akun ON pendapatan.jenisakun=akun.kodeakun WHERE DATE(tgltransaksi) BETWEEN '$tgl1' AND '$tgl2' GROUP BY kodetransaksi;");
	}
	function lap_pendapatan1($tgl1,$tgl2){
		return $this->db->query("SELECT tgltransaksi,SUM(pendapatan.jumlah) as jumlah FROM pendapatan
			INNER JOIN akun ON pendapatan.jenisakun=akun.kodeakun WHERE YEAR(tgltransaksi) BETWEEN '$tgl1' AND '$tgl2' GROUP BY MONTH(tgltransaksi);");
	}

	function lap_pengeluaran($tgl1,$tgl2){
		return $this->db->query("SELECT tglkeluar,namaakun,jumlah FROM pengeluaran 
			INNER JOIN akun ON pengeluaran.jenisakun=akun.kodeakun WHERE MONTH(tglkeluar) BETWEEN '$tgl1' AND '$tgl2' GROUP BY kodetransaksikeluar;");
	}
	function lap_pengeluaranrek($tgl1,$tgl2){
		return $this->db->query("SELECT tglkeluar,namaakun,jumlah FROM pengeluaran 
			INNER JOIN akun ON pengeluaran.jenisakun=akun.kodeakun WHERE DATE(tglkeluar) BETWEEN '$tgl1' AND '$tgl2' GROUP BY kodetransaksikeluar;");
	}
	function lap_pengeluaran1($tgl1,$tgl2){
		return $this->db->query("SELECT tglkeluar,SUM(pengeluaran.jumlah) as jumlah FROM pengeluaran 
			INNER JOIN akun ON pengeluaran.jenisakun=akun.kodeakun WHERE YEAR(tglkeluar) BETWEEN '$tgl1' AND '$tgl2' GROUP BY MONTH(tglkeluar);");


		
	}
	function lap_labarugi ($tgl1,$tgl2){
		return $this->db->query("SELECT tglkeluar,tgltransaksi,namaakun,pendapatan.jumlah as TOTALPENDAPATAN,pengeluaran.jumlah AS TOTALPENGELUARAN FROM pendapatan 
			LEFT JOIN pengeluaran ON pendapatan.kodetransaksi=pengeluaran.kodetransaksikeluar 
			JOIN akun ON pendapatan.jenisakun=akun.kodeakun WHERE MONTH(tgltransaksi) BETWEEN '$tgl1' AND '$tgl2' ORDER BY kodetransaksi;");
	}


	function lap_labarugi1 ($tgl1,$tgl2){
		return $this->db->query("SELECT tglkeluar,tgltransaksi,namaakun,pendapatan.jumlah as TOTALPENDAPATAN,pengeluaran.jumlah AS TOTALPENGELUARAN FROM pendapatan 
			LEFT JOIN pengeluaran ON pendapatan.kodetransaksi=pengeluaran.kodetransaksikeluar 
			JOIN akun ON pendapatan.jenisakun=akun.kodeakun WHERE YEAR(tgltransaksi) BETWEEN '$tgl1' AND '$tgl2' ORDER BY kodetransaksi;");
	}
	function lap_saldo($tgl1,$tgl2){
		return $this->db->query("SELECT tglkeluar,tgltransaksi,namaakun,pendapatan.jumlah AS TOTPEN,pengeluaran.jumlah AS TOTPENG,saldo.saldoakhir FROM pendapatan 
			LEFT JOIN pengeluaran ON pendapatan.kodetransaksi=pengeluaran.kodetransaksikeluar
			JOIN akun ON pendapatan.jenisakun=akun.kodeakun
			JOIN saldo ON pendapatan.kodesaldo=saldo.kodesaldo
			WHERE DATE (tgltransaksi) BETWEEN '$tgl1' AND '$tgl2' ORDER BY kodetransaksi;");
	}
	function lap_user(){
		return $this->db->query("select * from user");
	}
	function lap_akun(){
		return $this->db->query("select * from akun");
	}
}		
?>