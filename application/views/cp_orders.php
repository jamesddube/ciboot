

<?php
$title = "Orders";
require ('template/header.php');
require ('template/sidebar.php');

?>


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script type="text/javascript" src="<?php echo base_url('assets/js/ui-modal-notification.demo.min.js')?>" ></script>
<!-- ================== END PAGE LEVEL JS ================== -->


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
                                        <th>Datej</th>
                                        <th>#Order ID</th>
                                        <th>Customer</th>
                                        <th>Route</th>
                                        <th>Sales Rep</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                //count number of items in array
                                $count = count($orders);
                                $tot = 0;
                                for($i = 0;$i<$count;$i++) {


                                ?>
                                    <tr class="t">
                                        <td>
                                            <?php
                                            //print_r($orders);

                                            echo $orders[$i]['date']
                                            ?>
                                        </td>
                                        <td class="23">

                                            <form name="fm"><input type="hidden" id="oid" value="<?php echo $orders[$i]['order_id'] ?>" ></form>
                                            <a  value="8" href="<?php echo base_url('orders/view/'.$orders[$i]['order_id'])?>"
                                                ><?php
                                            //print_r($orders);

                                            echo $orders[$i]['order_id']
                                            ?></a>

                                        </td>
                                        <td>
                                            <?php

                                            //print_r($orders);

                                            echo $orders[$i]['customer_name']
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            //print_r($orders);

                                            echo $orders[$i]['route']
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            //print_r($orders);

                                            echo $orders[$i]['salesrep']
                                            ?>
                                        </td>
                                        <td>
                                            <a href="#modal-process"  data-toggle="modal">
                                                <button class="btn btn-success btn-xs m-r-5 btnproc" value="<?php echo $orders[$i]['order_id']  ?>" >Process</button>
                                            </a>
                                            <button id="oid" class="tt" value="<?php echo $orders[$i]['order_id']  ?>" >Check</button>
                                            <a href="#modal-deny"  data-toggle="modal">
                                                <div class="btn btn-danger btn-xs m-r-5  ">Deny</div>
                                            </a>
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

    <!-- #modal-deny -->
    <div class="modal modal-message fade" id="modal-deny">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modal Message Header</h4>
                </div>
                <div class="modal-body">
                    <p>Text in a modal</p>
                    <p>Do you want to turn on location services so GPS can use your location ?</p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                    <a href="javascript:;" class="btn btn-sm btn-primary">Save Changes</a>
                </div>
            </div>
        </div>
    </div>


    <!-- #modal-alert -->
    <div class="modal fade" id="modal-process">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4>ORDER : <g class="modal-title"></g></h4>
                </div>
                <div class="modal-body">
                    <div class="">

                        <p id="proc"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                    <a href="javascript:;" id="pr" class="btn btn-sm btn-danger" onclick = submit() >Process</a>
                </div>
            </div>
        </div>
    </div>

		
		
			
		<?php
}

		?>



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
<script type="text/javascript">
    function get_qty()
    {
        var order = $("g").val();
        $.post('order_process/'+order,{o:0},
            function(output){
                $('#proc').html(output);
            });
        $('#proc').fadeOut().fadeIn();
        $("#pr").slideToggle();
    }
    function check2()
    {
        var order = $("g").val();
        $.post('ciboot/order_process/'+order,{o:0},
            function(output){
                $('#proc').html(output);
            });
        $('#proc').fadeOut().fadeIn();
        $("#pr").slideToggle();
    }

    function submit()
    {

        $.post('ciboot/submit',{o:0},
            function(output){
                $('#proc').html(output);
            });

    }

    $(document).ready(function(){
        $(".btntproc").click(function(){

            $("g").empty();
            $('#proc').empty();

            var j = $(this).val();
            $("g").attr("value",j);
            $("g").append(j);
            $("#pr").show();




        });
    });
</script>
		