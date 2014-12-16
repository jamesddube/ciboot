<?php 
require ('template/security.php');
require ('template/header.php');

$ps = md5('q');

//echo $ps;

?>




		
		<p>Please enter your details to login</p>
	
		
		<div class="form-group col-lg-4 col-lg-offset-4">
		<div class="menu-container">
			<?php
			//echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			?>
			<h1>Login</h1>
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
			<a href="<?php echo base_url('main/registration')?>">

	<h3>Register</h3>

</a>
			
			</div>
			<br><br><br>
			
		
			
		</div><br>
		</div>
		


</div>

<?php 
require ('template/footer.php');
?>