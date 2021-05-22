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

			xmlhttp.open("GET","<?php echo base_url()."index.php/AdminController/search_distributor/";?>"+nama,true);
			xmlhttp.send();
		}
	</script>
	<div class="col-md-12">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 style="font-size:20pt;">Data Distributor</h1>
				<div class="row">
					<div class="col-md-2">
						<a href="<?php echo base_url()."index.php/AdminController/admin_tambah_distributor" ?>" class="btn btn-default" style="margin-bottom:10px; border-color:#FFCC29;"><i class="fa fa-plus"></i> Tambah Distributor</a>
					</div>
					<div class="col-md-3 col-md-offset-7">
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
							<th style="border-color:#333;">ID Distributor</th>
							<th style="border-color:#333;">Nama Distributor</th>
							<th style="border-color:#333;">Alamat</th>
							<th style="border-color:#333;">No. Telepon</th>
							<th style="border-color:#333;">Action</th>
						</tr>
					</thead>
					<tbody id="cari">
						<?php
						foreach($data as $row){
							?>
							<tr>
								<td style="border-color:#333;"><?php echo $row['id_distributor'] ?></td>
								<td style="border-color:#333;"><?php echo $row['nama_distributor'] ?></td>
								<td style="border-color:#333;"><?php echo $row['alamat'] ?></td>
								<td style="border-color:#333;"><?php echo $row['telepon'] ?></td>
								<td style="border-color:#333;">
									<div class="btn-group">
										<div class="btn-group">
											<a href="<?php echo base_url()."index.php/AdminController/admin_edit_distributor/".$row['id_distributor'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Distributor"><i class="fa fa-edit" style="font-size:13pt;"></i></a>
										</div>
										<div class="btn-group">
											<a onclick="return confirm('Apakah Anda ingin menghapusnya?')" href="<?php echo base_url()."index.php/CrudController/admin_delete_distributor/".$row['id_distributor'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Distributor"><i class="fa fa-trash-o" style="font-size:13pt;"></i></button></a>
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