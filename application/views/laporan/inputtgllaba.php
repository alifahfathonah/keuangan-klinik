<form method="POST" action="<?php echo site_url('Laporan/lap_laba') ?>" target="_blank">
	<table >
	<tr>
			<th>Bulan Awal</th>
			<td width="65%">
				<div class="input-group date col-sm-8">
					<!-- <input type="date" class="form-control" name="blnawal" placeholder="mm-dd-yyyy" required> -->
					<select name="blnawal" class="form-control">
						<option value="00">BULAN</option>
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<th>Bulan Akhir</th>
			<td height="50" width="75%">
				<div class="input-group date col-sm-8">
					<!-- <input type="date" class="form-control" name="blnakhir" placeholder="mm-dd-yyyy" required> -->
					<select name="blnakhir" class="form-control">
						<option value="00">BULAN</option>
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</div>
			</td>
		</tr>
	<tr>
		<td>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>Cetak</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Tutup</button>
			</div>
		</td>
	</tr>
	</table>
</form>
<form method="POST" action="<?php echo site_url('laporan/lap_laba1') ?>" target="_blank">
	<h2 class="modal-title" id="myModalLabel">PERIODE PER-TAHUN</h2>
	<table>
		<tr>
			<th>Tahun Awal</th>
			<td width="65%">
				<div class="input-group date col-sm-8">
				<select name="thnawal" class="form-control">
					<option value="">-PILIH-</option>
					<?php
					for($i = 1999; $i < 2030; $i++){
						echo "<option value='$i'>$i</option>";
					}
					?>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<th>Tahun Akhir</th>
		<td height="50" width="75%">
			<div class="input-group date col-sm-8">
				<select name="thnakhir" class="form-control">
					<option value="">-PILIH-</option>
					<?php
					for($i = 1999; $i < 2030; $i++){
						echo "<option value='$i'>$i</option>";
					}
					?>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>

			<button type="submit" class="btn btn-primary" ><i class="fa fa-print"></i>Cetak</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Tutup</button>
		</td>
	</tr>
</table>
</form>