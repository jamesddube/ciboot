
	<?php
	$title = "Orders";
	require('template/header.php')


	//generate new order number, we have the number of orders so we just allocate the next one
	?>


	<!-- begin #sidebar -->
	<?php require('template/sidebar.php') ?>
	<!-- end #sidebar -->
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href=<?php echo base_url("assets/plugins/bootstrap-wizard/css/bwizard.min.css") ?> rel="stylesheet" />
	<link href=<?php echo base_url("assets/plugins/parsley/src/parsley.css") ?> rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Home</a></li>
			<li><a href="javascript:;">Form Stuff</a></li>
			<li class="active">Wizards + Validation</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Add New Order <small>header small text goes here...</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
			<!-- begin col-12 -->
			<div class="col-md-12">
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title">Form Wizards</h4>
					</div>
					<div class="panel-body">
						<form action="http://seantheme.com/" method="POST" data-parsley-validate="true" name="form-wizard">
							<div id="wizard">
								<ol>
									<li>
										Identification
										<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
									</li>
									<li>
										Contact Information
										<small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small>
									</li>
									<li>
										Login
										<small>Phasellus lacinia placerat neque pretium condimentum.</small>
									</li>
									<li>
										Completed
										<small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
									</li>
								</ol>
								<!-- begin wizard step-1 -->
								<div class="wizard-step-1">
									<fieldset>
										<legend class="pull-left width-full">Order  #<?php echo $order_num ?></legend>
										<!-- begin row -->
										<div class="row">
											<!-- begin col-4 -->
											<div class="col-md-4">
												<div class="form-group block1">
													<label>Customer</label>
													<select class="form-control" data-parsley-group="wizard-step-1">
														<?php
														//count number of items in array
														$count = count($cust);
														for($i = 0;$i<$count;$i++)
														{

														?>
														<option value="<?php echo $cust[$i]['customer_id']?>"><?php echo $cust[$i]['customer_name'] ?></option><?php
														}
														?>
													</select>
												</div>
											</div>
											<!-- end col-4 -->

											<!-- begin col-4 -->
											<div class="col-md-4">
												<div class="form-group">
													<label>Sales Rep</label>
													<select class="form-control" data-parsley-group="wizard-step-1">
														<?php
														//count number of items in array
														$count = count($reps);
														for($i = 0;$i<$count;$i++)
														{

															?>
															<option value="<?php echo $reps[$i]['id']?>"><?php echo $reps[$i]['fname'] ?></option><?php
														}
														?>
													</select>
												</div>
											</div>
											<!-- end col-4 -->
											<!-- begin col-4 -->
											<div class="col-md-4">
												<div class="form-group">
													<label>Reference</label>
													<input type="number" name="middle" placeholder="A" class="form-control" data-parsley-group="wizard-step-1" required />
												</div>
											</div>
											<!-- end col-4 -->
										</div>
										<!-- end row -->

									</fieldset>
								</div>
								<!-- end wizard step-1 -->
								<!-- begin wizard step-2 -->
								<div class="wizard-step-2">
									<fieldset>
										<legend class="pull-left width-full">Product Information</legend>
										<!-- begin row -->
										<div class="row">
											<!-- begin col-6 -->
											<div class="col-md-6">
												<div class="form-group">
													<label>Products</label>
													<select class="form-control" data-parsley-group="wizard-step-1">
														<?php
														//count number of items in array
														$count = count($products);
														for($i = 0;$i<$count;$i++)
														{

															?>
															<option value="<?php echo $products[$i]['product_id']?>"><?php echo $cust[$i]['customer_name'] ?></option><?php
														}
														?>
													</select>

												</div>
											</div>
											<!-- end col-6 -->
											<!-- begin col-6 -->
											<div class="col-md-6">
												<div class="form-group">
													<label>Email Address</label>
													<input type="email" name="email" placeholder="someone@example.com" class="form-control" data-parsley-group="wizard-step-2" data-parsley-type="email" required />
												</div>
											</div>
											<!-- end col-6 -->
										</div>
										<!-- end row -->

									</fieldset>
								</div>
								<!-- end wizard step-2 -->
								<!-- begin wizard step-3 -->
								<div class="wizard-step-3">
									<fieldset>
										<legend class="pull-left width-full">Login</legend>
										<!-- begin row -->
										<div class="row">
											<!-- begin col-4 -->
											<div class="col-md-4">
												<div class="form-group">
													<label>Username</label>
													<div class="controls">
														<input type="text" name="username" placeholder="johnsmithy" class="form-control" data-parsley-group="wizard-step-3" required />
													</div>
												</div>
											</div>
											<!-- end col-4 -->
											<!-- begin col-4 -->
											<div class="col-md-4">
												<div class="form-group">
													<label>Pasword</label>
													<div class="controls">
														<input type="password" name="password" placeholder="Your password" class="form-control" data-parsley-group="wizard-step-3" required />
													</div>
												</div>
											</div>
											<!-- end col-4 -->
											<!-- begin col-4 -->
											<div class="col-md-4">
												<div class="form-group">
													<label>Confirm Pasword</label>
													<div class="controls">
														<input type="password" name="password2" placeholder="Confirmed password" class="form-control" />
													</div>
												</div>
											</div>
											<!-- end col-6 -->
										</div>
										<!-- end row -->
									</fieldset>
								</div>
								<!-- end wizard step-3 -->
								<!-- begin wizard step-4 -->
								<div>
									<div class="jumbotron m-b-0">
										<h1>Login Successfully</h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
										<p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
									</div>
								</div>
								<!-- end wizard step-4 -->
							</div>
						</form>
					</div>
				</div>
				<!-- end panel -->
			</div>
			<!-- end col-12 -->
		</div>
		<!-- end row -->
	</div>
	<!-- end #content -->

	<!-- begin theme-panel -->
	<div class="theme-panel">
		<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
		<div class="theme-panel-content">
			<h5 class="m-t-0">Color Theme</h5>
			<ul class="theme-list clearfix">
				<li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
				<li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
			</ul>
			<div class="divider"></div>
			<div class="row m-t-10">
				<div class="col-md-5 control-label double-line">Header Styling</div>
				<div class="col-md-7">
					<select name="header-styling" class="form-control input-sm">
						<option value="1">default</option>
						<option value="2">inverse</option>
					</select>
				</div>
			</div>
			<div class="row m-t-10">
				<div class="col-md-5 control-label">Header</div>
				<div class="col-md-7">
					<select name="header-fixed" class="form-control input-sm">
						<option value="1">fixed</option>
						<option value="2">default</option>
					</select>
				</div>
			</div>
			<div class="row m-t-10">
				<div class="col-md-5 control-label double-line">Sidebar Styling</div>
				<div class="col-md-7">
					<select name="sidebar-styling" class="form-control input-sm">
						<option value="1">default</option>
						<option value="2">grid</option>
					</select>
				</div>
			</div>
			<div class="row m-t-10">
				<div class="col-md-5 control-label">Sidebar</div>
				<div class="col-md-7">
					<select name="sidebar-fixed" class="form-control input-sm">
						<option value="1">fixed</option>
						<option value="2">default</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<!-- end theme-panel -->

	<!-- begin scroll to top btn -->
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src=<?php echo base_url("assets/plugins/jquery-1.8.2/jquery-1.8.2.min.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/bootstrap-3.2.0/js/bootstrap.min.js") ?>></script>
<!--[if lt IE 9]>
<script src=<?php echo base_url("assets/crossbrowserjs/html5shiv.js") ?>></script>
<script src=<?php echo base_url("assets/crossbrowserjs/respond.min.js") ?>></script>
<script src=<?php echo base_url("assets/crossbrowserjs/excanvas.min.js") ?>></script>
<![endif]-->
<script src=<?php echo base_url("assets/plugins/slimscroll/jquery.slimscroll.min.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/jquery-cookie/jquery.cookie.js") ?>></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src=<?php echo base_url("assets/plugins/parsley/dist/parsley.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/bootstrap-wizard/js/bwizard.js") ?>></script>
<script src=<?php echo base_url("assets/js/form-wizards-validation.demo.min.js") ?>></script>
<script src=<?php echo base_url("assets/js/apps.min.js") ?>></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
	$(document).ready(function() {
		App.init();
		FormWizardValidation.init();
	});
</script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-53034621-1', 'auto');
	ga('send', 'pageview');
</script>
</body>
</html>
