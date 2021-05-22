<html>
	<body>
		<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<a href="<?php echo base_url()."index.php/AdminController/admin_buku" ?>" data-toggle="tooltip" data-placement="left" title="Menu Buku"><strong><i class="fa fa-chevron-left"></i></strong></a>
					<strong>Tambah Stok</strong>
				</h1>
			</div>
				<form action="<?php echo base_url()."index.php/CrudController/admin_simpan_stok_buku" ?>" method="POST" class="form-horizontal" id="attributeForm">
					<div class="modal-body col-md-offset-1">
						
							<input type="hidden" name="id_buku" value="<?php echo $data ?>">
						
						<div class="form-group">
							<label class="col-md-2">Distributor</label>
							<div class="col-md-9">
								<select class="form-control" name="id_distributor"
								data-fv-notempty="true"
								data-fv-notempty-message="*distributor tidak boleh kosong!"
								/>
									<option value="">--Pilih Distributor--</option>
								<?php
									foreach($data_select as $row){
								?>
									<option value="<?php echo $row['id_distributor'] ?>"><?php echo $row['nama_distributor'] ?></option>
								<?php
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2">Jumlah</label>
							<div class="col-md-9">
								<input class="form-control" type="number" min="1" max="10000" name="jumlah" placeholder="Jumlah"
								data-fv-notempty="true"
								data-fv-notempty-message="*jumlah tidak boleh kosong!"
								/>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>