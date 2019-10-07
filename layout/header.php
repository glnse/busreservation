<!DOCTYPE html>
<html>
<head>
	<!-- REQUIRED META -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?= baseURL(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= baseURL(); ?>css/styles.css">
	<script type="text/javascript" src="<?= baseURL(); ?>js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?= baseURL(); ?>js/sweetalert2@8.js"></script>
	<?php
	if (isset($section)) {
	?>
		<link rel="stylesheet" type="text/css" href="<?= baseURL(); ?>css/datatables.min.css">
		<script type="text/javascript" src="<?= baseURL(); ?>js/datatables.min.js"></script>
	<?php
	}
	?>
	<title>Online Bus Reservation</title>

</head>
<body style="background: #CAC531;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #F3F9A7, #CAC531);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #F3F9A7, #CAC531); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
	<div class="container-fluid">
		<div class="container">
			<div class="row py-3 no-gutters align-items-center justify-content-center text-center">
				<div class="col-sm-3">
					<img src="<?= baseURL(); ?>img/logo-pangasinan.png" width="80px" class="pb-2">
					<h6>Republic of the Philippines</h6>
					<h5><strong>PROVINCE OF PANGASINAN</strong></h5>
					<h6>Lingayen</h6>
				</div>
			</div>
			<div class="row justify-content-center text-center pb-2">
				<div class="col-sm-5">
					<h3><strong>Online Bus Reservation</strong></h3>
				</div>
			</div>
			<?php
			if (isset($section)) {
			?>
			<div class="row justify-content-center text-center pb-2">
				<?php
				if ($section=="pgo") {
				?>
				<div class="col-sm-5">
					<a href="index.php" class="badge badge-pill badge-info p-3">Requests</a> | <a href="settings.php" class="badge badge-pill badge-info p-3">Settings</a> | <a href="<?= baseURL(); ?>admin/logout.php" class="badge badge-pill badge-danger p-3">Log Out</a>
				</div>
				<?php
				}
				else if ($section="engineer"){
				?>
				<div class="col-sm-5">
				<a href="index.php" class="badge badge-pill badge-info p-3">Buses</a> | <a href="settings.php" class="badge badge-pill badge-info p-3">Settings</a> | <a href="<?= baseURL(); ?>admin/logout.php" class="badge badge-pill badge-danger p-3">Log Out</a>
				</div>
				<?php
				}
				?>
			</div>
			<?php
			}
			?>		
		</div>
	</div>
	<div class="container-fluid">
		<div class="container">