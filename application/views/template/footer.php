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
<script src=<?php echo base_url("assets/plugins/morris/raphael.min.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/morris/morris.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js") ?>></script>
<script src=<?php echo base_url("assets/plugins/gritter/js/jquery.gritter.js") ?>></script>
<script src=<?php echo base_url("assets/js/dashboard-v2.min.js") ?>></script>
<script src=<?php echo base_url("assets/js/apps.min.js") ?>></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<!-- ================== BEGIN ORDERS LEVEL JS ================== -->
	<script src=<?php echo base_url("assets/plugins/DataTables-1.10.2/js/jquery.dataTables.js") ?>></script>
	<script src=<?php echo base_url("assets/plugins/DataTables-1.10.2/js/data-table.js") ?>></script>
	<script src=<?php echo base_url("assets/js/apps.min.js") ?>></script>
	<!-- ================== END ORDERS LEVEL JS ================== -->
	


<script>
    $(document).ready(function() {
        App.init();
        DashboardV2.init();
        
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
