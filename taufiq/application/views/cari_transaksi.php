<tbody>
	<?php
	foreach($data_transaksi as $row){
		?>
		<tr>
			<td style="border-color:#333;"><?php echo $row['tanggal'] ?></td>
			<td style="border-color:#333;"><?php echo $row['nama'] ?></td>
			<td style="border-color:#333;"><?php echo "Rp ".number_format($row['total_transaksi']).".00" ?></td>
			<td style="border-color:#333;">
				<?php echo "Rp ".number_format($row['pembayaran']).".00" ?>
			</td>
			<?php
			$kembalian = $row['pembayaran']-$row['total_transaksi'];		
			?>
			<td style="border-color:#333;"><?php echo "Rp ".number_format($kembalian).".00" ?></td>
			<td style="border-color:#333;">
				<a href="<?php echo base_url()."index.php/AdminController/admin_detail_transaksi/".$row['id_transaksi']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Transaksi"><i class="fa fa-eye"></i></a>
			</td>
		</tr>
		<?php
	}
	?>
</tbody>