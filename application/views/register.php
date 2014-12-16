<?php 

require ('template/auth_header.php');

$ps = md5('q');



?>


           <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> MBC Admin
                    <small>Please enter your details to log in</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
            	
            	
            	
            	
                <form action="<?php echo base_url('main/register')?>" method="post" class="margin-bottom-0">
                	
                	<?php
                	
                	if(isset($msg))
					{
						echo "<div class='text-success'>";
					
						echo $msg;
						
						echo "</div>";
					}
					else{
                	
					if(validation_errors() != null)
					{
						echo "<div class='alert alert-danger'>";
					
						echo validation_errors();
						
						echo "</div>";
					}
					
					?>
					<div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="First Name" name="rFname"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="Surname" name="rLname"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="email" class="form-control input-lg" placeholder="Email Address" name="rEmail"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" placeholder="Password" name="rPassword" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" placeholder="Confirm Password" name="cPassword" />
                    </div>
                    <div class="form-group m-b-20">
					<label>Role</label><br>
					<select class="form-control input m-b" name="rRole">
						<option  value="user">Preseller</option>
						<option value="admin">Admin</option>
					</select>
				</div>
                    
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Register</button>
                    </div>
                    <div class="m-t-20">
                       Already  a member? Click <a href="<?php echo base_url('main/auth')?>">here</a> to sign in.
                    </div>
                     <?php
                }
                ?>
                </form>
               
            </div>
        </div>
        <!-- end login -->
        
       
        
      
        </div>
	<!-- end page container -->
	
	<?php 

require ('template/auth_footer.php');
?>