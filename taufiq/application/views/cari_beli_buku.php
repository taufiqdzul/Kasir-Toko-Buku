<div class="modal-body">
	<div class="row">
		<?php foreach($data_buku as $row){ ?>
		<div class="col-md-3">
			<div class="modal-content" style="margin-bottom:20px;">
				<div class="modal-header">
					<div class="row">
						<div class="col-md-8">
							<strong><i class="fa fa-book"></i> <?php echo $row['judul'] ?></strong>
						</div>
						<div class="col-md-4">
							<strong style="font-size:pt;">Stok: <?php echo $row['stok'] ?></strong>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4">Penulis</label>
							<div class="col-md-7"><?php echo $row['penulis'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Penerbit</label>
							<div class="col-md-7"><?php echo $row['penerbit'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Harga</label>
							<?php
							$harga_jual_ppn = $row['harga_jual']*$row['ppn']/100;
							$harga_jual_ppn_2 = $row['harga_jual']+$harga_jual_ppn;
							$harga_jual_diskon = $harga_jual_ppn_2*$row['diskon']/100;
							$harga_jual_fix = $harga_jual_ppn_2-$harga_jual_diskon;
							?>
							<div class="col-md-7">Rp <?php echo number_format($harga_jual_fix) ?>.00</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<form action="<?php echo base_url()."index.php/CrudController/kasir_simpan_cart" ?>" method="POST">
						<input type="hidden" name="id_buku" value="<?php echo $row['id_buku'] ?>">
						<input type="hidden" name="judul" value="<?php echo $row['judul'] ?>">
						<input type="hidden" name="penerbit" value="<?php echo $row['penerbit'] ?>">
						<input type="hidden" name="harga_jual" value="<?php echo $harga_jual_fix ?>">
						<button type="submit" class="btn btn-primary btn-sm">Pilih</button>
					</form>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php echo $this->session->flashdata('alert_pembayaran_kosong'); ?>
	<?php echo $this->session->flashdata('alert_pembayaran_kurang'); ?>
</div>