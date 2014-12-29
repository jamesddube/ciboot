<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

//==================================================Start of Function=============================================================

	public function order_process($order)
	{
		//get order details
		//$data['details'] = $this->model_orders->get_order_details('OD0023');
		if($details = $this->model_orders->get_order_details($order))
		{

			//$id = $details[0]['product_id'];
			$data = array ();
			//loop each quantity
			for ($i = 0; $i < count ($details); $i++) {
				$id = $details[$i]['product_id'];

				//add quantity for each row to its particular product
				array_key_exists ($id, $data) ? $data[$id] += $details[$i]['quantity'] : $data[$id] = $details[$i]['quantity'];

			}
			//initialise the array
			$prod = array ();

			//now lets check each product if there is sufficient quantity
			foreach ($data as $key => $value) {
				$stock_qty = $this->model_products->get_stocks_by_id ($key);

				if ($stock_qty > $value) {
					echo $key . '  available<br>';
					$prod[$key] = 'available';
				} else {
					echo $key . ' unavailable required: ' . $value . ' available: ' . $stock_qty . '<br>';
					$prod[$key] = 'unavailable';
				}

			}

			//was there any product with insufficient stock? if yes we cannot proceed
			if (in_array ('unavailable', $prod)) {
				echo 'we cannot process';
			} else
			{
				echo 'we can process';

				foreach ($data as $key => $value)
				{
					$process = $this->model_products->update_stock($key,'-',$value);
					if($process)
					{
						echo 'stock processed<br>';
					}
					else
					{
						echo 'stock not processed : '.$process.'<br>';
					}
				}




			}
			$this->load->view ('test');
		}
		else
		{
			echo 'we could not find the order';
		}
	}



//================================================================================================================================
	public function index()
	{

			
			if($this->session->userdata('role') == 'admin')
			{
				//$this->load->model('model_products');
				$stocks1 = $this->model_products->get_stock_by_cat(300);
				$stocks2= $this->model_products->get_stock_by_cat(500);
				$stocks3 = $this->model_products->get_stock_by_cat(1000);
				$stocks4 = $this->model_products->get_stock_by_cat(2000);
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
				//$this->load->model('model_products');
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
//================================================================================================================================




//==================================================                 =============================================================
//==================================================     ORDERS      =============================================================
//==================================================                 =============================================================




	public function orders()
	{
		if($this->session->userdata('is_logged_in'))
		{

			//get order info
			//$this->load->model('model_products');
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
//=================================================================================================================================




	public function orders_add()
	{
		if($this->session->userdata('is_logged_in'))
		{

			//get salesrep info kkk
			//$this->load->model('model_users');
			$reps = $this->model_users->get_reps('all');

			//get products info
			//$this->load->model('model_products');
			$products = $this->model_products->get_products('all');

			//get customers info
			$cust = $this->model_users->get_customers('all');

			//get new order number
			$order_num = $this->model_orders->get_new_order_number();


			//pass on user info to admin page
				$data = array(
				'username' => $this->session->userdata('username'),
					'reps' => $reps,
					'cust' => $cust,
					'order_num' => $order_num,
					'products' => $products
				);
			$this->load->view('cp_orders_add', $data);
		}
		else
			{
				redirect('main/restricted');
			}
	}


//=================================================================================================================================


	/**
	 * @param $key
	 */
	public function orders_view($key)
	{   //check if user is logged in
		if($this->session->userdata('is_logged_in'))
		{
			//get order info

			$orders = $this->model_orders->get_order_details($key);



			//pass on user info to admin page
				$data = [
				'username' => $this->session->userdata('username'),
					'orders' => $orders,
					'key' => $key

				];
			$this->load->view('cp_orders_view', $data);
		}
		else
			{
				redirect('main/restricted');
			}
	}


//====================================================================================================================================

	/**
	 *
	 */
	public function o_add()
	{
		//echo rand(89,900)." ".$this->input->post('qty')." ".$this->input->post('oi')." ".$this->input->post('prod');
		$oi = $this->input->post('oi');
		$prod = $this->input->post('prod');
		$qty = $this->input->post('qty');
		$data = array(
			'order_id' => $oi,
			'product_id' => $prod,
			'quantity' => $qty
		);

		if($this->model_orders->order_add_details($data))
		{
			echo "<div class='alert alert-success text-center'>Saved </div>";
		}

	}

//====================================================================================================================================

	public function jq_order_qty()
	{
		//recieve order id
		$oi = $this->input->post('oi');

		//get order details from db
		$details= $this->model_orders->get_order_details($oi);

		//count all entries for the order
		$count = count($details);
		$qty = 0;

		for ($i=0;$i<$count;$i++)
		{
			$qty = $qty + $details[$i]['quantity'];
		}

		//display back to the page
		echo "<div class='modal-title' ><b>$qty</b></div>";
	}
//====================================================================================================================================

	/**
	 *
	 */
	public function order_save()
	{

		$oi = $this->input->post('oi');

		//get salesrep info kkk
		//$this->load->model('model_users');
		$reps = $this->model_users->get_reps('all');

		//get products info
		//$this->load->model('model_products');
		$products = $this->model_products->get_products('all');

		//get customers info
		$cust = $this->model_users->get_customers('all');

		//get new order number
		$order_num = $this->model_orders->get_new_order_number();

		//pass on user info to admin page
		$data = array(
			'username' => $this->session->userdata('username'),
			'reps' => $reps,
			'cust' => $cust,
			'order_num' => $order_num,
			'products' => $products
		);

		/** @var TYPE_NAME $this */
		if( $this->model_orders->order_save())
		{
			$data['orders'] = $this->model_orders->get_order_details($oi);
			$data['msg'] =  "<div class='alert alert-success text-center'>Order Saved</div>";
			$data['saved_state'] = 1;
			$data['username'] = $this->session->userdata('username');
			$data['order_num'] = $oi;

			$this->load->view('cp_orders_add',$data);
		}
		else
		{
			$data['msg'] =  "<div class='alert alert-danger text-center'>Order Not Saved</div>";
			$data['saved_state'] = 0;
			$data['username'] = $this->session->userdata('username');
			$data['order_num'] = $oi;

			$this->load->view('cp_orders_add',$data);
		}

	}


//======================================================================================================================================


	//public function order_process()
//{
	//$this->model_orders
	//echo "<div class='alert alert-success text-center'>Order Processed</div>";
//}
//======================================================================================================================================

	public function order_add()
	{
		if($this->session->userdata('is_logged_in'))
		{
			//$this->load->view('cp_order_add');
			//$this->load->view('jq');
		}
		else
		{
			redirect('main/restricted');
		}
	}



//==================================================                      =============================================================
//==================================================     END OF ORDERS    =============================================================
//==================================================                      =============================================================

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




//==================================================Start of Function=============================================================
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


//==================================================Start of Function=============================================================

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



//==================================================Start of Function===============================================================





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */