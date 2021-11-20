
<!--$data_kategori_buku_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('kategori_buku/update_submit/'.$data_kategori_buku_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama Kategori</td>
			<!--$data_kategori_buku_single['nama'] : menampilkan data kategori_buku yang dipilih dari database -->
			<td><input type="text" name="nama" value="<?php echo $data_kategori_buku_single['nama'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
