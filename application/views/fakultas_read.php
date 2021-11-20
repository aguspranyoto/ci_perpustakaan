
<!--link tambah data-->
<a href="<?php echo site_url('fakultas/insert');?>" class="btn btn-primary">Tambah Data</a>
<br /><br />

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Fakultas</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data fakultas-->
		<?php foreach($data_fakultas as $fakultas):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $fakultas['nama'];?></td>
			<td>
				<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('fakultas/update/'.$fakultas['id']);?>" class="btn btn-warning">
				Ubah
				</a>

				<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('fakultas/delete/'.$fakultas['id']);?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
				Hapus
				</a>
				
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

</body>
</html>