<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();

		$this->load->library(array('form_validation' => 'fv'));

	}

	public function index()
	{
		$this->register();
	}

	function register()
	{
		$this->load->model('System_Model');

		$data = array(
			'role_list'		=> $this->system->getRoles(),
			'dropdown_class'	=> array(
			    					'class'	=> 'btn btn-secondary dropdown-toggle'
			)
		);

		//this command loads a view from the views folder
		$this->build('register', $data);
	}

	# The Register Submission page
    public function register_submit()
    {

        # 1. Check the form for validation errors
        if ($this->fv->run('register') === FALSE)
        {
            echo validation_errors();
            return;
        }

        # 2. Retrieve the first set of data
		$idcard		= $this->input->post('idcard');
		$name      	= $this->input->post('name');
        $surname   	= $this->input->post('surname');
		$email		= $this->input->post('email');
		$password   = $this->input->post('password');
		$role      	= $this->input->post('role');

		#3 generate a random keyword for added protection
		$salt 		= bin2hex($this->encryption->create_key(8));

		#4 add to db
		$id = $this->system->add_user($idcard, $name, $surname, $email, $password, $role, $salt);

		#5 if id did not register, something went wrong
		if($id === FALSE){
			echo "We couldn't register the user because of a database error.";
			return;
		}

		redirect ('students');
    }

}
