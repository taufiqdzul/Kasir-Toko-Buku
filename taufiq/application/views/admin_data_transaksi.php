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

			xmlhttp.open("GET","<?php echo base_url()."index.php/AdminController/search_transaksi/";?>"+nama,true);
			xmlhttp.send();
		}
	</script>
	<div class="col-md-12">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<div class="row">
					<div class="col-md-4">
						<h1>
							<strong>Data Transaksi</strong>
						</h1>
					</div>
					<div class="col-md-3 col-md-offset-5">
						<div class="form-group">
							<div class="input-group" style="padding-top:15px;">
								<div class="input-group-addon" style="background-color:#FFCC29; border-color:#FFCC29;"><i class="fa fa-search"></i></div>
								<input class="form-control frm" onkeyup="showResult()" id="nama" name="input" placeholder="cari berdasarkan tanggal">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th style="border-color:#333;">Tanggal</th>
							<th style="border-color:#333;">Nama Konsumen</th>
							<th style="border-color:#333;">Total Bayar</th>
							<th style="border-color:#333;">Uang Pembayaran</th>
							<th style="border-color:#333;">Uang Kembalian</th>
							<th style="border-color:#333;">Lihat Bon</th>
						</tr>
					</thead>
					<tbody id="cari">
						<?php
						foreach($data_transaksi as $row){
							?>
							<tr>
								<td style="border-color:#333;"><?php echo $row['tanggal'] ?></td>
								<td style="border-color:#333;"><?php echo $row['nama'] ?></td>
								<td style="border-color:#333;"><?php echo "Rp ".number_format($row['total_transaksi']).".00" ?></td>
								<td style="border-color:#333;">
									<?php echo "Rp ".number_format($row['pembayaran']).".00" ?>
								</td>
								<?php
									$kembalian = $row['pembayaran']-$row['total_transaksi'];
								?>
								<td style="border-color:#333;"><?php echo "Rp ".number_format($kembalian).".00" ?></td>
								<td style="border-color:#333;">
									<a href="<?php echo base_url()."index.php/AdminController/admin_detail_transaksi/".$row['id_transaksi']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Transaksi"><i class="fa fa-eye"></i></a>
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
