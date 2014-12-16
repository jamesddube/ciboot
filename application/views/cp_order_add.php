<?php

require ('template/panel_admin.php');

?>


		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			
			<!-- begin row -->
			 <!-- begin col-6 -->
			    <div class="col-md-6 col-lg-offset-3" >
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Form Horizontal</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="http://seantheme.com/" method="POST">
                                <fieldset>
                                    <legend>Add New Order</legend>
                                    <div class="form-group">
		                                    <label class="col-md-4 control-label">Preseller</label>
		                                    <div class="col-md-8">
		                                        <select class="form-control">
		                                            <option>1</option>
		                                            <option>2</option>
		                                            <option>3</option>
		                                            <option>4</option>
		                                            <option>5</option>
		                                        </select>
		                                    </div>
                                	</div>
                                	<div class="form-group">
		                                    <label class="col-md-4 control-label">Route</label>
		                                    <div class="col-md-8">
		                                        <select class="form-control">
		                                            <option>1</option>
		                                            <option>2</option>
		                                            <option>3</option>
		                                            <option>4</option>
		                                            <option>5</option>
		                                        </select>
		                                    </div>
                                	</div>
                                    <div class="form-group">
		                                    <label class="col-md-4 control-label">Product</label>
		                                    <div class="col-md-8">
		                                        <select class="form-control">
		                                            <option>1</option>
		                                            <option>2</option>
		                                            <option>3</option>
		                                            <option>4</option>
		                                            <option>5</option>
		                                        </select>
		                                    </div>
                                	</div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password</label>
                                        <div class="col-md-8">
                                            <input type="password" class="form-control" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" /> Check me out
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-sm btn-primary m-r-5">Login</button>
                                            <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
			<!-- end row -->
			
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
       
        
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	<?php

require ('template/panel_admin_foot.php');

?>

