<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('/assets/images/favicon.png');?>"/>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url('/');?>"><b>KT</b>alk</a>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<form action="<?php echo base_url('/auth/process');?>" method="post">
					<?php echo csrf_field();?>
					<div class="input-group mb-3">
						<input type="email" class="form-control <?php echo ($validation->hasError('email')) ? 'is-invalid' : '';?>" name="email" id="email" placeholder="Email" autocomplete="off" value="<?php echo old('email');?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
						<div class="invalid-feedback">
							<?php echo $validation->getError('email');?>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control <?php echo ($validation->hasError('password')) ? 'is-invalid' : '';?>" name="password" id="password" placeholder="Password" autocomplete="off" value="<?php echo old('password');?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						<div class="invalid-feedback">
							<?php echo $validation->getError('password');?>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
				</form>
				<p class="mt-2 mb-1 text-center"> 
					Don't have an account yet? <a href="<?php echo base_url('/auth/register');?>">Sign up</a>
				</p>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
	<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
	<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>
	<?php if(session()->getFlashdata('success')) { ?>
		<script type="text/javascript">
			$(function() {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'success',
					title: '&nbsp;<?php echo session()->getFlashdata('success');?>'
				})
			});
		</script>
	<?php } ?>
	<?php if(session()->getFlashdata('error')) { ?>
		<script type="text/javascript">
			$(function() {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: '&nbsp;<?php echo session()->getFlashdata('error');?>'
				})
			});
		</script>
	<?php } ?>
</body>
</html>