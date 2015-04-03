
	<?php
	//echo "<pre>";
	//print_r($ax_cust);
	//echo "</pre>";
	$title = "Orders";
	$test = 0;
	require('template/header.php')


	//generate new order number, we have the number of orders so we just allocate the next one
	?>


	<!-- begin #sidebar -->
	<?php require('template/sidebar.php') ?>
	<!-- end #sidebar -->

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


								<legend class="pull-left width-full ">#<?php echo $order_num ?><div id="results23"></div></legend>
								<!-- begin row -->

							<form method="POST" data-parsley-validate="true" name="order_form">
								<div class="row" id="rw">
									<!-- begin col-4 -->

									<div class="col-md-6" id="rw1">
										<div class="form-group">

											<label>Customer</label>
											<select class="form-control" name="cname">
												<?php
												$count = count($cust);
												for($i=0;$i<$count;$i++)
												{
												?>
												<option value="<?php echo $cust[$i]['CustomerID'] ?>"><?php echo strtoupper($cust[$i]['CustomerName']) ?></option>
												<?php
												}
												?>
											</select>

										</div>
									</div>
									<!-- end col-4 -->
									<!-- begin col-4 -->
									<div class="col-md-6" id="rw2">
										<div class="form-group">
											<label>Sales Rep</label>
											<select class="form-control" name="rep">
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
									<input type="hidden" name="oi" value="<?php echo $order_num ?>">


								</div>
								<!-- end row -->
								<div class="row" id="rw">

										<!-- begin col-4 -->
										<div class="col-md-offset-4 col-md-4" id="rw3">
											<div class="form-group">
												<label></label><br>

												<div class="row">

													<div  onclick="save_order()" id="btnsave" name="middle" class=" btn btn-block btn-success" >Save1</div>
													<div id = "sv_results"></div>




												</div>
											</div>
										</div>
										<!-- end col-4 -->

								</div>
							</form>
							<div id="populate"></div>




						</div>

						<?php

						if(isset($saved_state) && $saved_state === 1)
						{
						?>

						<div class="well bg-white">
							<div id="populate"></div>
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
								<?php
								//count number of items in array
								$count = count($orders);
								$tot = 0;
								for($i = 0;$i<$count;$i++) {

								//$tot = $tot + $orders[$i]['quantity'];
								?>

								<tr>

									<td>
										<?php
										//print_r($orders);

										echo $orders[$i]['product_id']

										?>
									</td>
									<td>
										<?php
										//print_r($orders);

										echo $orders[$i]['prodname']

										?>
									</td>
									<td>
										<?php
										//print_r($orders);

										//echo $orders[$i]['quantity']
										echo  $test;

										?>
									</td>
								</tr>
								<?php
								}
								?>

								</tbody>

							</table>
						</div>
						<?php
						}
						?>

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
					<h4 class="modal-title" >Add Product </h4>
				</div>
				<div class="modal-body">
					<form action="" method="POST" data-parsley-validate="true" name="details">
						<div class="row">
							<!-- begin col-4 -->
							<div class="col-md-12" id="rw1">
								<div class="form-group">

									<div id="details_results"></div>
								</div>
							</div>
							<!-- end col-4 -->
							<!-- begin col-4 -->
							<div class="col-md-4" id="rw1">
								<div class="form-group">
									<label>Product</label>
									<select class="form-control" name="prod">
										<?php
										$count = count($products);
										for($i=0;$i<$count;$i++)
										{
											?>
											<option value="<?php echo $products[$i]['Code'] ?>"><?php echo $products[$i]['Description']. "   (".$products[$i]['PackSize'].")" ?></option>
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
									<input type="text" name="qty" placeholder="Amount"  class="form-control" />
									<input type="hidden" name="onum" value="<?php echo $order_num ?>">
								</div>
							</div>
							<!-- end col-4 -->
							<!-- begin col-4 -->
							<div class="col-md-4">
								<div class="form-group">
									<label>Total</label>
									<div id="details_qty"></div>
								</div>
							</div>
							<!-- end col-4 -->


					</form>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
					<div class="btn btn-sm btn-success" onclick="add_details()" onkeyup="get_qty()" >Action</div>
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
	<script type="text/javascript" src=<?php echo base_url("assets/js/jquery.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/js/jquery-1.8.2.min.js")?>></script>
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
		function anim()
		{
			$('#rw1').slideToggle(1000);
			$('#rw2').slideToggle(1000);
			$('#middle').slideToggle(1000);




		};
	</script>
	<script type="text/javascript">

		function save_order() {
			$('#btnsave').slideToggle();
			$('#btnsave').append('hfhfhfhf');
			$.post('save',{cu:order_form.cname.value,oi:order_form.oi.value,rep:order_form.rep.value},
				function(output){
					$('#sv_results').html(output).fadeOut(1).fadeIn(1000);
				});$('#rw2').slideToggle(1000);
			$('#rw1').slideToggle(1000);

		}
	</script>
	<script type="text/javascript">

		function get2() {
			$.post('jq',{name:details.qty.value},
				function(output){
					$('#details_results').html(output);
				});
		}
	</script>
	<script type="text/javascript">

		function add_details1() {
			$.post('o_add',{qty:details.qty.value,oi:details.onum.value,prod:details.prod.value},
				function(output){
					$('#details_results').html(output);
				});
			$.post('jq_order_qty',{oi:details.onum.value},
				function(output){
					$('#qty').html(output);
				});


		}
	</script><script type="text/javascript">

		function add_details() {

			$.post('jquery_add',{qty:details.qty.value,oi:details.onum.value,prod:details.prod.value},
				function(output){
					$('#details_results').html(output,get_qty(),populate());
				});
			$('#details_results').fadeOut().fadeIn();

		}

		function get_qty()
		{
			$.post('jq_order_qty',{oi:details.onum.value},
				function(output){
					$('#details_qty').html(output);
				});
		}

		function populate()
		{
			$.post('jquery_populate',{oi:details.onum.value},function(output){
				$('#populate').html(output);
			});

		}
	</script>
</body>
</html>
