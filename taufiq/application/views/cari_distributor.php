<tbody>
	<?php
	foreach($data as $row){
		?>
		<tr>
			<td style="border-color:#333;"><?php echo $row['id_distributor'] ?></td>
			<td style="border-color:#333;"><?php echo $row['nama_distributor'] ?></td>
			<td style="border-color:#333;"><?php echo $row['alamat'] ?></td>
			<td style="border-color:#333;"><?php echo $row['telepon'] ?></td>
			<td style="border-color:#333;">
				<div class="btn-group">
					<div class="btn-group">
						<a href="<?php echo base_url()."index.php/AdminController/admin_edit_distributor/".$row['id_distributor'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Distributor"><i class="fa fa-edit" style="font-size:13pt;"></i></a>
					</div>
					<div class="btn-group">
						<a onclick="return confirm('Apakah Anda ingin menghapusnya?')" href="<?php echo base_url()."index.php/CrudController/admin_delete_distributor/".$row['id_distributor'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Distributor"><i class="fa fa-trash-o" style="font-size:13pt;"></i></button></a>
					</div>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</tbody>