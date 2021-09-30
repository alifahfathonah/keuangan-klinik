<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="<?php echo base_url('asset/')?>dist/img/favicon.ico"/>
<head>
	<title>Laporan Rekapitulasi Pendapatan</title>
	<meta charset="utf-8">
</head>
<body onload="window.print()">
	<div id="laporan">
	   <table border="0" align="center" style="width: 900px;margin-top: 5px;border: none;margin-bottom: 0px;font-weight: bold;font-size: 16px">
	   	<tr>
	   		<td rowspan="3" align="center" style="width: 90px"><img src="<?php echo base_url('asset/')?>dist/img/favicon.ico ?>" height="80" width="70"></td>
	   		<td align="center">LAPORAN REKAPITULASI</td>
	   	</tr>
	   	<tr>
	   		<td align="center">KLINIK CEMPAKA INDAH</td>
	   	</tr>
	   	<tr>
	   		<td align="center"> PENDAPATAN PERIODE TAHUN</td>
	   	</tr>
	   	<tr>
	   		<td colspan="2" align="center" style="font-size: 12px;font-weight: italic;">Jl.S. Parman No.169, Ulak Karang Sel., Kec. Padang Utara, Kota Padang, Sumatera Barat 25392</td>
	   	</tr>
	   </table>
	   <br>
	   <center>Tanggal Input : <?php echo date("d M Y",strtotime($awal));?> s/d <?php echo date("d M Y",strtotime($akhir));?></center><br>
	   <table border="1" width="100%" align="center" style="margin-bottom: 10px;font-size: 14px">
	   	<thead>
	   		<tr></tr>
	   		<tr style="background-color: #808080; vertical-align: middle;height: 30px">
	   			<th style="width: 30px;">No</th>
	   			<th style="width: 130px;">Tanggal</th>
	   			<th style="width: 130px;">Nama Akun</th>
	   			<th style="width: 130px;">Jumlah</th>
  			
	   		</tr>
	   	
	   	</thead>
	   	<tbody>
	   		<?php 
	   			$no=0;
	   			$totsemua=0;
	   			foreach ($tampil->result_array() as $i) {
	   				$no++;
	   				
	   			$totsemua = $totsemua+$i['jumlah'];
	   			
	   		?>
	   		<tr>
	   			<td style="text-align: center;"><?php echo $no; ?></td>
	   			<td><?php echo date("d M Y",strtotime($i['tgltransaksi']));  ?></td>
	   			<td><?php echo $i['namaakun'] ?></td>
	   			<td align="right"><?php echo "Rp.".number_format($i['jumlah']) ?></td>
	   		</tr>
	   		<tr>
	   	<?php } ?>
	   	<tr>
	   		<td colspan="3" style="font-weight: bold;text-align: center;">Total Semua</td>
	   		<td align="right"><?php echo "Rp ". number_format($totsemua); ?></td>
	   	</tr>
	   	</tbody>	   	
	   </table>
	   <table align="center" style="width:990px;border:none;margin-top:5px;margin-bottom:20px;font-size:14px">
	   	
	   	<tr>
	   		<td align="right">Padang, <?php echo date('d-M-Y'); ?></td>
	   	</tr>
	   	<tr>
	   		<td align="right"></td>
	   	</tr>
	   	<tr>
	   		<td><br/><br/><br/><br/></td>
	   	</tr>
	   	<tr>
	   		<td align="right">(<?php echo $this->session->userdata('nama');?>)</td>
	   	</tr>
	   	<tr>
	   		<td align="center"></td>
	   	</tr>
	   </table>
	   <table align="center" style="width: 800px;border: none;margin-top: 5px;margin-bottom: 20px">
	   	<tr>
	   		<th><br><br></th>
	   	</tr>
	   	<tr>
	   		<th align="left"></th>
	   	</tr>
	   </table>
	</div>
</body>
</html>