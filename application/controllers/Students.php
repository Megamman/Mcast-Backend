<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
		$this->has_permission('ACCESS_LECTURER') or show_404();

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




	public function edit($id = NULL, $extra = NULL){

		if ($id === 'submit')
		{
			$this->edit_submit($extra);
			return;
		}

		$this->load->model('courses_model');
		$user = $this->courses_model->get_user($id);


		if($user == NULL){
			show_404();
			return;
		}

		// load the form helper to get the function isndie the file otherwise known as a plugin
		$this->load->helper('form');
		// this array will contain all the inputs we will need
		$data = array(
			'properties'	=> array(
								'action'	=> "students/edit/submit/{$id}",
								'hidden'	=> 	array('user_id' => $user['user_id']
							)
			),
			'form' => $this->user_form($user),
			'course_list'		=> $this->courses_model->all(),
			'dropdown_class'	=> array(
									'class'	=> 'btn btn-secondary dropdown-toggle'
								)
		);
			//the page itself
			$this->build('student/update', $data);

	}

	private function edit_submit($id){

		//load the form_validation library
		$this->load->library('form_validation');
		//load the users_model
		$this->load->model('courses_model');

		//this instead of

		if ($this->fv->run('edit_student') === FALSE)
		{
			echo validation_errors();
			return;
		}

		$id_card = $this->input->post('id_card');
		$email = $this->input->post('email');
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$course = $this->input->post('course');
		$link = $this->input->post('link');

		//update the user
		$check = $this->courses_model->update_user($id, $id_card, $email, $name, $surname, $course, $link);
		if(!$check){
			$this->edit($id);
			return;
		}

		//reload the page
		redirect("students/edit/{$id}");
	}

	private function user_form($user = NULL){

		if($user == NULL){
			$user = array (
				'user_id' 		=> NULL,
				'user_name' 	=> NULL,
				'user_surname' 	=> NULL,
				'email_login' 	=> NULL,
				'std_link'		=> NULL
			);
		}
		return array(
			'ID Number' => array(
				'type' 				=> 'text',
				'name' 				=> 'id_card',
				'placeholder' 		=> '555555M',
				'id' 				=> 'exampleInputID',
				'required' 			=> TRUE,
				'value'				=> set_value('user_id', $user['user_id'])
			),
			'user_name' => array(
				'type' 				=> 'text',
				'name' 				=> 'name',
				'placeholder' 		=> 'Johnny',
				'id' 				=> 'exampleInputName',
				'required' 			=> TRUE,
				'value'				=> set_value('user_name',$user['user_name'])
			),
			'user_surname' => array(
				'type' 				=> 'text',
				'name' 				=> 'surname',
				'placeholder' 		=> 'Borg',
				'id' 				=> 'exampleInputSurname',
				'required' 			=> TRUE,
				'value'				=> set_value('user_surname', $user['user_surname'])
			),
			'email_login' => array(
				'type' 				=> 'email',
				'name' 				=> 'email',
				'placeholder' 		=> 'jay@gmail.com',
				'id' 				=> 'exampleInputEmail',
				'required' 			=> TRUE,
				'value'				=> set_value('email_login', $user['email_login'])
			),
			'std_link' => array(
				'type' 				=> 'text',
				'name' 				=> 'link',
				'placeholder' 		=> 'jay.behance.com',
				'id' 				=> 'exampleInputStuLink',
				'required' 			=> TRUE,
				'value'				=> set_value('std_link', $user['std_link'])
			)
		);
	}



}
