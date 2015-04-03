<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 12/27/2014
 * Time: 11:34 AM
 */

class Model_orders extends CI_Model
{
	/**
	 * @param $id
	 * @internal param $sql
	 * @return mixed
	 */
	function get_order_details($id)
	{
		if($this->order_exists($id))
		{
			$query = $this->db->query ("SELECT * FROM vw_order_details WHERE order_id = '$id'");

			//get product info from aximos
			if($query->num_rows()>0)
			{
				$result = $query->result_array ();

				//get product info from aximos
				return $result;

			}
			else
			{
				return false;
			}
		}

	}


	/**
	 * @param $status
	 * @return string
     */
	function get_orders($status)
	{
		if($status == null or "")
		{
			$status = 'unprocessed';

		}
		elseif($status == "processed")
		{
			$status = 'processed';

		}

		$query = $this->db->query ("SELECT * FROM vw_orders where deleted = 0  and `status` = '$status' order by order_id desc");
		if($query->num_rows()>0)
		{
			$result = $query->result_array ();
			return $result;

		}
		else
		{
			return 'nothing';
		}

	}





	/**
	 * @return string
	 */
	public function get_new_order_number()
	{
		$query = $this->db->query("SELECT count(order_id) as 'Quantity' FROM orders");
		if($query->num_rows()>0)
		{
			$results = $query->row();

			//generate new order number, we have the number of orders so we just allocate the next one
			$results->Quantity += 1;
			//fill in the zero placeholders
			//eg. OD0006 instead of OD6
			$new = 'OD'.sprintf("%04d", $results->Quantity);




			return $new;

		}
		else
		{
			return 'none';
		}
	}

	public function order_save($oi,$cu,$rep)
	{


		//get the details from jquery, we can store the data in the db
		$data = array(
			'order_id' => $oi,
			'customer_id' => $cu,
			'salesrep' => $rep,

		);




		if ($query = $this->db->insert ('orders',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//===================================================================================================================================

	public function order_add_details($data)
	{

		//get the details from jquery, we can store the data in the db

		if ($query = $this->db->insert ('order_details',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * @param $id order id
	 * @return bool
	 */
	public function order_exists($id)
	{
		$query = $this->db->query("SELECT * FROM orders WHERE order_id = '$id'");

		return $query->num_rows()===1? true : false;

	}
	public function update_order($operation, $order)
	{
		if($operation === 'process')
		{
			return $this->db->query ("UPDATE orders SET `status`='processed' WHERE `order_id`='$order'") ? true : false;

		}

	}
	public function order_analytics($packsize)
	{

		//set the initial date
		$startdate =  date('y-01-01');
		$enddate =  date('y-02-01');
		for ($i = 0; $i < 12 ; $i++ )
		{

			$query = $this->db->query("select sum(quantity) as 'quantity' from vw_order_details where `date` between '$startdate' and '$enddate' and packsize = $packsize ");

			$row = $query->row ();
			if($row->quantity>0) {
				$analytics[$i] = $row->quantity;

			}
			else
			{
				$analytics[$i] = 0;
			}

			$startdate = date ('Y-m-d', strtotime ("+1 months", strtotime ($startdate)));
			$enddate = date ('Y-m-d', strtotime ("+1 months", strtotime ($enddate)));
		}
		return $analytics;

		//get the first month

		//

	}
}
