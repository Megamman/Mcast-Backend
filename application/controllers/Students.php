<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
		//$this->has_permission('ACCESS_LECTURER') or show_404();

	}

	function index(){
		$this->portfolio();
	}

	function portfolio(){

		$this->load->model('courses_model');

		$data = array(
			'links'		=> $this->stud_edit_links(),
			'users' 	=> $this->courses_model->get_students()
		);

		$this->build('student/portfolio', $data);



	}

	public function add(){
		$this->load->model('courses_model');

		$data = array(
			'course_list'		=> $this->courses_model->all(),
			'dropdown_class'	=> array(
			    					'class'	=> 'btn btn-secondary dropdown-toggle'
			)
		);

		//this command loads a view from the views folder
		$this->build('student/add', $data);
	}

	public function submit_form()
	{
		switch ($this->input->post('button'))
		{
			case 'delete':
				$this->delete_user();
				break;

			case 'update':
				$this->update();
				break;
		}
	}

	public function add_student(){
        # 1. Check the form for validation errors
        if ($this->fv->run('add_student') === FALSE)
        {
            echo validation_errors();
            return;
        }

        # 2. Retrieve data for checking
        $id_card     	= $this->input->post('id_card');
		$email     		= $this->input->post('email');
        $name     		= $this->input->post('name');
		$surname     	= $this->input->post('surname');
		$course     	= $this->input->post('course');
		$link			= $this->input->post('link');

		$this->load->model('courses_model');

		$this->courses_model->add_student($id_card, $email, $name, $surname, $course, $link);

		echo "The Student has been added";

        # 10. Redirect home
        redirect('students');

    }

	public function delete_user(){
		$this->load->model('courses_model');

		$user 	= $this->input->post('student');// TO GET ARRAY FROM SELECT BOX student[]<-- name of checkbox

		$this->courses_model->delete_user($user);

		redirect('students');

	}

	public function update(){
		$this->load->model('courses_model');

		$data = array(
			'users' 	=> $this->courses_model->get_student()
		);
		//this command loads a view from the views folder
		$this->build('student/update', $data);
	}



}
