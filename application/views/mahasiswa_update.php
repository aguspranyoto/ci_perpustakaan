<!--$data_mahasiswa_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('mahasiswa/update_submit/'.$data_mahasiswa_single['nim']);?>">
	<table class="table table-striped">
		<tr>
			<td>NIM</td>
			<!--$data_mahasiswa_single['nama'] : menampilkan data mahasiswa yang dipilih dari database -->
			<td><input class="form-control" type="text" name="nim" value="<?php echo $data_mahasiswa_single['nim'];?>" required=""></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<!--$data_mahasiswa_single['nama'] : menampilkan data mahasiswa yang dipilih dari database -->
			<td>
				<select name="fakultas_id" class="form-control">
				<?php foreach($data_fakultas as $fakultas):?>
					<?php if($fakultas['id'] == $data_mahasiswa_single['fakultas_id']):?>
					<option value="<?php echo $fakultas['id'];?>" selected><?php echo $fakultas['nama'];?></option>
					<?php else:?>
					<option value="<?php echo $fakultas['id'];?>"><?php echo $fakultas['nama'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama mahasiswa</td>
			<!--$data_mahasiswa_single['nama'] : menampilkan data mahasiswa yang dipilih dari database -->
			<td><input class="form-control" type="text" name="nama" value="<?php echo $data_mahasiswa_single['nama'];?>" required=""></td>
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