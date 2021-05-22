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

			xmlhttp.open("GET","<?php echo base_url()."index.php/AdminController/search_pemasok/";?>"+nama,true);
			xmlhttp.send();
		}
	</script>
	<div class="col-md-12">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<div class="row">
					<div class="col-md-4">
						<h1>
							<a href="<?php echo base_url()."index.php/AdminController/admin_buku" ?>" data-toggle="tooltip" data-placement="right" title="Menu Buku"><strong><i class="fa fa-chevron-left"></i></strong></a>
							<strong>Data Pemasok</strong>
						</h1>
					</div>
					<div class="col-md-3 col-md-offset-5">
						<div class="form-group">
							<div class="input-group" style="padding-top:15px;">
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
							<th style="border-color:#333;">Nama Distributor</th>
							<th style="border-color:#333;">Judul</th>
							<th style="border-color:#333;">Jumlah</th>
							<th style="border-color:#333;">Tanggal</th>
						</tr>
					</thead>
					<tbody id="cari">
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
				</table>
			</div>
		</div>
	</div>
</body>
</html>