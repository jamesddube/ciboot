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


<!-- end page container -->





<script>
    $(document).ready(function() {
        App.init();



    });
</script>

</body>
</html>
