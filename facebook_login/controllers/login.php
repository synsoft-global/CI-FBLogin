<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');	
		$this->load->model('login_model');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$data = $this->input->post();			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_form');
		}
		else
		{
			$reponse = $this->login_model->checkUser($data);
			//print_r($reponse);
			if($reponse)
			{
				$this->load->view('login_success');
			}
		}
		
	}
	
	public function fbLogin()
	{
		//load the facebook library.
		$this->load->library('Facebook');
		$user = null;
	    $user_profile = null;
		
		//create an instance of the Class Facebook here
        $facebook = new Facebook(array(
			'appId'     =>  $this->config->item('appID'),
			'secret'    => $this->config->item('appSecret'),
        ));
        
		//$response=$this->input->get_post(NULL,true);
		//get user's facebook profile here
        $user = $this->facebook->getUser();		
		
        if($user){
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $this->facebook->api('/me');
				print_r($user_profile); 
				
			}catch (FacebookApiException $e){
				show_error(print_r($e, TRUE), 500);
			}
        }
		
		//get the required fileds here
		$data['fb_id'] = $user_profile['id'];
		$data['fb_uname'] = $user_profile['username'];
		$data['fb_email'] = $user_profile['email'];
		$data['fb_user_location'] = $user_profile['location']['name'];
		$reponse = $this->login_model->createUser($data);
		//print_r($reponse);
		$result = $this->session->userdata('logged_in');
		//print_r($result);
		if($reponse)
		{
			$this->load->view('login_success');
		}
		
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */