<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Form extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library(array('session'));
		$this->load->model('user_model');
                $this->load->library('form_validation');
                $this->load->library('session');
        }

public function index()
{
        $data = new stdClass();

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
                        array(
                                'is_unique' => 'This %s already exists.'
                        )
                );

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('myform');
                }
                else
                {
                        $name = $this->input->post('name');
			$email    = $this->input->post('email');
			$pass = $this->input->post('password');
			
			if ($this->user_model->create_user($name, $email, $pass)) {
				
                                // user creation ok
                                
                                //set session

				$this->load->view('formsuccess');
				
			}
                        
                }
}

public function login()
{
        // create the data object
        $data = new stdClass();
        
        //set validation rules

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        
        if ($this->form_validation->run() === false)
        {
                $this->load->view('auth/login', $data);
        }
        else
        {
                $email = $this->input->post('email');
                $pass = $this->input->post('password');

                /* //wewe
                $details['pass'] = $pass;
                $details['email'] = $email;

                
                
                $pass_hash = $this->user_model->validate_user($email,$pass);

                $password = password_verify($pass, $pass_hash);
                if($password)
                {
                        $details['verify'] = true;
                        return $this->load->view('auth/login', $details);
                }
                
                return $this->load->view('auth/login', $details); */
                

                if ($this->user_model->validate_user($email, $pass))
                {
                        $user_id = $this->user_model->get_user_id_from_email($email);
                        $user = $this->user_model->get_user($user_id);

                        

                        $user->id = $this->session->userdata('user_id');
                        $user->name = $this->session->userdata('user_name');
                        

                        
                        return $this->load->view('auth/success');
                }
                else
                {
                        $data->error = 'Wrong email or password.';

                        $this->load->view('auth/login', $data);
                }
        }
        
}
        
}
        
    /* End of file  form.php */
        
                            