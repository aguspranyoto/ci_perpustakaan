<form method="post" action="<?php echo site_url('user/insert_submit/');?>" >
	<table class="table table-striped">
		<tr>
			<td>Username</td>
			<td><input class="form-control" type="text" name="username" value="" required=""></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input class="form-control" type="text" name="nama" value="" required=""></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input class="form-control" type="text" name="password" value="" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
