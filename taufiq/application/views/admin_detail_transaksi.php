<html>
<body>
	<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<a href="<?php echo base_url()."index.php/AdminController/admin_data_transaksi" ?>" data-toggle="tooltip" data-placement="left" title="Menu Transaksi"><strong><i class="fa fa-chevron-left"></i></strong></a>
					<strong>Detail Transaksi</strong>
				</h1>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-hover table-responsive">
								<thead>
									<tr>
										<th style="border-color:#333;">Jumlah</th>
										<th style="border-color:#333;">ID Buku</th>
										<th style="border-color:#333;">Judul Buku</th>
										<th style="border-color:#333;">Harga Satuan</th>
										<th style="border-color:#333;">Subtotal</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($data as $row){ ?>
									<tr>
										<td style="border-color:#333;"><?php echo $row['jumlah'] ?></td>
										<td style="border-color:#333;"><?php echo $row['id_buku'] ?></td>
										<td style="border-color:#333;"><?php echo $row['judul'] ?></td>
										<?php
											$harga_jual_ppn = $row['harga_jual']*$row['ppn']/100;
											$harga_jual_ppn_2 = $row['harga_jual']+$harga_jual_ppn;
											$harga_jual_diskon = $harga_jual_ppn_2*$row['diskon']/100;
											$harga_jual_fix = $harga_jual_ppn_2-$harga_jual_diskon;
										?>
										<td style="border-color:#333;"><?php echo "Rp ".number_format($harga_jual_fix).".00"; ?></td>
										<td style="border-color:#333;"><?php echo "Rp ".number_format($row['total']).".00" ?></td>
									</tr>
								<?php } ?>
									<tr class="success">
										<th style="border-color:#333;" colspan="4">Total</th>
										<th style="border-color:#333;"><?php echo "Rp ".number_format($total_bayar).".00" ?></th>
									</tr>
									<tr class="success">
										<th style="border-color:#333;" colspan="4">Uang Pembayaran</th>
										<th style="border-color:#333;"><?php echo "Rp ".number_format($pembayaran).".00" ?></th>
									</tr>
									<?php
										$kembalian = $pembayaran-$total_bayar;
									?>
									<tr class="success">
										<th style="border-color:#333;" colspan="4">Uang Kembalian</th>
										<th style="border-color:#333;"><?php echo "Rp ".number_format($kembalian).".00" ?></th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>