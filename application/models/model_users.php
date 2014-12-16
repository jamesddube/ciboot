<?php
class Model_users extends CI_Model
{
	public function can_log_in()
	{
		
		$this->db->where('email' , $this->input->post('Email'));
		$this->db->where('password' , md5($this->input->post('Password')));
		
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			echo $row->role;
			
			//codeigniter sessions don't off the security i need

			$_SESSION['logged'] = 'yes';

			$data = array
			(
				'email' => $this->input->post('Email'),
				'is_logged_in' => 1,
				'role' => $row->role,
				'username' => $row->fname." ".$row->surname
			);
			$this->session->set_userdata($data);
			return true;
		}
		else {
			return false;
		}
	}
	
	public function register_user()
	{
		$data = array
		(
			'email' => $this->input->post('rEmail'),
			'fname' => $this->input->post('rFname'),
			'surname' => $this->input->post('rLname'),
			'password' => md5($this->input->post('rPassword')),
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
}

?>