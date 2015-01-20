<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 1/12/2015
 * Time: 9:54 PM
 */

class Orders Extends CI_Controller {

	private $logged = "not set";
	private $order;

	public function __construct()
	{

		echo "order construct called";
		parent::__construct();
		$this->ciboot_security->admin_security();

		$this->load->model('model_aximos');

		if($this->session->userdata('is_logged_in'))
		{
			 $this->logged="yes";
		}
		else
		{
			 $this->logged="no";
		}

	}

//==================================================                 =============================================================
//==================================================     ORDERS      =============================================================
//==================================================                 =============================================================




	public function index()
	{
		if($this->session->userdata('role') !=='admin')
		{

			//get order info mmmm
			$orders = $this->model_orders->get_orders('unprocessed');



			//pass on user info to admin page
			$data = array(
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


	public function indexw()
	{
		$this->load->view("test");
		//$this->load->view("test");
	}

	public function add()
	{
		//if($this->session->userdata('logged_in'))
		if(1==1)
		{
			//lets get the customer list from aximos
			//$this->load->model('model_aximos');

			$ax_cust = $this->model_aximos->get_customers();



			//get salesrep info kkk
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
				//'cust' => $cust,
				'cust' => $ax_cust,
				'order_num' => $order_num,
				'products' => $products
			);
			$this->load->view('cp_orders_add', $data);
		}
		else
		{
			redirect('restricted');
		}
	}


//======================================================================================================================================

public function processed()
{
	//get order info
	$orders = $this->model_orders->get_orders("processed");



	//pass on user info to admin page
	$data = array(
		'orders' => $orders
	);
	$this->load->view('cp_orders', $data);
}






//======================================================================================================================================

	public function save()
	{

		$oi = $this->input->post('oi');
		$cu = $this->input->post('cu');
		$rep = $this->input->post('rep');


		if($this->model_orders->order_save($oi,$cu,$rep))
		{
			echo "<div class='well bg-white'>";
			echo "<div class='alert alert-success text-center'>order was saved</div> ";
			echo "<a  href='#modal-dialog' data-toggle='modal'><div  name='middle' class='btn btn-block btn-success'>Add Product</div></a><br>";
			echo "</div>";

			?>
			</div>


		<?php
		}
		else
		{
			echo "order was not saved";
		}
		/*
		if
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

		/** @var TYPE_NAME $this
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
		*/


	}
	//====================================================================================================================================

	/**
	 *
	 */
	public function jquery_add()
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
		else
		{
			echo "<div class='alert alert-success text-center'>Error Saving </div>";
		}


	}

//====================================================================================================================================

	public function jquery_populate()
	{
		/**
		 * This function populates the order details table
		 * as products are added to the order
		 */


		$oi = $this->input->post('oi');

		if($details = $this->model_orders->get_order_details($oi))
		{
			//print_r($details);
			//populate table with order details
			//get product info from aximos for each order item
			for($i=0;$i<count($details);$i++)
			{
				$code = $details[$i]['product_id'];
				if($row = $this->model_aximos->get_product_details($code))
				{
					$details[$i]['prodname'] = $row->Description;
					// debugging echo "you found me $i: $row->Description<br>";
				}

			}

			?>

			<div class="well bg-white">
			<div class="panel-body">
			<table class="table table-condensed table-hover">
				<tr class="info">
					<thead>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Quantity</th>
					</thead>
				</tr>
				<?php
				for($i=0;$i<count($details);$i++)
				{
					?>
				<tr>
					<tbody class="success">
					<td><?php echo $details[$i]['product_id']  ?></td>
					<td><?php echo $details[$i]['prodname']  ?></td>
					<td><?php echo $details[$i]['quantity']  ?></td>
					</tbody>
				</tr>
				<?php } ?>
			</table>
			</div>
			</div>
			<?php

		}
		else
		{
			echo "an error occurred trying to retrieve order details";
		}
	}

//====================================================================================================================================





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




}