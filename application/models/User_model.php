<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User_model extends CI_Model {


    public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
                        
    
    

    public function hash_pass($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }

    public function verify_pass_hash($pass, $hash)
    {
        return password_verify($pass, $hash);
    }


    public function validate_user($email, $pass)
    {
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $hash = $this->db->get()->row('password');

        return $hash;
        /* return $this->verify_pass_hash($pass, $hash); */
    
    }

    public function create_user($name, $email, $pass)
    {
        $data = array(
            'name'  => $name,
            'email' => $email,
            'password' => $this->hash_pass($pass),
            'created_at' => date('Y-m-j H:i:s')
        );

        return $this->db->insert('users', $data);
    }

    public function get_user($id)
    {
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function get_user_id_from_email($email)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->get()->row('id');
    }
                        
                            
                        
}
                        
/* End of file user.php */
    
                        