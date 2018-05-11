<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends MY_Controller {

    # The constructor class
    function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation' => 'fv'));
    }

	# The Login Page
	public function login()
	{
        $data = array(
            'page_title'    => 'Login',
            'form_action'   => 'login/submit',
            'form'          => array(
                'Email'         => array(
                    'type'          => 'email',
                    'placeholder'   => 'me@example.com',
                    'name'          => 'email',
                    'id'            => 'input-email'
                ),
                'Password'      => array(
                    'type'          => 'password',
                    'placeholder'   => 'password',
                    'name'          => 'password',
                    'id'            => 'input-password'
                )
            ),
            'buttons'       => array(
                'submit'        => array(
                    'type'          => 'submit',
                    'content'       => 'Log In'
                )
            )
        );

	}


    # The Login Submission page
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
        $check = $this->system->check_password($email, $password);

        # 4. If check came back as FALSE, the password is wrong
        if ($check === False)
        {
            echo "The email and password don't match.";
            return;
        }

        # 5. Retrieve the information from the database
        $code = bin2hex($this->encryption->create_key(16));

        # 6. Try to log in.
        $data = $this->system->set_login_data($check, $code);

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

    # The logout page
    public function logout()
    {
        # 1. Remove the login data from the database
        $data = $this->session->userdata;
        $this->system->delete_session($data['id'], $data['session_code']);

        # 2. Remove the information from the session.
        $this->session->unset_userdata(array('id', 'email', 'name', 'surname', 'session_code'));

        # 3. Take the user Home
        redirect('/');
    }


    # The Register Page
	public function register()
	{
        $data = array(
            'page_title'    => 'Register',
            'form_action'   => 'register/submit',
            'form'          => array(
                'Name'          => array(
                    'type'          => 'text',
                    'placeholder'   => 'Joseph',
                    'name'          => 'name',
                    'id'            => 'input-name'
                ),
                'Surname'       => array(
                    'type'          => 'text',
                    'placeholder'   => 'Borg',
                    'name'          => 'surname',
                    'id'            => 'input-surname'
                ),
                'Email'         => array(
                    'type'          => 'email',
                    'placeholder'   => 'me@example.com',
                    'name'          => 'email',
                    'id'            => 'input-email'
                ),
                'Password'      => array(
                    'type'          => 'password',
                    'placeholder'   => 'password',
                    'name'          => 'password',
                    'id'            => 'input-password'
                ),
            ),
            'buttons'       => array(
                'submit'        => array(
                    'type'          => 'submit',
                    'content'       => 'Log In'
                )
            )
        );

        $this->load->view('templates/start', $data);
	}


    
}
