<?php
require ('template/security_admin.php'); 
require ('template/header.php');
require ('template/panel_admin.php');

?>




		
		
		
		<div class="menu-container">
			<?php
			//echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			
			$title = "Orders"
			
			
			
			?>
			<h2><?php echo $title?></h2>
			<div class="ibox-content">
			<div class="col-lg-4 col-lg-offset-0">
			<a href="<?php echo base_url('main/orders_add')?>">
				<div class="menu-container"><h2>
				Add <?php echo $title?>
				</h2></div>
			</a>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<a href="">
				<div class="menu-container"><h2>
				View <?php echo $title?>
				</h2></div>
			</a>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<a href="">
				<div class="menu-container"><h2>
				Delete <?php echo $title?>
				</h2></div>
			</a>
			</div>
			</div>
			<br><br><br>
			
			
			
		</div><br>
		
		<div class="menu-container">
			<?php
			//echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			
			$title = "Routes"
			
			
			
			?>
			<h2><?php echo $title?></h2>
			<div class="ibox-content">
			<div class="col-lg-4 col-lg-offset-0">
			<a href="">
				<div class="menu-container"><h2>
				Add <?php echo $title?>
				</h2></div>
			</a>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<a href="">
				<div class="menu-container"><h2>
				View <?php echo $title?>
				</h2></div>
			</a>
			</div>
			<div class="col-lg-4 col-lg-offset-0">
			<a href="">
				<div class="menu-container"><h2>
				Delete <?php echo $title?>
				</h2></div>
			</a>
			</div>
			</div>
			<br><br><br>
			
			
			
		</div>
		



<?php 
require ('template/panel_admin_foot.php');
require ('template/footer.php');
?>