
<?php
$ci =& get_instance();
$title = "Users";
require ('template/header.php');
require ('template/sidebar.php');
?>

<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Dashboard v2</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Dashboard v2 <small>header small text goes here...</small></h1>
	<!-- end page-header -->



	<div class="row">
		<!-- begin col-4 -->


		<!-- end col-4 -->
		<!-- begin col-4 -->
		<div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">New Registered Users <span class="pull-right label label-success">24 new users</span></h4>
				</div>



				<ul class="registered-users-list clearfix">
					<?php
					for ($i=0;$i< count($users); $i++)
					{?>
						<li>
							<a href="javascript:;"><img src="<?php echo base_url('assets/img/users/'.$users[$i]['picture'])?>" height="128" width="128" alt="" /></a>
							<h4 class="username text-ellipsis">
								<?php echo $users[$i]['fname'].' '.$users[$i]['surname']; ?>
								<small>Algerian</small>
							</h4>
						</li>
					<?php
					}
					?>

				</ul>
				<div class="panel-footer text-center">
					<a href="javascript:;" class="text-inverse">View All</a>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-4 -->
	</div>
	<!-- end row -->
</div>
<!-- end #content -->

<?php
require ('template/footer.php');
?>