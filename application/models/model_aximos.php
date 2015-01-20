<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 1/7/2015
 * Time: 10:40 PM
 */

class Model_aximos extends CI_Model
{
	public $aximos;
	public function Model_aximos()
	{
		parent::__construct();
		$this->aximos = $this->load->database('aximos',true);
	}


	public function get_customers()
	{
		//lets get the customer list from aximos
		$query = "SELECT * FROM tblCustomers";

		if($result = $this->aximos->query($query))
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}

	}

	public function get_product_details($code)
	{
		if($code==='all')
		{
			if($query = $this->aximos->query("SELECT TOP 1000 * FROM [AXIMOSMBC].[dbo].[tblProducts]"))
			{
				if($query->num_rows()>0)
				{
					return $query->result_array();

				}
				else
				{
					return false;
				}
			}

		}
		else
		{
			if($query = $this->aximos->query("SELECT TOP 1000 * FROM [AXIMOSMBC].[dbo].[tblProducts] where Code = '$code'"))
			{
				if($query->num_rows()>0)
				{
					return $query->row();

				}
				else
				{
					return false;
				}
			}

		}
	}
}