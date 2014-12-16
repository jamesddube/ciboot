<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

//==================================================Start of Function=============================================================
//================================================================================================================================
	public function index()
	{

			
			if($this->session->userdata('role') == 'admin')
			{
				$this->load->model('model_products');
				$stocks1 = $this->getstock(300);
				$stocks2= $this->getstock(500);
				$stocks3 = $this->getstock(1000);
				$stocks4 = $this->getstock(2000);
				$data['username'] = $this->session->userdata('username');
				$data['p300'] = $stocks1;
				$data['p500'] = $stocks2;
				$data['p1000'] = $stocks3;
				$data['p2000'] = $stocks4;
				//pass on user info to admin page
				
				$this->load->view('cp_admin',$data);
			}
			else 
				{
					$this->auth();
				}


		//$this->load->view('index');
		
	}
//==================================================End of Function===============================================================




//==================================================Start of Function=============================================================

	public function getstock($value)
	{
				$this->load->model('model_products');
				$stocks = $this->model_products->get_stocks($value);
				return $stocks;
	}
//==================================================End of Function===============================================================






//==================================================Start of Function=============================================================

	public function cp_admin()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('cp_admin');
		}
		else 
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================





//==================================================Start of Function=============================================================
//================================================================================================================================	
	public function preseller()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('preseller_add');
		}
		else 
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================
//================================================================================================================================




//==================================================Start of Function=============================================================

	public function orders()
	{
		if($this->session->userdata('is_logged_in'))
		{

			//get order info
			$this->load->model('model_products');
			$orders = $this->model_products->get_orders();
			//pass on user info to admin page
				$data = array(
				'username' => $this->session->userdata('username'),
					'orders' => $orders
				);
			$this->load->view('cp_orders', $data);
		}
		else 
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================




//==================================================Start of Function=============================================================

	public function orders_view()
	{
		if($this->session->userdata('is_logged_in'))
		{
			//get order info
			$this->load->model('model_products');
			$orders = $this->model_products->get_order_details('OD001');


			//pass on user info to admin page
				$data = [
				'username' => $this->session->userdata('username'),
					'orders' => $orders

				];
			$this->load->view('cp_orders_view', $data);
		}
		else
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================





//==================================================Start of Function=============================================================
//================================================================================================================================	
	public function map()
	{
		if($this->session->userdata('is_logged_in'))
		{
			//pass on user info to admin page
				$data = array(
				'username' => $this->session->userdata('username')
				);
			$this->load->view('cp_map', $data);
		}
		else 
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================
//================================================================================================================================




//==================================================Start of Function=============================================================
//================================================================================================================================	
	public function admin_template()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('cp_admin_template');
		}
		else 
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================
//================================================================================================================================


//==================================================Start of Function=============================================================
//================================================================================================================================	
	public function order_add()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('cp_order_add');
		}
		else 
			{
				redirect('main/restricted');
			}
	}
//==================================================End of Function===============================================================
//================================================================================================================================




//==================================================Start of Function=============================================================
//================================================================================================================================

	public function auth()
	{
		
		/**if($this->session->userdata('is_logged_in'))
		{
			redirect('main/home');
		}
		else 
			{
				
				$this->load->view('login');
			}**/
		
			$this->load->view('login');
	}
	
//==================================================End of Function===============================================================
//================================================================================================================================



//==================================================Start of Function=============================================================

	public function error404()
	{
		
		
			$this->load->view('404');
	}
	
//==================================================End of Function===============================================================



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
			
			//the user is logged in lets set the session data
			//if($this->session->userdata('role') == 'admin')
			//{
				//$this->load->view('cp_admin');
				//redirect(base_url('main/cp_admin'));
			//}
			//else 
				//{
					//$this->load->view('cp_user');
					//redirect(base_url('main/cp_user'));
				//}
			
			//$_SESSION['logged'] = 'yes';
			$this->index();
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
		redirect('main/auth');
	}
	
	public function restricted()
	{
		$this->load->view('res');
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
		$this->form_validation->set_rules('rLname','Surname','required|trim|alpha');
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
//================================================================================================================================
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */