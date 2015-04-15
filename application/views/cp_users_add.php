<?php
/**
 * Created by IntelliJ IDEA.
 * User: james
 * Date: 4/13/15
 * Time: 6:05 PM
 */
$ci =& get_instance();
$title = "Users";
require ('template/header.php');
require ('template/sidebar.php');
?>
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url('assets/plugins/bootstrap-wizard/css/bwizard.min.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/plugins/parsley/src/parsley.css') ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

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
                <h4 class="panel-title">Form Wizards</h4>
            </div>
            <div class="panel-body">
                <form action="http://seantheme.com/" method="POST" data-parsley-validate="true" name="formwizard">
                    <div id="wizard">
                        <ol>
                            <li>
                                Personal Information
                                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
                            </li>
                            <li>
                                Contact Information
                                <small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small>
                            </li>
                            <li>
                                Login Credentials
                                <small>Phasellus lacinia placerat neque pretium condimentum.</small>
                            </li>
                            <li>
                                Completed
                                <small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
                            </li>
                        </ol>
                        <!-- begin wizard step-1 -->
                        <div class="wizard-step-1">
                            <fieldset>
                                <legend class="pull-left width-full">Personal Identification</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group block1">
                                            <label>First Name</label>
                                            <input id="textbox_id" type="text" name="rFname" placeholder="John" class="form-control" data-parsley-group="wizard-step-1" required />
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle Initial</label>
                                            <input type="text" name="middle" placeholder="A" class="form-control" data-parsley-group="wizard-step-1" required />
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="rLname" placeholder="Smith" class="form-control" data-parsley-group="wizard-step-1" required />
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-1 -->
                        <!-- begin wizard step-2 -->
                        <div class="wizard-step-2">
                            <fieldset>
                                <legend class="pull-left width-full">Contact Information</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="rEmail" placeholder="someone@example.com" class="form-control" data-parsley-group="wizard-step-2" data-parsley-type="email" required />
                                        </div>
                                    </div>
                                    <!-- end col-6 -->
                                    <!-- begin col-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <select class="form-control input m-b" name="rRole">
                                                <option  value="user">Preseller</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end col-6 -->

                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-2 -->
                        <!-- begin wizard step-3 -->
                        <div class="wizard-step-3">
                            <fieldset>
                                <legend class="pull-left width-full">Login Credentials</legend>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <div class="controls">
                                                <input type="text" name="username" placeholder="johnsmithy" class="form-control" data-parsley-group="wizard-step-3" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pasword</label>
                                            <div class="controls">
                                                <input type="password" name="rPassword" placeholder="Your password" class="form-control" data-parsley-group="wizard-step-3" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-4 -->
                                    <!-- begin col-4 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confirm Pasword</label>
                                            <div class="controls">
                                                <input type="password" name="cPassword" placeholder="Confirmed password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-6 -->

                                </div>
                                <!-- end row -->
                            </fieldset>
                        </div>
                        <!-- end wizard step-3 -->
                        <!-- begin wizard step-4 -->
                        <div>
                            <div class="jumbotron m-b-0" id="results">
                                <h1>Thats All...</h1>
                                <p>All the necessary user data has been collected successfully, click the button below to add the user</p>
                                <p><input type="button" class="btn btn-success btn-lg" value="Add user" onclick="showAlert()"></p>
                            </div>
                        </div>
                        <!-- end wizard step-4 -->
                    </div>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row -->
</div>
<!-- end #content -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url('assets/plugins/parsley/dist/parsley.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-wizard/js/bwizard.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/form-wizards-validation.demo.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/apps.min.js') ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        FormWizardValidation.init();

    });
</script>
<script type="text/javascript">

    function add() {
        $.post('jqueryAdd.php',{rFame:formwizard.rFname},
            function(output){
                $('#results').html(output);
            });

    }
    function showAlert()
    {
        var fname = document.getElementById('textbox_id').value;
        $.post('jqueryAdd',{rFname:fname},
            function(output){
                $('#results').html(output);
            });
    }
</script>

</body>
</html>
