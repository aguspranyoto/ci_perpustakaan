<form method="post" action="<?php echo site_url('peminjaman/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<!--$data_peminjaman_single['nama'] : menampilkan data peminjaman yang dipilih dari database -->
			<td>
				<select name="nim" class="form-control">
				<?php foreach($data_mahasiswa as $mahasiswa):?>
				<option value="<?php echo $mahasiswa['nim'];?>">
					<?php echo $mahasiswa['nama'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<td><input class="form-control" type="date" name="tanggal_pinjam" value="" required=""></td>
		</tr>
		<tr>
		<td>Status Pengembalian</td>
		<td>
		<label class="form-check-label"><input type="checkbox" name="status_pengembalian" value="0">Belum Dikembalikan</label><br>
        <label class="form-check-label"><input type="checkbox" name="status_pengembalian" value="1">Sudah Dikembalikan</label><br>
		</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</body>
</html>