
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
				<div class="panel panel-inverse bg-black">
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
						<div class="well bg-white">


								<legend class="pull-left width-full ">#<?php echo $order_num ?></legend>




								<!-- begin row -->
							<form action="g" method="POST" data-parsley-validate="true" name="form_order">
								<div class="row" id="rw">
									<!-- begin col-4 -->
									<div class="col-md-4" id="rw1">
										<div class="form-group">
											<label>Customer</label>
											<select class="form-control">
												<?php
												$count = count($cust);
												for($i=0;$i<$count;$i++)
												{
												?>
												<option value="<?php echo $cust[$i]['customer_id'] ?>"><?php echo $cust[$i]['customer_name'] ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<!-- end col-4 -->
									<!-- begin col-4 -->
									<div class="col-md-4" id="rw2">
										<div class="form-group">
											<label>Sales Rep</label>
											<select class="form-control">
												<?php
												$count = count($reps);
												for($i=0;$i<$count;$i++)
												{
													?>
													<option value="<?php echo $reps[$i]['id'] ?>"><?php echo $reps[$i]['fname']." ".$reps[$i]['lname'] ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<!-- end col-4 -->
							</form>

								</div>
								<!-- end row -->
						<div class="row" id="rw">
							<!-- begin col-4 -->
							<div class="col-md-4" id="rw3">
								<div class="form-group">
									<label></label><br>
									<div  name="middle" class=" btn btn-block btn-success" onclick="get()" >Save</div>
								</div>
							</div>
							<!-- end col-4 -->
						</div>

						</div>
						<div class="well bg-white">
							<a  href="#modal-dialog" data-toggle="modal"><div  name="middle" class=" btn btn-block btn-success" >Add Product</div></a><br>
							<table class="table table-bordered">
								<thead>
								<tr>
									<th>Product Code</th>
									<th>Product Description</th>
									<th>Quantity</th>
								<tr>

								</thead>
								<tbody>
								<tr>
									<td>1030</td>
									<td>Coke 300ml</td>
									<td>34</td>
								</tr>
								<tr>
									<td>1030</td>
									<td>Coke 300ml</td>
									<td>34</td>
								</tr>

								</tbody>

							</table>
						</div>

					</div>
				</div>
				<!-- end panel -->
			</div>
			<!-- end col-12 -->
		</div>
		<!-- end row -->
	</div>
	<!-- end #content -->

	<!-- #modal-dialog -->
	<div class="modal fade" id="modal-dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Add Products</h4>
				</div>
				<div class="modal-body">
					<form action="g" method="POST" data-parsley-validate="true" name="form-wizard">
						<div class="row">
							<!-- begin col-4 -->
							<div class="col-md-4" id="rw1">
								<div class="form-group">
									<label>Product</label>
									<select class="form-control">
										<?php
										$count = count($products);
										for($i=0;$i<$count;$i++)
										{
											?>
											<option value="<?php echo $products[$i]['product_id'] ?>"><?php echo $products[$i]['prodname']. "   (".$products[$i]['prodcategory']."ml)" ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<!-- end col-4 -->
							<!-- begin col-4 -->
							<div class="col-md-4">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="middle" placeholder="Amount" class="form-control" />
								</div>
							</div>
							<!-- end col-4 -->
							<!-- begin col-4 -->
							<div class="col-md-4">
								<div class="form-group">
									<label>Total</label>
									<h4>4566</h4>
								</div>
							</div>
							<!-- end col-4 -->
					</form>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					<a href="javascript:;" class="btn btn-sm btn-success">Action</a>
				</div>
			</div>
		</div>
	</div>

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
<script src=<?php echo base_url("assets/js/form-wizards.demo.min.js") ?>></script>
<script src=<?php echo base_url("assets/js/apps.min.js") ?>></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
	$(document).ready(function() {
		App.init();
		FormWizard.init();
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
	<script>
		function anim()
		{
			$('#rw1').slideToggle(1000);
			$('#rw2').slideToggle(1000);




		};
	</script>
	<script type="text/javascript">

		function get() {
			$.post('',{name:form_order.name.value},
				function(output){
					$('#results').html(output).$('#rw1').slideToggle(1000)
				});
		}
	</script>
</body>
</html>
