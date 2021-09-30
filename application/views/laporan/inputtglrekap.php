<form method="POST" action="<?php echo site_url('Laporan/lap_rekap') ?>" target="_blank">
	<table >
		<tr>
			<th colspan="7">Category</th>
			<td colspan="2" height="50" width="65%">
				<div class="input-group date col-sm-8">
					<select class="form-control" name="ctg">
						<option>-PILIH-</option>
						<option value="M">PENDAPATAN</option>
						<option value="K">PENGELUARAN</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<th colspan="7">Tanggal Awal</th>
			<td colspan="2" width="65%">
				<div class="input-group date col-sm-8">
					<input type="date" class="form-control" name="tglawal" placeholder="mm-dd-yyyy" required>
				</div>
			</td>
		</tr>
		<tr>
			<th colspan="7">Tanggal Akhir</th>
			<td colspan="2" height="50" width="65%">
				<div class="input-group date col-sm-8">
					<input type="date" class="form-control" name="tglakhir" placeholder="mm-dd-yyyy" required>
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