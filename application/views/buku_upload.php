<form method="post" action="<?php echo site_url('buku/upload_submit/'.$data_buku_single['id']);?>" enctype="multipart/form-data">
	<table>
		<tr>
			<td>File</td>
			<td>
				<input class="form-control" type="file" name="cover" size="20" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input class="btn btn-primary" type="submit" name="submit" value="Upload"></td>
		</tr>
	</table>
</form>

<?php if(!empty($response)):?>
	<?php echo $response;?>
<?php endif;?>

</body>
</html>