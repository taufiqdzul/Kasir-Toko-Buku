<html>
<body>
	<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<a href="<?php echo base_url()."index.php/AdminController/admin_distributor" ?>" data-toggle="tooltip" data-placement="left" title="Menu Distributor"><strong><i class="fa fa-chevron-left"></i></strong></a>
					<strong>Tambah Distributor</strong>
				</h1>
			</div>
			<form action="<?php echo base_url()."index.php/CrudController/admin_simpan_distributor" ?>" method="POST" class="form-horizontal" id="attributeForm">
				<div class="modal-body col-md-offset-1">
					<div class="form-group">
						<label class="col-md-2">Nama Distributor</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="nama_distributor" placeholder="Nama Distributor"
							data-fv-notempty="true"
							data-fv-notempty-message="*nama distributor tidak boleh kosong!"
							data-fv-regexp="true"
							data-fv-regexp-regexp="^([A-Za-z])"
							data-fv-regexp-message="*nama distributor harus berupa alfabet!"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Alamat</label>
						<div class="col-md-9">
							<textarea class="form-control" name="alamat"
							data-fv-notempty="true"
							data-fv-notempty-message="*alamat tidak boleh kosong!"
							data-fv-regexp="true"
							data-fv-regexp-regexp="^([A-Za-z])"
							data-fv-regexp-message="*alamat harus berupa alfabet!"
							></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">No. Telepon</label>
						<div class="col-md-9">
							<input class="form-control" type="number" min="0" max="9999999999999" name="no_telepon" placeholder="No Telepon"
							data-fv-notempty="true"
							data-fv-notempty-message="*no telepon tidak boleh kosong!"
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