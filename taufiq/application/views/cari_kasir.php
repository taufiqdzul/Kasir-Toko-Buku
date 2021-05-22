<tbody>
	<?php
	foreach($data as $row){
		?>
		<tr>
			<td style="border-color:#333;"><?php echo $row['id_kasir'] ?></td>
			<td style="border-color:#333;"><?php echo $row['nama'] ?></td>
			<td style="border-color:#333;"><?php echo $row['alamat'] ?></td>
			<td style="border-color:#333;"><?php echo $row['telepon'] ?></td>
			<td style="border-color:#333;"><?php echo $row['status'] ?></td>
			<td style="border-color:#333;"><?php echo $row['password'] ?></td>
			<td style="border-color:#333;">
				<div class="btn-group">
					<div class="btn-group">
						<a href="<?php echo base_url()."index.php/AdminController/admin_edit_kasir/".$row['id_kasir'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Kasir"><i class="fa fa-edit" style="font-size:13pt;"></i></a>
					</div>
					<div class="btn-group">
						<?php if($row['status'] == "Pegawai Tidak Aktif"){ ?>
						<a href="<?php echo base_url()."index.php/CrudController/admin_aktif_kasir/".$row['id_kasir'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Aktifkan Kasir"><i class="fa fa-check" style="font-size:13pt;"></i></a>
						<?php } else{ ?>
						<a href="<?php echo base_url()."index.php/CrudController/admin_tidak_aktif_kasir/".$row['id_kasir'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Non Aktifkan Kasir"><i class="fa fa-ban" style="font-size:13pt;"></i></a>
						<?php } ?>
					</div>
					<div class="btn-group">
						<a onclick="return confirm('Apakah Anda ingin menghapusnya?')" href="<?php echo base_url()."index.php/CrudController/admin_delete_kasir/".$row['id_kasir'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Kasir"><i class="fa fa-trash-o" style="font-size:13pt;"></i></button></a>
					</div>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</tbody>