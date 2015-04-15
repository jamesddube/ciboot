<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 1/7/2015
 * Time: 8:51 PM
 */

class Users extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('role')==='admin')
		{

			//get users from database

			$data = array(
				'username' => $this->session->userdata('username'),
				'users' => $this->model_users->get_users('all')
			);
			$this->load->view('cp_users',$data);
		}
		else
		{
			redirect('restricted');
		}
	}
    public function addUser()
    {
        $this->load->view('cp_users_add');
    }
    public function jqueryAdd()
    {
        echo "received". $this->input->post('rFname');
    }

}