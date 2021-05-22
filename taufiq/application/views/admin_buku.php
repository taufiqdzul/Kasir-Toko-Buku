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

			xmlhttp.open("GET","<?php echo base_url()."index.php/AdminController/search_buku/";?>"+nama,true);
			xmlhttp.send();
		}
	</script>
	<div class="col-md-12">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 style="font-size:20pt;">Data Buku</h1>
				<div class="row">
					<div class="col-md-4">
						<span>
							<a href="<?php echo base_url()."index.php/AdminController/admin_tambah_buku" ?>" class="btn btn-default" style="margin-bottom:10px; border-color:#FFCC29;"><i class="fa fa-plus"></i> Tambah Buku</a>
						</span>
						<span>
							<a href="<?php echo base_url()."index.php/AdminController/admin_lihat_pemasok" ?>" class="btn btn-default" style="margin-bottom:10px; border-color:#FFCC29;"><i class="fa fa-eye"></i> Data Pemasok</a>
						</span>
					</div>
					<div class="col-md-3 col-md-offset-5">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon" style="background-color:#FFCC29; border-color:#FFCC29;"><i class="fa fa-search"></i></div>
								<input class="form-control frm" onkeyup="showResult()" id="nama" name="input" placeholder="cari berdasarkan judul">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th style="border-color:#333;">ID Buku</th>
							<th style="border-color:#333;">NOISBN</th>
							<th style="border-color:#333;">Judul Buku</th>
							<th style="border-color:#333;">Tahun</th>
							<th style="border-color:#333;">Harga Jual</th>
							<th style="border-color:#333;">Stok</th>
							<th style="border-color:#333;">Action</th>
						</tr>
					</thead>
					<tbody id="cari">
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
				</table>
			</div>
		</div>
	</div>
</body>
</html>