<!--$data_user_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('user/update_submit/'.$data_user_single['id']);?>">
	<table class="table table-striped">
		<tr>
			<td>Username</td>
			<!--$data_user_single['nama'] : menampilkan data user yang dipilih dari database -->
			<td><input class="form-control" type="text" name="username" value="<?php echo $data_user_single['username'];?>" required=""></td>
		</tr>
		<tr>
			<td>Nama</td>
			<!--$data_user_single['nama'] : menampilkan data user yang dipilih dari database -->
			<td><input class="form-control" type="text" name="nama" value="<?php echo $data_user_single['nama'];?>" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
	
</form>
