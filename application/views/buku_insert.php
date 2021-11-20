<form method="post" action="<?php echo site_url('buku/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>Kategori Buku</td>
			<!--$data_buku_single['judul'] : menampilkan data buku yang dipilih dari database -->
			<td>
				<select name="kategori_buku_id" class="form-control">
				<?php foreach($data_kategori_buku as $kategori_buku):?>
				<option value="<?php echo $kategori_buku['id'];?>">
					<?php echo $kategori_buku['nama'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Judul</td>
			<td><input type="text" name="judul" value="" required="" class="form-control"></td>
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
			<td><input type="text" name="jumlah_stok" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
		
	</table>
</form>
