<html>
<body>
	<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<a href="<?php echo base_url()."index.php/AdminController/admin_buku" ?>" data-toggle="tooltip" data-placement="left" title="Menu Buku"><strong><i class="fa fa-chevron-left"></i></strong></a>
					<strong>Tambah Buku</strong>
				</h1>
			</div>
			<form action="<?php echo base_url()."index.php/CrudController/admin_simpan_buku" ?>" method="POST" class="form-horizontal" id="attributeForm">
				<div class="modal-body col-md-offset-1">
					<div class="form-group">
						<label class="col-md-2">Judul</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="judul" placeholder="Judul"
							data-fv-notempty="true"
							data-fv-notempty-message="*judul tidak boleh kosong!"
							data-fv-regexp="true"
							data-fv-regexp-regexp="^([A-Za-z0-9])"
							data-fv-regexp-message="*judul tidak boleh karakter!"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">NOISBN</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="noisbn" placeholder="NOISBN"
							data-fv-notempty="true"
							data-fv-notempty-message="*NOISBN tidak boleh kosong!"
							data-fv-regexp="true"
							data-fv-regexp-regexp="^([A-Za-z0-9])"
							data-fv-regexp-message="*noisbn tidak boleh karakter!"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Penulis</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="penulis" placeholder="Penulis"
							data-fv-notempty="true"
							data-fv-notempty-message="*penulis tidak boleh kosong!"
							data-fv-regexp="true"
							data-fv-regexp-regexp="^([A-Za-z])"
							data-fv-regexp-message="*penulis harus berupa alfabet!"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Penerbit</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="penerbit" placeholder="Penerbit"
							data-fv-notempty="true"
							data-fv-notempty-message="*penerbit tidak boleh kosong!"
							data-fv-regexp="true"
							data-fv-regexp-regexp="^([A-Za-z])"
							data-fv-regexp-message="*penerbit harus berupa alfabet!"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Tahun</label>
						<div class="col-md-9">
							<input class="form-control" type="number" min="2000" name="tahun" placeholder="Tahun"
							data-fv-notempty="true"
							data-fv-notempty-message="*tahun tidak boleh kosong!"
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Harga Pokok</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-addon">Rp</div>
								<input class="form-control" type="number" min="1000" max="100000000" name="harga_pokok" placeholder="Harga Pokok"
								data-fv-notempty="true"
								data-fv-notempty-message="*harga pokok tidak boleh kosong!"
								/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Harga Jual</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-addon">Rp</div>
								<input class="form-control" type="number" min="1000" max="100000000" name="harga_jual" placeholder="Harga Jual"
								data-fv-notempty="true"
								data-fv-notempty-message="*harga jual tidak boleh kosong!"
								/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">PPN</label>
						<div class="col-md-9">
							<div class="input-group">
								<input class="form-control" type="number" min="0" max="15" name="ppn" placeholder="PPN"
								data-fv-notempty="true"
								data-fv-notempty-message="*PPN tidak boleh kosong!"
								/>
								<div class="input-group-addon">%</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Diskon</label>
						<div class="col-md-9">
							<div class="input-group">
								<input class="form-control" type="number" min="0" max="100" name="diskon" placeholder="Diskon"
								data-fv-notempty="true"
								data-fv-notempty-message="*diskon tidak boleh kosong!"
								/>
								<div class="input-group-addon">%</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">Distributor</label>
						<div class="col-md-9">
							<select class="form-control" name="id_distributor" id="select"
							data-fv-notempty="true"
							data-fv-notempty-message="*distributor tidak boleh kosong!"
							/>
								<option value="">--Pilih Distributor--</option>
								<?php
								foreach($data as $row){
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
</div>
</body>
</html>