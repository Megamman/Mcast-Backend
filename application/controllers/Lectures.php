<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectures extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
		$this->has_permission('ACCESS_LECTURER') or show_404();

	}

	function index()
	{
		$this->lectures();
	}

	function lectures(){

		$this->load->model('lectures_model');

		$data = array(
			'links'			=> $this->lect_edit_links(),
			'lectures' 		=> $this->lectures_model->get_lecturers_for_table()
		);

		$this->build('lectures/lectures', $data);
	}

	public function add()
	{

		$this->load->model('lectures_model');

		$data = array(
			'lectures_list'		=> $this->lectures_model->get_lecturers(),
			'dropdown_class'	=> array(
									'class'	=> 'btn btn-secondary dropdown-toggle'
			)
		);
		//this command loads a view from the views folder
		$this->build('lectures/add', $data);

	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('lectures/update');
	}




	public function add_lecturer()
	{

		# 1. Check the form for validation errors
		if ($this->fv->run('lecturer') === FALSE)
		{
			echo validation_errors();
			return;
		}

		# 2. Retrieve the first set of data
		$email		= $this->input->post('lectures');
		$endDate    = $this->input->post('endDate');

		$this->load->model('lectures_model');

		#3 add to db
		$id = $this->lectures_model->add_lecturer($email, $endDate);

		#4 if id did not register, something went wrong
		if($id === FALSE){
			echo "We couldn't add listing because of a database error.";
			return;
		}

		redirect ('lectures');
	}



}
