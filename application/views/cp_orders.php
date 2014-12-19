

<?php
$title = "Orders";
require ('template/header.php');
require ('template/sidebar.php');

?>

	<!-- ================== BEGIN PAGE-Modals LEVEL STYLE ================== -->
    <link href="<?php echo base_url('assets/plugins/gritter/css/jquery.gritter.css')?>" rel="stylesheet" />
	<!-- ================== END PAGE LEsVEL STYLE ================== -->

<?php
if(isset($_GET['vw']))
{
	echo "gotcha";
}
else{
?>
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Tables</a></li>
				<li class="active">Managed Tables</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<div class="fa fa-pencil-square-o fa-4x" ></div><h1 class="page-header ">Orders <small>header small text goes here...</small></h1>
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
                            <h4 class="panel-title">Table in Panel</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed  table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>#Order ID</th>
                                        <th>Customer</th>
                                        <th>Route</th>
                                        <th>Sales Rep</th>
                                        <th>Total</th>
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

                                            echo $orders[$i]['order_id']
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('main/orders_view/'.$orders[$i]['order_id'])?>"
                                                ><?php
                                            //print_r($orders);

                                            echo $orders[$i]['order_id']
                                            ?></a>
                                        </td>
                                        <td>
                                            <?php

                                            //print_r($orders);

                                            echo $orders[$i]['customer_id']
                                            ?>
                                        </td>
                                        <td>Sakubva</td>
                                        <td>
                                            <?php
                                            //print_r($orders);

                                            echo $orders[$i]['salesrep']
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            //print_r($orders);

                                            echo $orders[$i]['quantity'];
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
		</script>
		<!-- #modal-message -->
							<div class="modal modal-message fade" id="modal-message">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Approve Order</h4>
										</div>
										<div class="modal-body">
											<p>Text in a modal</p>
											<p>Do you want to approve the order ?</p>
											<p>
												<!-- begin #content -->
		
		
			
		<?php
}
		
		?>
											</p>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" class="btn btn-sm btn-primary">Approve</a>
										</div>
									</div>
								</div>
							</div>
		
		<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url('assests/plugins/gritter/js/jquery.gritter.js')?>"></script>
	<script src="<?php echo base_url('assests/js/ui-modal-notification.demo.min.js')?>"></script>
	<script src="<?php echo base_url('asssets/js/apps.min.js')?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->


<?php 
require ('template/footer.php');
?>
		