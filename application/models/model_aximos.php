<?php
/**
 * Created by IntelliJ IDEA.
 * User: Swead
 * Date: 1/7/2015
 * Time: 10:40 PM
 */

class Model_aximos extends CI_Model{

	public function get_customers()
	{
		//lets get the customer list from aximos
		$aximos = $this->load->database('aximos',true);

		$query = "SELECT * FROM tblCustomers";

		if($result = $aximos->query($query))
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}

	}
}