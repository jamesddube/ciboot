<?php
require ('template/security_admin.php'); 
require ('template/header.php');
require ('template/panel_admin.php');

?>




		
		
		<div class="row col-lg-7 col-lg-offset-2">
		<div class="menu-container-large">
			<?php
			//echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			?>
			<h2>Add Preseller</h2>
			<div class="ibox-content">
				<form action="<?php echo base_url('main/login')?>" method="post">
				<?php
					if(validation_errors() != null)
					{
						echo "<div class='alert alert-danger'>";
					
						echo validation_errors();
						
						echo "</div>";
					}
					
					?>
				
				<div class="form-group">
					<label>Email</label><br>
					<input class="form-control input" type="email" name="Email" >
				</div><br>
				<div class="form-group">
					<label>Password</label><br>
					<input class="form-control input" type="password" name="Password">
				</div><br>
				<div class="form-group">
					<input class="form-control btn btn-primary btn-block" type="submit" name="Submit">
				</div>
			</form>
			
			
			</div>
			<br><br><br>
			
		
			
		</div><br>
		</div>
		</div><br><br>



<?php 
require ('template/footer.php');
?>