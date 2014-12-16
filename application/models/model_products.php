<?php
class Model_products extends CI_Model
{
	 function get_products()
	{
		$query = $this->db->query("SELECT * FROM products");
			
		return $query->result();
			
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
			return $row->Quantity;
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
			return 'No Orders Found';
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
	

}

?>