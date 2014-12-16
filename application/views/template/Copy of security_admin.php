<?php 

session_start();

if($this->session->userdata('is_logged_in') != true)
		{
			redirect(base_url('main/auth'));
	
		}
		/**
		if(!isset($_SESSION['logged']))
		{
			//redirect(base_url('main/auth'));
	
		}

//lets check if this is an admin user**/

?>

