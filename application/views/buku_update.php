
<!--$data_buku_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('buku/update_submit/'.$data_buku_single['id']);?>"  enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Kategori Buku</td>
			<!--$data_buku_single['judul'] : menampilkan data buku yang dipilih dari database -->
			<td>
				<select name="kategori_buku_id" class="form-control">
				<?php foreach($data_kategori_buku as $kategori_buku):?>
					<?php if($kategori_buku['id'] == $data_buku_single['kategori_buku_id']):?>
					<option value="<?php echo $kategori_buku['id'];?>" selected><?php echo $kategori_buku['nama'];?></option>
					<?php else:?>
					<option value="<?php echo $kategori_buku['id'];?>"><?php echo $kategori_buku['nama'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<!--$data_buku_single['judul'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="judul" value="<?php echo $data_buku_single['judul'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Stok Tersedia</td>
		<td>
		<label class="form-check-label"><input type="checkbox" name="stok_tersedia" value="0" >Stok Tidak tersedia</label><br>
        <label class="form-check-label"><input type="checkbox" name="stok_tersedia" value="1" >Stok Tersedia</label><br>
		</td>
		</tr>
		<tr>
			<td>Jumlah Stok</td>
			<!--$data_buku_single['judul'] : menampilkan data buku yang dipilih dari database -->
			<td><input type="text" name="jumlah_stok" value="<?php echo $data_buku_single['jumlah_stok'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
	
</form>

</body>
</html>