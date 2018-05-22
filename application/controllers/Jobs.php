<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller {

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
		$this->jobs();
	}

	function jobs()
	{
		$this->load->model('vacancy_model');

		$data = array(
			'links'		=> $this->job_edit_links(),
			'jobs' 		=> $this->vacancy_model->get_vacancy()
		);

		$this->build('jobs/jobs', $data);

	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('jobs/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('jobs/update');
	}



	//get information from FORM and place into a variable, which will be passed into the Vacancy_Model
	public function add_vacancy(){
		# 1. Check the form for validation errors
		if ($this->fv->run('add_vacancy') === FALSE)
		{
			echo validation_errors();
			return;
		}

		# 2. Retrieve data for checking
		$jobName     	= $this->input->post('jobName');
	   	$jobDesc     	= $this->input->post('jobDesc');
		$jobEndDate		= $this->input->post('jobEndDate');

	   $this->load->model('vacancy_model');

	   $this->vacancy_model->add_vacancy($jobName, $jobDesc, $jobEndDate);

	   echo "Good Job you submitted a form correctly what do you want a cookie ? Now bugger off!!";

		# 10. Redirect home
		redirect('jobs');

	}

	public function submit_form()
	{
		switch ($this->input->post('button'))
		{
			case 'delete':
				$this->delete_job();
				break;

			//case 'update':
				//$this->update();
				//break;
		}
	}

	public function delete_job(){
		$this->load->model('vacancy_model');

		$job 	= $this->input->post('job');// TO GET ARRAY FROM SELECT BOX student[]<-- name of checkbox

		$this->vacancy_model->delete_job($job);

		redirect('jobs');

	}






}
