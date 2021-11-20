<!--link tambah data-->
<a href="<?php echo site_url('kategori_buku/insert');?>" class="btn btn-primary">Tambah Data</a>
<br /><br />

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Kategori Buku</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data kategori_buku-->
		<?php foreach($data_kategori_buku as $kategori_buku):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $kategori_buku['nama'];?></td>
			<td>
				<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('kategori_buku/update/'.$kategori_buku['id']);?>" class="btn btn-warning">
				Ubah
				</a>

				<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('kategori_buku/delete/'.$kategori_buku['id']);?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
				Hapus
				</a>
				
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

</body>
</html>