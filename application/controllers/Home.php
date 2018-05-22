<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('login');
	}

	public function login_submit()
    {
        # 1. Check the form for validation errors
        if ($this->fv->run('login') === FALSE)
        {
            echo validation_errors();
            return;
        }

        # 2. Retrieve data for checking
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        # 3. Use the system model to verify the password
        # This avoids exposing information.
        $check = $this->login->check_password($email, $password);

        # 4. If check came back as FALSE, the password is wrong
        if ($check === False)
        {
            echo "The email and password don't match.";
            return;
        }

        # 5. Retrieve the information from the database
        $code = bin2hex($this->encryption->create_key(16));

        # 6. Try to log in.
        $data = $this->login->set_login_data($check, $code);

        # 7. If there's an error, stop here
        if($data === FALSE)
        {
            echo "We could not log you in";
            return;
        }

        # 8. We'll check back in an hour
        $data['refresh'] = time() + 60 * 60;

        # 9. Write everything to CodeIgniter's cookies
        $this->session->set_userdata($data);

        # 10. Redirect home
        redirect('students');

    }


	#This will go in MY_Controller
	/*protected function nav_links()
	{
		$nav = array();
		$nav['Home']	= '/';


		if ($this->has_permission('ACCESS_SECRET_PAGE'))
		{
			$nav['Secret'] = 'secret';
		}

		if ($this->has_permission('Testing'))
		{
			$nav['Nonexistent'] = 'fake/page';
		}

		return $nav;
	}
	*/
}
