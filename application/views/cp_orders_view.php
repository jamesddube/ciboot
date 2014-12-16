<?php

$title = "Orders";
require ('template/header.php');
require ('template/sidebar.php');

?>


<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb hidden-print pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li class="active">Order Details</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header hidden-print">Order Details <small>header small text goes here...</small></h1>
	<!-- end page-header -->

	<!-- begin invoice -->
	<div class="invoice">
		<div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Export as PDF</a>
                    <a href="javascript:" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
                    </span>
			OK ZIMBABWE (PLC) Branch: Rusape
		</div>
		<div class="invoice-header">
			<div class="invoice-from">
				<small>from</small>
				<address class="m-t-5 m-b-5">
					<strong>Mutare Bottling Company.</strong><br />
					18 Riverside Drive<br />
					Mutare, <br />
					Phone: (123) 456-7890<br />
					Fax: (123) 456-7890
				</address>
			</div>
			<div class="invoice-to">
				<small>to</small>
				<address class="m-t-5 m-b-5">
					<strong>Company Name</strong><br />
					Street Address<br />
					City, Zip Code<br />
					Phone: (123) 456-7890<br />
					Fax: (123) 456-7890
				</address>
			</div>
			<div class="invoice-date">
				<small>Invoice / July period</small>
				<div class="date m-t-5">August 3,2012</div>
				<div class="invoice-detail">
					<?php echo $orders[0]['order_id'] ?><br />
					Services Product
				</div>
			</div>
		</div>
		<div class="invoice-content">
			<div class="table-responsive">
				<table class="table table-invoice">
					<thead>
					<tr>
						<th width="100">PRODUCTS</th>
						<th width="700">DETAILS</th>
						<th width="90">PACK SIZE</th>

						<th>TOTAL</th>
					</tr>
					</thead>
					<tbody>

					<?php
					//count number of items in array
					$count = count($orders);
					$tot = 0;
					for($i = 0;$i<$count;$i++) {

						$tot = $tot + $orders[$i]['quantity'];
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

								echo $orders[$i]['packsize'].' ml'

								?>
							</td>


							<td>
								<?php
								//print_r($orders);

								echo $orders[$i]['quantity']

								?>
							</td>
						</tr>
					<?php
					}
					?>

					</tbody>
				</table>
			</div>
			<div class="invoice-price">
				<div class="invoice-price-left">
					<div class="invoice-price-row">
						<div class="sub-price">
							<small>SUBTOTAL</small>
							$4,500.00
						</div>
						<div class="sub-price">
							<i class="fa fa-plus"></i>
						</div>
						<div class="sub-price">
							<small>PAYPAL FEE (5.4%)</small>
							$108.00
						</div>
					</div>
				</div>
				<div class="invoice-price-right">
					<small>TOTAL</small>
					<?php
					echo $tot;
					?>

				</div>
			</div>
		</div>
		<div class="invoice-note">
			* Make all cheques payable to [Your Company Name]<br />
			* Payment is due within 30 days<br />
			* If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
		</div>
		<div class="invoice-footer text-muted">
			<p class="text-center m-b-5">
				THANK YOU FOR YOUR BUSINESS
			</p>
			<p class="text-center">
				<span class="m-r-10"><i class="fa fa-globe"></i> matiasgallipoli.com</span>
				<span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
				<span class="m-r-10"><i class="fa fa-envelope"></i> rtiemps@gmail.com</span>
			</p>
		</div>
	</div>
	<!-- end invoice -->
</div>
<!-- end #content -->

<?php 
require ('template/footer.php');
?>


