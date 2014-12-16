<?php 

//session_start();
echo 'security';
if($this->session->userdata('is_logged_in'))
		{
			//$this->load->view('index');
			redirect(base_url('main/home'));
			
		}

//lets check if this is an admin user
/**if($this->session->userdata('is_logged_in') != true)
		{
			redirect(base_url('main/auth'));
	
		}
		/**
		if(isset($_SESSION['logged']))
		{
			redirect(base_url('main/home'));
	
		}**/
?>

