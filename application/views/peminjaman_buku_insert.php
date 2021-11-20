<form method="post" action="<?php echo site_url('peminjaman_buku/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>Peminjaman</td>
			<!--$data_peminjaman_buku_single['nama'] : menampilkan data peminjaman_buku yang dipilih dari database -->
			<td>
				<select name="peminjaman_id" class="form-control">
				<?php foreach($data_peminjaman as $peminjaman):?>
				<option value="<?php echo $peminjaman['id'];?>">
					<?php echo $peminjaman['tanggal_pinjam'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Buku</td>
			<!--$data_peminjaman_buku_single['nama'] : menampilkan data peminjaman_buku yang dipilih dari database -->
			<td>
				<select name="buku_id" class="form-control">
				<?php foreach($data_buku as $buku):?>
				<option value="<?php echo $buku['id'];?>">
					<?php echo $buku['judul'];?>
				</option>
				<?php endforeach;?>
				</select>
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