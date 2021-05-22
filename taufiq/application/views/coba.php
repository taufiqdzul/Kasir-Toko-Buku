<head>
	<style type="text/css">
		.modal-header{
			background-color: #333;
			border-color: #333;
		}
	</style>
</head>
<div class="modal-content">
	<div class="modal-header">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="<?php echo $this->session->userdata('active_home'); ?>"><a href="<?php echo base_url()."index.php/AdminController/admin_buku" ?>"><o>Buku</o></a></li>

				<li class="<?php echo $this->session->userdata('active_distributor'); ?>"><a href="<?php echo base_url()."index.php/AdminController/admin_distributor" ?>">Distributor</a></li>

				<li class="<?php echo $this->session->userdata('active_kasir'); ?>"><a href="<?php echo base_url()."index.php/AdminController/admin_kasir" ?>">Kasir</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Admin <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()."index.php/LoginController/do_logout" ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>