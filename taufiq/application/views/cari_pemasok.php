<tbody>
	<?php
	foreach($data as $row){
		?>
		<tr>
			<td style="border-color:#333;"><?php echo $row['nama_distributor'] ?></td>
			<td style="border-color:#333;"><?php echo $row['judul'] ?></td>
			<td style="border-color:#333;"><?php echo $row['jumlah'] ?></td>
			<td style="border-color:#333;"><?php echo $row['tanggal'] ?></td>
		</tr>
		<?php
	}
	?>
</tbody>