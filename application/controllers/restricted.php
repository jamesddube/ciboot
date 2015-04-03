<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 1/20/2015
 * Time: 10:30 PM
 */

class Restricted Extends CI_Controller {

	public function index()
	{
		print_r($this->session->all_userdata());
		$this->load->view('res');
	}
}