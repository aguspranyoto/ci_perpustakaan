
<a href="<?php echo site_url('peminjaman/insert');?>" class="btn btn-primary">Tambah Data</a>
<br /><br />

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Mahasiswa</th>
			<th>Tanggal Pinjam</th>
			<th>Status Pengembalian</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_peminjaman as $peminjaman):?>
		<tr>
			<td><?php echo $peminjaman['nama_mahasiswa'];?></td>
			<td><?php echo $peminjaman['tanggal_pinjam'];?></td>
			<td><?php if($peminjaman['status_pengembalian'] == "0"){
					echo "Belum Dikembalikan";
				}
				else{
					echo "Sudah Dikembalikan";}?> 
			</td>
			<td>
				<a href="<?php echo site_url('peminjaman/update/'.$peminjaman['id']);?>" class="btn btn-warning">
				Ubah
				</a>
				
				<a href="<?php echo site_url('peminjaman/delete/'.$peminjaman['id']);?>"onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">
				Hapus
				</a>
			</td>
		</tr>

		<?php endforeach?>	

	</tbody>
</table>