
<!--$data_fakultas_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('fakultas/update_submit/'.$data_fakultas_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Nama Fakultas</td>
			<!--$data_fakultas_single['nama'] : menampilkan data fakultas yang dipilih dari database -->
			<td><input type="text" name="nama" value="<?php echo $data_fakultas_single['nama'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
