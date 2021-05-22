<div class="modal fade" id="kasir_data_cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 				<h4 class="modal-title" id="myModalLabel">Data Pembelian Buku</h4>
 			</div>
 			<form action="<?php echo base_url()."index.php/CrudController/kasir_aksi_cart_simpan" ?>" method="POST" id="attributeForm">
 				<div class="modal-body">
 					<div class="row">
 						<div class="col-md-12">
		 					<table class="table table-bordered table-hover table-responsive">
		 						<thead>
		 							<tr>
		 								<th style="border-color:#333;">ID Buku</th>
		 								<th style="border-color:#333;">Jumlah</th>
		 								<th style="border-color:#333;">Judul</th>
		 								<th style="border-color:#333;">Penerbit</th>
		 								<th style="border-color:#333;">Harga Satuan</th>
		 								<th style="border-color:#333;">Sub Total</th>
		 							</tr>
		 						</thead>
		 						<tbody>
		 								<?php 

										$i = 1;

										foreach ($this->cart->contents() as $items){ ?>

											<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

											<tr>
												<td style="border-color:#333;"><?php echo $items['id']; ?></td>

												<td style="border-color:#333;"><?php echo $items['qty']; ?></td>

												<td style="border-color:#333;"><?php echo $items['name']; ?></td>

												<td style="border-color:#333;"><?php echo $items['penerbit']; ?></td>

												<td style="border-color:#333;">Rp <?php echo $this->cart->format_number($items['price']); ?></td>

												<td style="border-color:#333;">Rp <?php echo $this->cart->format_number($items['subtotal']); ?></td>
											</tr>
											<?php $i++; ?>

										<?php } ?>
										<tr class="success">
											<th style="border-color:#333;" colspan="5"><strong>Total Bayar</strong></th>
											<th style="border-color:#333;"><input type="hidden" name="<?php $this->cart->format_number($this->cart->total()); ?>" maxlength="10" size="5" value="<?php echo $this->cart->format_number($this->cart->total()); ?>" />Rp <?php echo $this->cart->format_number($this->cart->total()); ?></th>
										</tr>
		 						</tbody>
		 					</table>
	 					</div>
					</div>
						<div class="input-group">
							<div class="input-group-addon">Rp</div>
							<input type="number" name="pembayaran" class="form-control" placeholder="masukkan uang pembayaran">
						</div>
 				</div>
 				<div class="modal-footer">
 					<?php if($i == "1"){ ?>
	 					<button class="btn btn-default" disabled>Cancel</button>
	 					<button class="btn btn-primary" disabled>Print</button>
	 				<?php }else{ ?>
	 					<a href="<?php echo base_url()."index.php/CrudController/kasir_aksi_cart_cancel" ?>" class="btn btn-default">Cancel</a>
	 					<button type="submit" class="btn btn-primary" onclick="return confirm('Lanjutkan?')">Print</button>
	 				<?php } ?>
 				</div>
 			</form>
 		</div>
 	</div>
 </div>
