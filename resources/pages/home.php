<?php
$path = require $_SERVER['DOCUMENT_ROOT'].'/ww-admin/config/config-path.php';
include_once $path['root'].'/ww-admin/includes/session.inc.php';
if(!isset($_SESSION['user_id']))
	{
		header('Location:../ww-admin/login');
	}
	require $path['root'].'/ww-admin/includes/connect.inc.php';
	$db = new DB();

$db->query('SELECT count(*) FROM `ww_customer_order` WHERE `order_date` >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)');
$nRows = $db->resultset();
$newOrderCount = $nRows[0]["count(*)"];

$db->query('SELECT count(*) FROM `ww_customer_order` WHERE `order_status` = 0');
$nRows = $db->resultset();
$pendingOrderCount = $nRows[0]["count(*)"];

$db->query('SELECT count(*) FROM `ww_provider` WHERE `reg_date` >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)');
$nRows = $db->resultset();
$newProviderCount = $nRows[0]["count(*)"];

$db->query('SELECT count(*) FROM `ww_customers` WHERE `reg_date` >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)');
$nRows = $db->resultset();
$newCustomerCount = $nRows[0]["count(*)"];

$db->terminate();


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WhenWing | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="theme-color" content="#4885ed" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logo.png">
	<?php include $path['admin'].'/includes/style-wb-admin.inc.php';?>
</head>

<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

	<?php include $path['admin'].'/resources/templates/header-tmpl.php';?>
	<?php include $path['admin'].'/resources/templates/left-sidebar-tmpl.php';?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Control Panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="/orders">
						<i class="fa fa-dashboard"></i> Home</a>
				</li>
				<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-aqua">
							<i class="fa fa-shopping-bag"></i>
						</span>

						<div class="info-box-content">
							<span class="info-box-text">New Orders</span>
							<span class="info-box-number"><?php echo $newOrderCount; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-red">
							<i class="fa fa-warning"></i>
						</span>

						<div class="info-box-content">
							<span class="info-box-text">Pending
								<br>Orders</span>
							<span class="info-box-number"><?php echo $pendingOrderCount; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-green">
							<i class="fa fa-user-md"></i>
						</span>

						<div class="info-box-content">
							<span class="info-box-text">New Provider</span>
							<span class="info-box-number"><?php echo $newProviderCount; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-yellow">
							<i class="fa fa-user"></i>
						</span>

						<div class="info-box-content">
							<span class="info-box-text">New Customer</span>
							<span class="info-box-number"><?php echo $newCustomerCount; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">New Orders</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Order id</th>
												<th>Customer id</th>
												<th>Provider id</th>
												<th>Category 1</th>
												<th>Category 2</th>
												<th>Type 1</th>
												<th>Type 2</th>
												<th>Order Date</th>
												<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$post_get_v2 = 'new';
									include $path['admin'].'/handlers/formhandle/orders/show-order.php';?>
									</tbody>
									<tfoot>
										<tr>
										<th>Order id</th>
											<th>Customer id</th>
											<th>Provider id</th>
											<th>Category 1</th>
											<th>Category 2</th>
											<th>Type 1</th>
											<th>Type 2</th>
											<th>Order Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
            <!-- /.box -->

					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->



		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php include $path['admin'].'/resources/templates/footer-tmpl.php';?>
</div>
<!-- ./wrapper -->

	<?php include $path['admin'].'/includes/script-wb-admin.inc.php';?>

	<!-- DataTables -->
	<script src="/ww-admin/scripts/jquery.dataTables.min.js"></script>
	<script src="/ww-admin/scripts/dataTables.bootstrap.min.js"></script>
	<script>
		$(function() {
			$('#example2').DataTable({
				'paging': true,
				'lengthChange': false,
				'searching': false,
				'ordering': true,
				'info': true,
				'autoWidth': false
			})
		})
	</script>
</body>

</html>
