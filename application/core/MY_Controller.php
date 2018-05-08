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
				'link'		=> 'students/boop'
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
}


?>
