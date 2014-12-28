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
	 * @param $sql
	 * @return mixed
	 */
	function get_order_details($sql)
	{

		$query = $this->db->query ("SELECT * FROM vw_orders WHERE order_id = '$sql'");
		if($query->num_rows()>0)
		{
			$result = $query->result_array ();
			return $result;

		}
		else
		{
			return 'None';
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

	public function order_save()
	{


		//get the details from jquery, we can store the data in the db
		$data1 = array(
			'order_id' => $this->input->post('oi'),
			'customer_id' => $this->input->post('cu'),
			'salesrep' => $this->input->post('rep')
		);
		$data = array(
			'order_id' => 1,
			'customer_id' => 6,
			'sales_rep' => 2
		);



		if ($query = $this->db->insert ('orders',$data1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//===================================================================================================================================

	public function order_add_details($oi)
	{
		//get the details from jquery, we can store the data in the db

		$data = array(
			'order_id' => $oi,
			'product_id' => 3030,
			'quantity' => 15
		);



		if ($query = $this->db->insert ('order_details',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
