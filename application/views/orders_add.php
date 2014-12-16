<?php
require ('template/security_admin.php'); 
require ('template/header.php');
require ('template/panel_admin.php');

?>


<div class="form-group col-lg-7 col-lg-offset-3 ">
		<div class="menu-container">
			<?php
			//echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			?>
			<h1>Add New Order</h1>
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
					<label>Product</label><br>
					<select class="form-control input m-b" name="rRole">
				
							<?php 
								foreach($results as $row)
								{
									echo "<option value=".$row->prodname.">".
									 $row->prodname." ".$row->prodcategory."(ml)</option>";
								}
									
							?>
						
					</select>
				</div><br>
				<div class="form-group">
					<label>Quantity</label><br>
					<input class="form-control input" type="number" name="Password">
				</div><br>
				<div class="form-group">
					<input class="form-control btn btn-primary btn-block" type="submit" name="Submit">
				</div>
			</form>
			<a href="<?php echo base_url('main/registration')?>">

	<h3>Register</h3>

</a>
			
			</div>
			<br><br><br>
			
		
			
		</div><br>
		</div>

<?php 
require ('template/panel_admin_foot.php');
require ('template/footer.php');
?>