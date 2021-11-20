
<a href="<?php echo site_url('mahasiswa/insert');?>" class="btn btn-primary">Tambah Data</a>
<br /><br />

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>NIM</th>
			<th>Nama Mahasiswa</th>
			<th>Nama Fakultas</th>
			<th>Gender</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_mahasiswa as $mahasiswa):?>
		<tr>
			<td><?php echo $mahasiswa['nim'];?></td>
			<td><?php echo $mahasiswa['nama'];?></td>
			<td><?php echo $mahasiswa['nama_fakultas'];?></td>
			<td><?php echo $mahasiswa['gender'];?></td>
			<td>
				<a href="<?php echo site_url('mahasiswa/update/'.$mahasiswa['nim']);?>" class="btn btn-warning">
				Ubah
				</a>
				
				<a href="<?php echo site_url('mahasiswa/delete/'.$mahasiswa['nim']);?>"onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">
				Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>