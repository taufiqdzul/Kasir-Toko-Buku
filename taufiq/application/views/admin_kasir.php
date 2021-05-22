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

			xmlhttp.open("GET","<?php echo base_url()."index.php/AdminController/search_kasir/";?>"+nama,true);
			xmlhttp.send();
		}
	</script>
	<div class="col-md-12">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 style="font-size:20pt;">Data Konsumen</h1>
				<div class="row">
					<div class="col-md-2 col-xs-2">
						<a href="<?php echo base_url()."index.php/AdminController/admin_tambah_kasir" ?>" class="btn btn-default" style="margin-bottom:10px; border-color:#FFCC29;"><i class="fa fa-plus"></i> Tambah Konsumen</a>
					</div>
					<div class="col-md-3 col-xs-5 col-md-offset-7 col-xs-offset-5">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon" style="background-color:#FFCC29; border-color:#FFCC29;"><i class="fa fa-search"></i></div>
								<input class="form-control frm" onkeyup="showResult()" id="nama" name="input" placeholder="cari berdasarkan nama">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th style="border-color:#333;">ID Konsumen/Username</th>
							<th style="border-color:#333;">Nama</th>
							<th style="border-color:#333;">Alamat</th>
							<th style="border-color:#333;">No. Telepon</th>
							<th style="border-color:#333;">Status</th>
							<th style="border-color:#333;">Password</th>
							<th style="border-color:#333;">Action</th>
						</tr>
					</thead>
					<tbody id="cari">
						<?php
						foreach($data as $row){
							?>
							<tr>
								<td style="border-color:#333;"><?php echo $row['id_kasir'] ?></td>
								<td style="border-color:#333;"><?php echo $row['nama'] ?></td>
								<td style="border-color:#333;"><?php echo $row['alamat'] ?></td>
								<td style="border-color:#333;"><?php echo $row['telepon'] ?></td>
								<td style="border-color:#333;"><?php echo $row['status'] ?></td>
								<td style="border-color:#333;"><?php echo $row['password'] ?></td>
								<td style="border-color:#333;">
									<div class="btn-group">
										<div class="btn-group">
											<a href="<?php echo base_url()."index.php/AdminController/admin_edit_kasir/".$row['id_kasir'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Kasir"><i class="fa fa-edit" style="font-size:13pt;"></i></a>
										</div>
										<div class="btn-group">
											<?php if($row['status'] == "Pegawai Tidak Aktif"){ ?>
												<a href="<?php echo base_url()."index.php/CrudController/admin_aktif_kasir/".$row['id_kasir'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Aktifkan Kasir"><i class="fa fa-check" style="font-size:13pt;"></i></a>
											<?php } else{ ?>
												<a href="<?php echo base_url()."index.php/CrudController/admin_tidak_aktif_kasir/".$row['id_kasir'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Non Aktifkan Kasir"><i class="fa fa-ban" style="font-size:13pt;"></i></a>
											<?php } ?>
										</div>
										<div class="btn-group">
											<a onclick="return confirm('Apakah Anda ingin menghapusnya?')" href="<?php echo base_url()."index.php/CrudController/admin_delete_kasir/".$row['id_kasir'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Kasir"><i class="fa fa-trash-o" style="font-size:13pt;"></i></button></a>
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
