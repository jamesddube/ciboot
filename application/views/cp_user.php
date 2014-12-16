<?php
//require ('template/security_admin.php'); 
//require ('template/security_admin.php'); 
//require ('template/security_admin.php'); 
//require ('template/security_admin.php'); 


require ('template/header.php');

?>




		<h1>Home Page</h1>
		<p>Welcome to the new home page</p>
		<div class="row col-lg-2">
			<div class="menu-container">
				<h2>Statistics</h2>
				
				
				
				
				
				
				
				
				<div class="ibox-content">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Coke</a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                            	300ml (23)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Fanta</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                            	Fanta
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Sparlleta</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				
				
				
				
			</div>
		</div>
		
		<div class="row col-lg-7 col-lg-offset-0">
		<div class="menu-container-large">
			<?php
			//echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			?>
			<h2>Products</h2>
			<div class="ibox-content">
			<div class="col-lg-4 col-lg-offset-0">
			<div class="menu-container"><h2>
			<a href="">Add Product</a>
			</h2></div>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<div class="menu-container"><h2>
			<a href="">View Products</a>
			</h2></div>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<div class="menu-container"><h2>
			<a href="">Delete Product</a>
			</h2></div>
			</div>
			</div>
			<br><br><br>
			
			<!--Presellers-->
			<h2>Presellers</h2>
			<div class="ibox-content">
			<div class="col-lg-4 col-lg-offset-0">
			<div class="menu-container"><h2>
			<a href="">Add Preseller</a>
			</h2></div>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<div class="menu-container"><h2>
			<a href="">View Preseller</a>
			</h2></div>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<div class="menu-container"><h2>
			<a href="">Delete Preseller</a>
			</h2></div>
			</div>
			</div>
		</div><br>
		
		</div><br><br>



<?php 
require ('template/footer.php');
?>