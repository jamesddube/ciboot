<?php
class Model_users extends CI_Model
{
	//===================================Users and Registration==========================================
	/**
	 * @return bool
	 */
	public function can_log_in()
	{

		//first of all we have to get the attempted user
		$this->db->where('email' , $this->input->post('Email'));

		
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1) {
			$row = $query->row ();
			//we have found the user lets now compare the password with the encrypted password
			if ($this->verify ($this->input->post('Password'), $row->password) === "yes")
			{

				//codeigniter sessions don't offer the security i need

				$_SESSION['logged'] = 'yes';
				$_SESSION['picture'] = $row->picture;

				$data = array
				(
					'email' => $this->input->post ('Email'),
					'logged_in' => TRUE,
					'role' => $row->role,
					'picture' => $row->picture,
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
			'role' => $this->input->post('rRole'),
            'picture' => 'default_avatar_male.jpg' //default picture, user can change picture later
		);
		
		//$query = $this->db->insert('usersj' , $data);
		
		if ($query= $this->db->insert('users' , $data))
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

	/**
	 * @param $password
	 * @return array the first element being the pasword, second is salt....
	 * but funny thing Blowfish does not need salt....i should remove the salt (*note to self)
	 *
	 * Do not touch!! Its magic!!
	 */
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

	public function get_users($id)
	{
		if('all' === $id)
		{
			$query = $this->db->query("SELECT * FROM users ");

			if($query->num_rows()>0);
			{
				$result = $query->result_array ();
				return $result;
			}
		}
		else
		{
			$query = $this->db->query("SELECT * FROM users WHERE email = '$id'");

			if($query->num_rows()>0);
			{
				$result = $query->result_array ();
				return $result;
			}

		}
	}

}

?>