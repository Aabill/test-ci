<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function index()
	{
		
	}

	public function login()
	{
		$this->load->helper('url');
		$data['title'] = "Login";
		$this->load->view('header', $data);
		$this->load->view('auth/login');
		$this->load->view('footer');
	}

	public function check()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->load->helper('url');
			$data['title'] = "POST";
			$this->load->view('header', $data);
		}
		else
		{
			return;
		}
		$email = $this->input->post();
		$password = $this->input->post();

		return $email;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */