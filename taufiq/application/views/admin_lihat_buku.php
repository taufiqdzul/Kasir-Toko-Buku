<html>
<body>
	<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<a href="<?php echo base_url()."index.php/AdminController/admin_buku" ?>" data-toggle="tooltip" data-placement="left" title="Menu Buku"><strong><i class="fa fa-chevron-left"></i></strong></a>
					<strong>Detail Buku</strong>
					<?php
					foreach($data as $row){
						?>
						<a href="<?php echo base_url()."index.php/AdminController/admin_edit_buku/".$row['id_buku'] ?>" class="btn btn-default btn-lg col-md-offset-4" style="border-color:#FFCC29;"><i class="fa fa-edit"></i> Edit Buku</a>
					</h1>
				</div>
				<div class="modal-body col-md-offset-1">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4">ID Buku</label>
							<div class="col-md-8"><?php echo $row['id_buku'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Judul</label>
							<div class="col-md-8"><?php echo $row['judul'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">NOISBN</label>
							<div class="col-md-8"><?php echo $row['noisbn'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Penulis</label>
							<div class="col-md-8"><?php echo $row['penulis'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Penerbit</label>
							<div class="col-md-8"><?php echo $row['penerbit'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Tahun</label>
							<div class="col-md-8"><?php echo $row['tahun'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Stok</label>
							<div class="col-md-8"><?php echo $row['stok'] ?></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Harga Pokok</label>
							<div class="col-md-8">Rp <?php echo number_format($row['harga_pokok']); ?>.00</div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Harga Jual</label>
							<?php
								$harga_jual_ppn = $row['harga_jual']*$row['ppn']/100;
								$harga_jual_ppn_2 = $row['harga_jual']+$harga_jual_ppn;
								$harga_jual_diskon = $harga_jual_ppn_2*$row['diskon']/100;
								$harga_jual_fix = $harga_jual_ppn_2-$harga_jual_diskon;
							?>
							<div class="col-md-8">Rp <?php echo number_format($harga_jual_fix); ?>.00</div>
						</div>
						<div class="form-group">
							<label class="col-md-4">PPN</label>
							<div class="col-md-8"><?php echo $row['ppn'] ?>%</div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Diskon</label>
							<div class="col-md-8"><?php echo $row['diskon'] ?>%</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>