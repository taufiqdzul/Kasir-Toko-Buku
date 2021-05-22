<html>
<body>
	<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<strong>Bon Pembelian Buku</strong>
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
								<?php foreach($data_bon as $row){ ?>
									<tr>
										<td style="border-color:#333;"><?php echo $row['qty'] ?></td>
										<td style="border-color:#333;"><?php echo $row['id'] ?></td>
										<td style="border-color:#333;"><?php echo $row['name'] ?></td>
										<td style="border-color:#333;"><?php echo "Rp ".number_format($row['price']).".00"; ?></td>
										<td style="border-color:#333;"><?php echo "Rp ".number_format($row['subtotal']).".00" ?></td>
									</tr>
										<?php $total = $this->cart->total(); ?>
								<?php } ?>
									<tr class="success">
										<th style="border-color:#333;" colspan="4">Total</th>
										<th style="border-color:#333;"><?php echo "Rp ".number_format($total).".00" ?></th>
									</tr>
									<tr class="success">
										<th style="border-color:#333;" colspan="4">Uang Pembayaran</th>
										<th style="border-color:#333;"><?php echo "Rp ".number_format($pembayaran).".00" ?></th>
									</tr>
									<?php
										$kembalian = $pembayaran-$total;
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
	<script type="text/javascript">
		window.onload=function(){
			window.print();
		}
	</script>
</body>
</html>