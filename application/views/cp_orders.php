

<?php
$title = "Orders";
require ('template/header.php');
require ('template/sidebar.php');

?>

	<!-- ================== BEGIN PAGE-Modals LEVEL STYLE ================== -->
    <link href="<?php echo base_url('assets/plugins/gritter/css/jquery.gritter.css')?>" rel="stylesheet" />
	<!-- ================== END PAGE LEsVEL STYLE ================== -->


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
                        <!-- if no orders were found -->
			        <?php
                        if($orders==='nothing')
                        {
                            echo "<div class='alert alert-danger text-center'>No Orders Available, are the sales reps sleeping on the job?</div>";
                        }
                    else{
                    ?>
                            <table class="table table-condensed  table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>#Order ID</th>
                                        <th>Customer</th>
                                        <th>Route</th>
                                        <th>Sales Rep</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                //count number of items in array
                                $count = count($orders);
                                $tot = 0;
                                for($i = 0;$i<$count;$i++) {


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

		
		
			
		<?php
}
		
		?>

		
		<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url('assests/plugins/gritter/js/jquery.gritter.js')?>"></script>
	<script src="<?php echo base_url('assests/js/ui-modal-notification.demo.min.js')?>"></script>
	<script src="<?php echo base_url('asssets/js/apps.min.js')?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->


<?php 
require ('template/footer.php');
?>
		