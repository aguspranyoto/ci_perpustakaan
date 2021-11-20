
<form method="post" action="<?php echo site_url('mahasiswa/insert_submit/');?>" >
	<table class="table table-striped">
		<tr>
			<td>Fakultas</td>
			<!--$data_mahasiswa_single['nama'] : menampilkan data mahasiswa yang dipilih dari database -->
			<td>
				<select name="fakultas_id" class="form-control">
				<?php foreach($data_fakultas as $fakultas):?>
				<option value="<?php echo $fakultas['id'];?>">
					<?php echo $fakultas['nama'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>NIM</td>
			<td><input class="form-control" type="text" name="nim" value="" required=""></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input class="form-control" type="text" name="nama" value="" required=""></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
			<label class="form-check-label"><input type="radio" name="gender" value="Pria" > Pria</label><br>
    		<label class="form-check-label"><input type="radio" name="gender" value="Wanita" > Wanita</label>
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