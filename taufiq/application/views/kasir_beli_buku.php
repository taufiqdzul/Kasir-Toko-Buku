<html>
<body>
	<script type="text/javascript">
		function showResult(){
			var nama = document.getElementById("nama").value;
			if (window.XMLHttpRequest)
			{

				xmlhttp=new XMLHttpRequest();
			}

			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("cari").innerHTML=xmlhttp.responseText;
				}
			}
			if (nama.length==0)
			{
				var nama = "kosong";
			}

			xmlhttp.open("GET","<?php echo base_url()."index.php/KasirController/search_beli_buku/";?>"+nama,true);
			xmlhttp.send();
		}
	</script>
	<div class="col-md-12">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<div class="row">
					<div class="col-md-4">
						<h1>
							<strong>Beli Buku</strong>
						</h1>
					</div>
					<div class="col-md-1  col-md-offset-4" style="padding-top:15px;">
						<button data-toggle="modal" data-target="#kasir_data_cart" class="btn btn-default" style="border-color:#FFCC29; padding-"><i class="fa fa-shopping-cart"></i> Dipilih (<?php echo $jumlah_beli; ?>)</button>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<div class="input-group" style="padding-top:15px;">
								<div class="input-group-addon" style="background-color:#FFCC29; border-color:#FFCC29;"><i class="fa fa-search"></i></div>
								<input class="form-control frm" onkeyup="showResult()" id="nama" name="input" placeholder="cari berdasarkan judul">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body" id="cari">
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
			<?php include("kasir_data_cart.php"); ?>
		</div>
	</div>
</body>
</html>