
<!--$data_peminjaman_buku_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('peminjaman_buku/update_submit/'.$data_peminjaman_buku_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Tanggal Peminjaman</td>
			<!--$data_peminjaman_single['judul'] : menampilkan data peminjaman yang dipilih dari database -->
			<td>
				<select class="form-control" name="peminjaman_id">
				<?php foreach($data_peminjaman as $peminjaman):?>
					<?php if($peminjaman['id'] == $data_peminjaman_buku_single['peminjaman_id']):?>
					<option value="<?php echo $peminjaman['id'];?>" selected><?php echo $peminjaman['tanggal_pinjam'];?></option>
					<?php else:?>
					<option value="<?php echo $peminjaman['id'];?>"><?php echo $peminjaman['tanggal_pinjam'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Judul Buku</td>
			<!--$data_peminjaman_single['judul'] : menampilkan data peminjaman yang dipilih dari database -->
			<td>
				<select class="form-control" name="buku_id">
				<?php foreach($data_buku as $buku):?>
					<?php if($buku['id'] == $data_peminjaman_buku_single['buku_id']):?>
					<option value="<?php echo $buku['id'];?>" selected><?php echo $buku['judul'];?></option>
					<?php else:?>
					<option value="<?php echo $buku['id'];?>"><?php echo $buku['judul'];?></option>
					<?php endif;?>
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