
<a href="<?php echo site_url('user/insert');?>"  class="btn btn-primary">Tambah Data</a>
<br /><br />

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Username</th>
			<th>Nama</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_user as $user):?>
		<tr>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['nama'];?></td>
			<td>
				<a href="<?php echo site_url('user/update/'.$user['id']);?>" class="btn btn-warning">
				Ubah
				</a>
                <a href="<?php echo site_url('user/reset/'.$user['id']);?>" class="btn btn-primary">
				Reset Password
				</a>
				<a href="<?php echo site_url('user/delete/'.$user['id']);?>"onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">
				Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>