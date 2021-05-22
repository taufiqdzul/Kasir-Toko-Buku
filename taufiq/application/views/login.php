<html>
	<head>
		<title>Taufiq Dzulqornain - 17111091</title>
		<link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap/css/"; ?>bootstrap.min.css">
		<!-- <link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap/css/"; ?>sb-admin-2.css"> -->
		<link rel="stylesheet" href="<?php echo base_url()."assets/datatables/css/"; ?>dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap-datepicker/css/"; ?>bootstrap-datepicker3.min.css">
		<link rel="stylesheet" href="<?php echo base_url()."assets/font-awesome/css/"; ?>font-awesome.min.css">
		<style type="text/css">
			.btn{
				border-radius: 0px;
			}
			.form-control{
				border-radius: 0px;
			}
			.input-group-addon{
				border-radius: 0px;
			}
			.form-control{
				border-radius: 0px;
			}
			.modal-content{
				border-radius: 0px;
			}
			.btn{
				border-radius: 0px;
			}
			body{
				background: url('<?php echo base_url(); ?>assets/img/login.png');
				background-repeat: no-repeat;
				background-size: 600px;
				background-position: 50%;
			}
		</style>
		<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</head>
	<body>
		<form action="<?php echo base_url()."index.php/LoginController/do_login" ?>" method="POST">
			<br class="hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<br class="hidden-md-up hidden-xs-down">
			<div class="container modal-content" style="max-width:500px;">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<h1 class="modal-title" id="myModalLabel">
							<img class="" src="<?php echo base_url()."assets/img/logo_login.png" ?>" style="width:50px;">
							<strong>Login</strong>
						</h1>
					</div>
					<div class="modal-body">
						<div class="form-group container col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0;">
							<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
								<button class="form-control btn-primary" style="border-right:0px; background-color:#333; border-color:#333;" disabled><i class="fa fa-user"></i></button>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10" style="margin:0; padding:0;">
								<input type="text" name="username" class="form-control" placeholder="username">
							</div>
						</div>
						<div class="form-group container col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0; margin-top:1px; margin-bottom:15px;">
							<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
								<button class="form-control btn-primary" style="border-right:0px; background-color:#333; border-color:#333;" disabled><i class="fa fa-key"></i></button>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10" style="margin:0; padding:0;">
								<input type="password" name="password" class="form-control" placeholder="**********">
							</div>
						</div>
					</div>
					<div class="modal-footer col-md-12 col-sm-12 col-xs-12" style="margin-right:0; padding-right:0;">
						<div class="text-left col-md-8 col-sm-8 col-xs-8">
							<?php echo $this->session->flashdata('pesan_login'); ?>
						</div>
						<button type="submit" class="btn btn-lg btn-default" style="background-color:#333; color:#fff;">Login</button>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
