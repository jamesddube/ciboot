<?php
$username = 'Guest';
require ('template/header.php');
?>




		<h1>Restricted!!</h1>
		<p>The page you are trying to view is restricted</p>
		<p><a href="<?php echo base_url()?>">Back</a></p>
		<pre>
			
			<?php
			echo 'loggedstatus'. $_SESSION['logged'];
			//print_r($this->session->all_userdata());
			
			?>
		</pre>


<?php 
require ('template/footer.php');
?>