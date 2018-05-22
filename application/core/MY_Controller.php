<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    //this will load right before the
    //controllers we have in controllers folder
    //magic method
    //is called/used when the class loads


    function __contruct(){
        //required
        //load the parent into its child
        //will add the plugins from autoload
        parent:: __contruct();
        $this->can_access();
        $this->config->load('permissions');

    }

    //we can use this to replace $this->load->view
    function build($pages = NULL, $data = NULL){

        $start = array(
            'nav'       => $this->nav_links()
        );

        $this->load->view('templates/start', $start);
        $this->load->view($pages, $data);
        $this->load->view('templates/end');
    }

    //use an associative array for the navigation
    function nav_links(){
        return array(
            'Student Profile'                      => 'students',
            'Forms'                                => 'forms',
            'Timetables'                           => 'timetables',
            'Lectures'                             => 'lectures',
            'Vacancies'                             => 'jobs',
            'News'                                 => 'news'
        );
    }

    protected function stud_edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'students/add'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'students/delete_user'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'students/update'
			)
		);
	}

    protected function job_edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'jobs/add'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'jobs/boop'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'jobs/update'
			)
		);
	}

    protected function news_edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'news/add'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'news/boop'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'news/update'
			)
		);
	}

    protected function tt_edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'timetables/add'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'timetables/boop'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'timetables/update'
			)
		);
	}

    protected function lect_edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'lectures/add'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'lectures/boop'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'lectures/update'
			)
		);
	}

    protected function form_edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'forms/add'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'forms/boop'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'forms/update'
			)
		);
	}

    # Can the user access this page?
    private function can_access()
    {

        # Use CodeIgniter's router to get the controller/page
        $cont = $this->router->class;
        $page = $this->router->method;

        $check = $this->check_login();

        # Check for every page I have to be logged in/out
        if ($check && $cont == 'login' && $page != 'logout')
        {
            redirect('/');
        }
        else if (!$check && $cont != 'login')
        {
            redirect('/login/');
        }

    }

    protected function check_login()
    {
        # 1. GEt the current sesion data into variable.
        $data = $this->session->userdata;

        # 2.Stop here if there is no Session data
        if (!array_key_exists('session_code', $data))
        {
            return FALSE;
        }

        # 3. if there is no refresh data or an hour has passed check the login data.
        if (!array_key_exists('refresh', $data) || $data['refresh'] < time())
        {
            if ($this->system->check_data($data['id'], $data['email'], $data['session_code']))
            {
                $data['refresh'] = time() + 60 * 60;
                return TRUE;
            }

            return FALSE;
        }

        # we don't have to check the data
        return TRUE;
    }

    protected function has_permission($p_name)
    {
        #1. Stop here if $p_name is a number
        if(is_int($p_name)) return FALSE;

        #2. Retriece the information we need
        $p_name = strtoupper($p_name);
        $role = strtolower($this->session->userdata('role'));
        $permissions = $this->config->item('permissions')[$role];
        if ($permissions == NULL) return TRUE;

        #3. Check that the permission item actually array_key_exists
        if (!array_key_exists($p_name, $permissions)) return FALSE;
        return $permissions[$p_name];
    }
}


?>
