<?php
class Model_users extends CI_Model
{
	public function can_log_in()
	{
		$swead_hash = '$2y$11$e6df8c61a497cfcc3ff56Oog4E9V81oFWNa5H0IW7mFC3ywv62l9K';
		//first of all we have to get the exact salt for the attempted user
		$this->db->where('email' , $this->input->post('Email'));
		//$this->db->where('password' , md5($this->input->post('Password')));
		
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1) {
			//we have found the user lets now compare the password with the encrypted password
			$row = $query->row ();


			if ($this->verify ($this->input->post('Password'), $row->password) === "yes")
			{



				//codeigniter sessions don't off the security i need

				$_SESSION['logged'] = 'yes';

				$data = array
				(
					'email' => $this->input->post ('Email'),
					'is_logged_in' => 1,
					'role' => $row->role,
					'username' => $row->fname . " " . $row->surname
				);
				$this->session->set_userdata ($data);
				return true;
			}
		}
		else
		{
			return false;
		}
	}
	
	public function register_user()
	{
		//first lets secure the password
		$this->load->model('model_users');

		$hashed_pass = $this->model_users->generatehash($this->input->post('rPassword'));

		//the password is now secure, we can store the data in the db
		$data = array
		(
			'email' => $this->input->post('rEmail'),
			'fname' => $this->input->post('rFname'),
			'surname' => $this->input->post('rLname'),
			'password' => $hashed_pass[0],
			'salt' => $hashed_pass[1],
			'role' => $this->input->post('rRole')
		);
		
		$query = $this->db->insert('users' , $data);
		
		if ($query)
		{
			return true;
		}
		else 
			{
				return false;
			}
	}

	public function get_reps($id)
	{
		if('all' === $id)
		{
			$query = $this->db->query("SELECT * FROM salesrep ");

			if($query->num_rows()>0);
			{
				$result = $query->result_array ();
				return $result;
			}
		}
		else
		{
			$query = $this->db->query("SELECT * FROM salesrep WHERE id = '$id'");

			if($query->num_rows()>0);
			{
				$result = $query->result_array ();
				return $result;
			}

		}
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_customers($id)
	{
		if('all' === $id)
		{
			$query = $this->db->query("SELECT * FROM customers ");

			if($query->num_rows()>0);
			{
				$result = $query->result_array ();
				return $result;
			}
		}
		else
		{
			$query = $this->db->query("SELECT * FROM customers WHERE customer_id = '$id'");

			if($query->num_rows()>0);
			{
				$result = $query->result_array ();
				return $result;
			}

		}
	}

	public function generateHash ($password)
	{
		if (defined ("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
			$salt = '$2y$11$' . substr (md5 (uniqid (rand (), true)), 0, 22);
			// crypt($password, $salt);
			return $result = array (crypt ($password, $salt), $salt);
		}
	}

	public function verify ($password, $hashedPassword)
	{
		return crypt ($password, $hashedPassword) === $hashedPassword ? "yes" : "no";
	}

}

?>