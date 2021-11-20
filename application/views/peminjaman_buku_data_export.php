<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=Peminjaman_buku.xls" );
?>

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Tanggal</th>
			<th>Judul</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_peminjaman_buku as $peminjaman_buku):?>
		<tr>
			<td><?php echo $peminjaman_buku['tanggal_pinjam_peminjaman'];?></td>
			<td><?php echo $peminjaman_buku['judul_peminjaman'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>