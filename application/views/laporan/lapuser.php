<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="<?php echo base_url('asset/')?>dist/img/favicon.ico"/>
<head>
	<title>Cetak Laporan Petugas</title>
	<meta charset="utf-8">
</head>
<body onload="window.print()">
	<div id="laporan">
	   <table border="0" align="center" style="width: 900px;margin-top: 5px;border: none;margin-bottom: 0px;font-weight: bold;font-size: 16px">
	   	<tr>
	   		<td rowspan="3" align="center" style="width: 90px"><img src="<?php echo base_url('asset/')?>dist/img/favicon.ico ?>" height="80" width="70"></td>
	   		<td>LAPORAN PETUGAS</td>
	   	</tr>
	   	<tr>
	   		<td>KLINIK CEMPAKA INDAH</td>
	   	</tr>
	   	<tr>
	   		<td colspan="2" style="font-size: 12px;font-weight: italic;">Jl.S. Parman No.169, Ulak Karang Sel., Kec. Padang Utara, Kota Padang, Sumatera Barat 25392</td>
	   	</tr>
	   </table>
	   <table border="1" width="100%" align="center" style="margin-bottom: 10px;font-size: 14px">
	   	<thead>
	   		<tr></tr>
	   		<tr style="background-color: #808080; vertical-align: middle;height: 30px">
	   			<th style="width: 30px;">No</th>
	   			<th style="width: 130px;">Usernanme</th>
	   			<th style="width: 130px;">Nama Lengkap</th>
	   			<th style="width: 130px;">Email</th>
	   			<th style="width: 130px;">No.Telp</th>
	   			<th style="width: 50px;">Foto</th>
	   			<th style="width: 130px;">Akses</th>

  			
	   		</tr>
	   	
	   	</thead>
	   	<tbody>
	   		<?php 
	   			$no=0;
	   			foreach ($tampil->result_array() as $i) {
	   				$no++;

	   			if($i['hakakses']=='1'){
	   				$kode = 'Pimpinan';
	   			}else{
	   				$kode = 'Adm.Keuangan';
	   			}
	   			
	   		?>
	   		<tr>
	   			<td style="text-align: center;"><?php echo $no; ?></td>
	   			<td><?php echo $i['username']; ?></td>
	   			<td><?php echo $i['namalengkap'] ?></td>
	   			<td><?php echo $i['email'] ?></td>
	   			<td><?php echo $i['notelp'] ?></td>
	   			<td><img width="50" height="60" src="<?php echo base_url('uploads/').$i['foto'] ?>"></td>
	   			<td align="center"><?php echo $kode ?></td>
	   		</tr>
	   		<tr>
	   	<?php } ?>
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