<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 1/21/2015
 * Time: 12:02 AM
 */

class Ciboot_security {

	/**
	 *  This is a DRY approach to securing the admin section
	 * if you not an admin, get the hell OUT!!!!!!!
	 */
	public function admin_security()
	{
		// Lets grab an instance of codeigniter
		$CI =& get_instance();


		if($CI->session->userdata('logged_in') !== TRUE)
		{
			//User is not logged in, redirect to login

			redirect('auth');
			//echo "login script reached";

			//echo 'redirect : '.$this->session->userdata('logged_in');
			if($CI->session->userdata('role') !== 'admin')
			{
				//User is logged in, but is not an admin
				echo "CI redirect";
				//redirect('restricted');
			}
		}

	}

	public function check()
	{
		return 1;
	}
}