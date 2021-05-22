<html>
<body>
	<div class="col-md-8 col-md-offset-2">
		<div class="modal-content" style="margin-bottom:20px;">
			<div class="modal-header">
				<h1 class="modal-title" id="myModalLabel" style="font-size:40pt;">
					<?php
					foreach($data as $row){
						?>
						<a href="<?php echo base_url()."index.php/AdminController/admin_lihat_buku/".$row['id_buku'] ?>" data-toggle="tooltip" data-placement="left" title="Lihat Buku"><strong><i class="fa fa-chevron-left"></i></strong></a>
						<strong>Edit Buku</strong>
					</h1>
				</div>
				<form action="<?php echo base_url()."index.php/CrudController/admin_update_buku" ?>" method="POST" class="form-horizontal" id="attributeForm">
					<div class="modal-body col-md-offset-1">
						<input type="hidden" name="id_buku" placeholder="Id Buku" value="<?php echo $row['id_buku'] ?>">
						<div class="form-group">
							<label class="col-md-2">Judul</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="judul" placeholder="Judul" value="<?php echo $row['judul'] ?>"
								data-fv-notempty="true"
								data-fv-notempty-message="*judul tidak boleh kosong!"
								data-fv-regexp="true"
								data-fv-regexp-regexp="^([A-Za-z0-9])"
								data-fv-regexp-message="*judul tidak boleh karakter!"
								\>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2">NOISBN</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="noisbn" placeholder="NOISBN" value="<?php echo $row['noisbn'] ?>"
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
								<input class="form-control" type="text" name="penulis" placeholder="Penulis" value="<?php echo $row['penulis'] ?>"
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
								<input class="form-control" type="text" name="penerbit" placeholder="Penerbit" value="<?php echo $row['penerbit'] ?>"
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
								<input class="form-control" type="number" min="2000" name="tahun" placeholder="Tahun" value="<?php echo $row['tahun'] ?>"
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
									<input class="form-control" type="number" min="1000" max="100000000" name="harga_pokok" placeholder="Harga Pokok" value="<?php echo $row['harga_pokok'] ?>"
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
									<input class="form-control" type="number" min="1000" max="100000000" name="harga_jual" placeholder="Harga Jual" value="<?php echo $row['harga_jual'] ?>"
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
									<input class="form-control" type="number" min="0" max="15" name="ppn" placeholder="PPN" value="<?php echo $row['ppn'] ?>"
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
									<input class="form-control" type="number" min="0" max="100" name="diskon" placeholder="Diskon" value="<?php echo $row['diskon'] ?>"
									data-fv-notempty="true"
									data-fv-notempty-message="*diskon tidak boleh kosong!"
									/>
									<div class="input-group-addon">%</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
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