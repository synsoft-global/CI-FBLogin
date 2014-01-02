<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function createUser($post)
	{		
		//check for user already registered or not
		$query = $this->db->get_where('facebook_user',array('fb_id'=>$post['fb_id']));		
		if($query->num_rows() == 0)
		{
			//not registered create user
			$this->db->insert('facebook_user',$post);
			$id = $this->db->insert_id();
			if($id)
			{
				//generate password for new user for next time login
				$password = $this->randomPass(); 
				$this->db->where('id',$id);
				$this->db->update('facebook_user',array('user_password'=>md5($password)));
				//an email sent to fb registered user for new password for site
				$this->load->library('email');
				$this->email->from('test.synsoft@mailinator.com', 'Site Name');
				$this->email->to($post['fb_email']);
				$this->email->subject('Site Name Password');
				$this->email->message('Your password:'.$password.'</br> You can change after login');
				$this->email->send();
			}
		}
		//create session for registered user
		$newdata = array(
			   'username'  => $post['fb_uname'],
			   'email'     => $post['fb_email'],
			   'fbid'	   => $post['fb_id'],
			   'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
		return true;		
	}
	
	/*
	Function to check user for normal login
	*/
	function checkUser($post)
	{
		$query = $this->db->get_where('facebook_user',array('fb_uname'=>$post['username'],'user_password'=>md5($post['password'])));
		$result = $query->row_array();
		if($result)
		{
			//create session for registered user
			$newdata = array(
			   'username'  => $result['fb_uname'],
			   'email'     => $result['fb_email'],
			   'fbid'	   => $result['fb_id'],
			   'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			return true;
		}else{
			return false;
		}		
	}
	
	/*
	function to generate  password for fb user
	*/
	function randomPass($length = 8 ){ 
		// makes a random alpha numeric string of a given length 
		$aZ09 = array_merge(range('A', 'Z'), range('a', 'z'),range(0, 9)); 
		$out =''; 
					
			while (strlen($out) < $length)
			{
				$out .= $aZ09[mt_rand(0, count($aZ09)-1)];
			}
		return $out; 
	}
}