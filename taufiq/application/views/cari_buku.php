<tbody>
	<?php
	foreach($data as $row){
		?>
		<tr>
			<td style="border-color:#333;"><?php echo $row['id_buku'] ?></td>
			<td style="border-color:#333;"><?php echo $row['noisbn'] ?></td>
			<td style="border-color:#333;"><?php echo $row['judul'] ?></td>
			<td style="border-color:#333;"><?php echo $row['tahun'] ?></td>
			<td style="border-color:#333;">
				<?php
				$harga_jual_ppn = $row['harga_jual']*$row['ppn']/100;
				$harga_jual_ppn_2 = $row['harga_jual']+$harga_jual_ppn;
				$harga_jual_diskon = $harga_jual_ppn_2*$row['diskon']/100;
				$harga_jual_fix = $harga_jual_ppn_2-$harga_jual_diskon;
				?>
				<?php echo "Rp ".number_format($harga_jual_fix) ?>
			</td>
			<td style="border-color:#333;"><?php echo $row['stok'] ?></td>
			<td style="border-color:#333;">
				<div class="btn-group">
					<div class="btn-group">
						<a href="<?php echo base_url()."index.php/AdminController/admin_tambah_stok_buku/".$row['id_buku'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Stok"><i class="fa fa-plus" style="font-size:13pt;"></i></a>
					</div>
					<div class="btn-group">
						<a href="<?php echo base_url()."index.php/AdminController/admin_lihat_buku/".$row['id_buku'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Buku"><i class="fa fa-eye" style="font-size:13pt;"></i></a>
					</div>
					<div class="btn-group">
						<a onclick="return confirm('Apakah Anda ingin menghapusnya?')" href="<?php echo base_url()."index.php/CrudController/admin_delete_buku/".$row['id_buku'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Buku"><i class="fa fa-trash-o" style="font-size:13pt;"></i></button></a>
					</div>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</tbody>