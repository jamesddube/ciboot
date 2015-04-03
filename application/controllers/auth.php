<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 *
	 */
	public function index()
	{

		$this->load->view('login');
	}




	//validation
	public function login()
	{
		session_start();
		//set validation rules
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Email','Email','required|xss_clean|trim|callback_validate_credentials');
		$this->form_validation->set_rules('Password','Password','required|md5|trim');

		if($this->form_validation->run())
		{
			redirect('/','location');

		}
		else
		{
			$this->load->view('login');
		}
	}
//==================================================End of Function===============================================================
//================================================================================================================================



//==================================================Start of Function=============================================================
//================================================================================================================================

	public function validate_credentials()
	{
		$this->load->model("model_users");


		if($this->model_users->can_log_in())
		{
			$this->logged_in = TRUE;
			$this->data['role_class'] = TRUE;
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Invalid Username/Password');
			return false;
		}
	}
//==================================================End of Function===============================================================
//================================================================================================================================




//==================================================Start of Function=============================================================
//================================================================================================================================

	public function register_user()
	{
		$this->load->model("model_users");


		if($this->model_users->register_user())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('register_user', 'Could not register user!');
			return false;
		}
	}
//==================================================End of Function===============================================================
//================================================================================================================================





//==================================================Start of Function=============================================================
//================================================================================================================================
	public function logout()
	{
		$this->session->sess_destroy();

		//destroy my custom session
		session_destroy();
		redirect('auth');
	}


//==================================================End of Function===============================================================
//================================================================================================================================
	public function registration()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->index();
		}
		else
		{
			$this->load->view('register');
		}

		//$this->load->view('register');
	}
//==================================================End of Function===============================================================
//================================================================================================================================
	public function register()
	{
		//set validation rules
		$this->load->library('form_validation');
		$this->form_validation->set_rules('rEmail','Email','required|xss_clean|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('rPassword','Password','required|trim');
		$this->form_validation->set_rules('rFname','First Name','required|trim');
		$this->form_validation->set_rules('rLname','Surname','required|trim');
		$this->form_validation->set_rules('cPassword','Confirm Password','required|matches[rPassword]');

		if($this->form_validation->run())
		{

			$this->load->model('model_users');

			if($this->model_users->register_user())
			{
				$data['msg'] =  "<h1>Registration success</h1>";
				$this->load->view('register',$data);
			}

			//redirect(base_url('main/home'));
		}
		else
		{
			echo "Registration failed";
			$this->load->view('register');
		}
	}
//==================================================End of Function===============================================================

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */