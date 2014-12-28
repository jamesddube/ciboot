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
			return 'nothing';
		}

	}



	public function order_save()
	{


		//get the details from jquery, we can store the data in the db
		$data = array(
			'order_id' => $this->input->post('oi'),
			'customer_id' => $this->input->post('cu'),
			'sales_rep' => $this->input->post('rep')
	);

		$query = $this->db->insert('orders' , $data);

		if ($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

?>