<?php 
require ('template/security.php');
require ('template/header.php');

$ps = md5('q');

//echo $ps;
if(isset($msg))
{
	echo $msg;
}
else{
?>




		<h1>Registration</h1>
		<p>Please enter your details to register</p>
		
		<div class="form-group col-lg-4 col-lg-offset-4">
			
			
			
			<form action="<?php echo base_url('main/register')?>" method="post">
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
					<input class="form-control input" type="email" name="rEmail" >
				</div><br>
				<div class="form-group">
					<label>Password</label><br>
					<input class="form-control input" type="password" name="rPassword">
				</div><br>
				
				<div class="form-group">
					<label>Confirm Password</label><br>
					<input class="form-control input" type="password" name="cPassword">
				</div><br>
				<div class="form-group">
					<label>Role</label><br>
					<select class="form-control input m-b" name="rRole">
						<option  value="user">Preseller</option>
						<option value="admin">Admin</option>
					</select>
				</div><br>
				<div class="form-group">
					<input class="form-control btn btn-primary btn-block" type="submit" name="Submit">
				</div>
			</form>
		


</div>

<?php 
}

require ('template/footer.php');
?>