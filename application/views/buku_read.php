<a href="<?php echo site_url('buku/insert');?>" class="btn btn-primary" >Tambah data</a>
<a href="<?php echo site_url('chart/pie');?>" class="btn btn-primary">Lihat Chart Pie</a>
<a href="<?php echo site_url('chart/column');?>" class="btn btn-primary">Lihat Chart Column</a>
<a href="<?php echo site_url('chart/line');?>" class="btn btn-primary">Lihat Chart Line</a>
<br /><br />
<table class="table table-striped" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>Kategori Buku</th>
			<th>Judul</th>
			<th>Cover</th>
			<th>Stok Tersedia</th>
			<th>Jumlah Stok</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_buku as $buku):?>
		<tr>
			<td><?php echo $buku['nama_kategori_buku'];?></td>
			<td><?php echo $buku['judul'];?></td>
			<td><img src="<?= base_url('upload_folder/'.$buku['cover']) ?>" width="100px" height="100px"></td>
			<td><?php if($buku['stok_tersedia'] == "1"){
					echo "Stok Tersedia";
				}
				else{
					echo "Stok Tidak Tersedia";}?> </td></td>
			<td><?php echo ($buku['jumlah_stok']);?></td>
			<td>
				<a href="<?php echo site_url('buku/update/'.$buku['id']);?>" class="btn btn-warning">Ubah</a>

				<a href="<?php echo site_url('buku/upload/'.$buku['id']);?>" class="btn btn-primary">
				upload
				</a>
				
				<a href="<?php echo site_url('buku/delete/'.$buku['id']);?>" class="btn btn-danger"onclick="return confirm('Yakin Hapus?')">
				Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>
