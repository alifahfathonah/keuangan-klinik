<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="<?php echo base_url('asset/')?>dist/img/favicon.ico"/>
<head>
	<title>Laporan Laba & Rugi</title>
	<meta charset="utf-8">
</head>
<body onload="window.print()">
	<div id="laporan">
	   <table border="0" align="center" style="width: 900px;margin-top: 5px;border: none;margin-bottom: 0px;font-weight: bold;font-size: 16px">
	   	<tr>
	   		<td rowspan="3" align="center" style="width: 90px"><img src="<?php echo base_url('asset/')?>dist/img/favicon.ico ?>" height="80" width="70"></td>
	   		<td>LAPORAN LABA & RUGI</td>
	   	</tr>
	   	<tr>
	   		<td>KLINIK CEMPAKA INDAH</td>
	   	</tr>
	   	<tr>
	   		<td style="font-size: 12px;font-weight: italic;">Jl.S. Parman No.169, Ulak Karang Sel., Kec. Padang Utara, Kota Padang, Sumatera Barat 25392</td>
	   	</tr>
	   </table>
	   <center>Bulan Input : <?php
	   $date = date_create("01-".$awal."-2020");
	   echo date_format($date,"F");
	   echo "-";
	   $date = date_create("01-".$akhir."-0000");
	   echo date_format($date,"F");
	   ?></center><br>
	   <table border="1" width="100%" align="center" style="margin-bottom: 10px;font-size: 14px">
	   	<thead>
	   		<tr></tr>
	   		<tr style="background-color: #808080; vertical-align: middle;height: 30px">
	   			<th style="width: 30px;">No</th>
	   			<th style="width: 130px;">Tanggal Pendapatan</th>
	   			<th style="width: 130px;">Tanggal Keluar</th>
	   			<th style="width: 130px;">Pendapatan</th>
	   			<th style="width: 130px;">Pengeluaran</th>
  			
	   		</tr>
	   	
	   	</thead>
	   	<tbody>
	   		<?php 
	   			$no=0;
	   			$totsemua1=0;
	   			$totsemua2=0;
	   			foreach ($tampil->result_array() as $i) {
	   				$no++;
	   				
	   			$totsemua1 = $totsemua1+$i['TOTALPENDAPATAN'];
	   			$totsemua2 = $totsemua2+$i['TOTALPENGELUARAN'];

//Laba	   			
	   			if($totsemua1 > $totsemua2){
	   				$a = $totsemua1-$totsemua2;
	   			} else {
	   				$a = 0;
	   			}
//Rugi
	   			if($totsemua2 > $totsemua1){
	   				$b = $totsemua2 -$totsemua1;
	   			}else {
	   				$b = 0;
	   			}
	   			
	   		?>
	   		<tr>
	   			<td style="text-align: center;"><?php echo $no; ?></td>
	   			<td><?php echo date("d M Y",strtotime($i['tgltransaksi']));  ?></td>
	   			<td><?php echo date("d M Y",strtotime($i['tglkeluar']));  ?></td>
	   			<td align="right"><?php echo "Rp.".number_format($i['TOTALPENDAPATAN']) ?></td>
	   			<td align="right"><?php echo "Rp.".number_format($i['TOTALPENGELUARAN']) ?></td>
	   		</tr>
	   		<tr>
	   	<?php } ?>
	   	<tr>
	   		<td colspan="3" style="font-weight: bold;text-align: center;">Total Semua</td>
	   		<td align="right"><?php echo "Rp ". number_format($totsemua1); ?></td>
	   		<td align="right"><?php echo "Rp ". number_format($totsemua2); ?></td>
	   	</tr>
	   	
	   	</tbody>	   	
	   </table>
	   <table align="center" width="100%">
	   	<tr>
	   		<td style="font-weight: bold;text-align: left;">Laba :</td>
	   		<td><?php echo "Rp ". number_format($a); ?></td>
	   	</tr>
	   	<tr>
	   		<td style="font-weight: bold;text-align: left;">Rugi :</td>
	   		<td><?php echo "Rp ". number_format($b); ?></td>
	   	</tr>
	   	<tr>
	   		<td colspan="4" align="right">Padang, <?php echo date('d-M-Y'); ?></td>
	   	</tr>
	   	<tr>
	   		<td align="right"></td>
	   	</tr>
	   	<tr>
	   		<td><br/><br/><br/><br/></td>
	   	</tr>
	   	<tr>
	   		<td colspan="4" align="right">(<?php echo $this->session->userdata('nama');?>)</td>
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