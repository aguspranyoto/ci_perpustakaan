
<a href="<?php echo site_url('peminjaman_buku/insert');?>" class="btn btn-primary">Tambah Data</a>
<a href="<?php echo site_url('peminjaman_buku/data_export');?>" class="btn btn-primary">Export Data</a>
<br /><br />

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Tanggal</th>
			<th>Judul</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_peminjaman_buku as $peminjaman_buku):?>
		<tr>
			<td><?php echo $peminjaman_buku['tanggal_pinjam_peminjaman'];?></td>
			<td><?php echo $peminjaman_buku['judul_peminjaman'];?></td>
			<td>
				<a class="btn btn-warning"href="<?php echo site_url('peminjaman_buku/update/'.$peminjaman_buku['id']);?>">
				Ubah
				</a>
				
				<a class="btn btn-danger" href="<?php echo site_url('peminjaman_buku/delete/'.$peminjaman_buku['id']);?>"onclick="return confirm('Yakin Hapus?')">
				Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>