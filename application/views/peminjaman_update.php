<!--$data_peminjaman_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('peminjaman/update_submit/'.$data_peminjaman_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama Mahasiswa</td>
			<!--$data_peminjaman_single['judul'] : menampilkan data peminjaman yang dipilih dari database -->
			<td>
				<select class="form-control" name="nim">
				<?php foreach($data_mahasiswa as $mahasiswa):?>
					<?php if($mahasiswa['nim'] == $data_peminjaman_single['nim']):?>
					<option value="<?php echo $mahasiswa['nim'];?>" selected><?php echo $mahasiswa['nama'];?></option>
					<?php else:?>
					<option value="<?php echo $mahasiswa['nim'];?>"><?php echo $mahasiswa['nama'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<!--$data_peminjaman_single['judul'] : menampilkan data peminjaman yang dipilih dari database -->
			<td><input class="form-control" type="date" name="tanggal_pinjam" value="<?php echo $data_peminjaman_single['tanggal_pinjam'];?>" required=""></td>
		</tr>
		<tr>
		<td>Status Pengembalian</td>
		<td>
		<label class="form-check-label"><input  type="checkbox" name="status_pengembalian" value="0">Belum Dikembalikan</label><br>
        <label class="form-check-label"><input  type="checkbox" name="status_pengembalian" value="1">Sudah Dikembalikan</label><br>
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