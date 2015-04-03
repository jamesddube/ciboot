<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {




	public function Main()
	{

		parent::__construct();

		$this->ciboot_security->admin_security();

	}




//==================================================Start of Controller=============================================================


public function test()
{
	//lets get the customer list from aximos
	$aximos = $this->load->database('aximos',true);

	$data = [
		'username' => $this->session->userdata('username'),
		'cust' => $result


	];

	$query = "SELECT * FROM [tblCustomers]";
	$result = $aximos->query($query);

	$result->result_array();


	$this->load->view('test',$data);
}


//================================================================================================================================
	public function index()
	{
		//$this->load->library('ciboot_security');

			
			if(1==1)
			{
				//$this->load->model('model_products');
				$OA300 = $this->model_orders->order_analytics(300);
				$OA500 = $this->model_orders->order_analytics(500);
				$OA1000 = $this->model_orders->order_analytics(1000);
				$stocks1 = $this->model_products->get_stock_by_cat(300);
				$stocks2= $this->model_products->get_stock_by_cat(500);
				$stocks3 = $this->model_products->get_stock_by_cat(1000);
				$stocks4 = $this->model_products->get_stock_by_cat(2000);
				$this->data['username'] = $this->session->userdata('username');
				$this->data['p300'] = $stocks1;
				$this->data['p500'] = $stocks2;
				$this->data['p1000'] = $stocks3;
				$this->data['p2000'] = $stocks4;
				$this->data['OA300'] = $OA300;
				$this->data['OA500'] = $OA500;
				$this->data['OA1000'] = $OA1000;
				//pass on user info to admin page
				
				$this->load->view('cp_admin',$this->data);
				//$this->load->view('cp_admin',$data);
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




//==================================================                      =============================================================
//==================================================     END OF ORDERS    =============================================================
//==================================================                      =============================================================

	public function map()
	{

			//pass on user info to admin page
				$data = array(
				'username' => $this->session->userdata('username')
				);
			$this->load->view('cp_map', $data);


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


	
//==================================================End of Function===============================================================
//================================================================================================================================



//==================================================Start of Function=============================================================

	public function error404()
	{
		
		
			$this->load->view('404');
	}
	
//==================================================End of Function===============================================================



//==================================================Start of Function===============================================================





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */