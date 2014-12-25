<?php
class Model_products extends CI_Model
{
	 function get_products()
	{
		$query = $this->db->query("SELECT * FROM products order by prodcategory desc");
			
		return $query->result_array();
			
	}

	/**
	 * @param $value
	 * @return mixed
	 */
	function get_stocks($value)
	{
		$query = $this->db->query("SELECT sum(Quantity) as 'Quantity' FROM vw_stocks WHERE ProductCategory = '$value'");
			
		if($query->num_rows()>0);
		{
			$row = $query->row();
			return $row->Quantity > 0 ? $row->Quantity : 0;
		}
			
	}

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
	 * this
	 * @return string
	 * @desc this is a sample
	 */
	function get_orders()
	{

		$query = $this->db->query ("SELECT * FROM orders order by order_id desc");
		if($query->num_rows()>0)
		{
			$result = $query->result_array ();
			return $result;

		}
		else
		{
			return 'No Orders Found';
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

}

?>