<table id="table" class="table table-striped">
	<thead class="thead-dark">
		<tr>
            <th>No.</th>
			<th>Kategori Buku</th>
			<th>Judul</th>
			<th>Stok Tersedia</th>
            <th>Jumlah Stok</th>
            <th>Cover</th>    
		</tr>
	</thead>
	<tbody>	
	</tbody>
</table>

<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

<link href="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

<script type="text/javascript">
    var table;
    jQuery(document).ready(function() {
        table = $('#table').DataTable({ 
 
            "processing": true, 
            "serverSide": true,
            "lengthChange": false,
            "pageLength": 5,
            "order": [], 
            "ajax": {
                "url": "<?php echo site_url('buku_ajax/datatables')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    });
</script>