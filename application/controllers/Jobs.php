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


	public function edit($id = NULL, $extra = NULL){

		if ($id === 'submit')
		{
			$this->edit_submit($extra);
			return;
		}

		$this->load->model('vacancy_model');
		$job = $this->vacancy_model->get_vacancy_by_id($id);


		if($job == NULL){
			show_404();
			return;
		}

		// load the form helper to get the function isndie the file otherwise known as a plugin
		$this->load->helper('form');
		// this array will contain all the inputs we will need
		$data = array(
			'properties'	=> array(
								'action'	=> "jobs/edit/submit/{$id}",
								'hidden'	=> 	array('job_id' => $job['job_id']
							)
			),
			'form' => $this->job_form($job),
		);
			//the page itself
			$this->build('jobs/update', $data);

	}

	private function edit_submit($id){

		//load the form_validation library
		$this->load->library('form_validation');
		//load the users_model
		$this->load->model('vacancy_model');

		//this instead of

		if ($this->fv->run('add_vacancy') === FALSE)
		{
			echo validation_errors();
			return;
		}

		$job_name 	= $this->input->post('jobName');
		$job_desc 	= $this->input->post('jobDesc');
		$job_end 	= $this->input->post('job_end');

		//update the user
		$check = $this->vacancy_model->update_form($id, $job_name, $job_desc, $job_end);
		if(!$check){
			$this->edit($id);
			return;
		}

		//reload the page
		redirect("jobs/edit/{$id}");
	}

	private function job_form($job = NULL){

		if($job == NULL){
			$job = array (
				'job_name' 	=> NULL,
				'job_desc' 	=> NULL,
				'job_end' 	=> NULL
			);
		}
		return array(
			'Job Name' => array(
				'type' 				=> 'text',
				'name' 				=> 'jobName',
				'placeholder' 		=> 'Coder',
				'id' 				=> 'exampleInputJobName',
				'required' 			=> TRUE,
				'value'				=> set_value('job_name', $job['job_name'])
			),
			'Job Desc' => array(
				'type' 				=> 'text',
				'name' 				=> 'jobDesc',
				'placeholder' 		=> 'Johnny',
				'id' 				=> 'exampleInputName',
				'required' 			=> TRUE,
				'value'				=> set_value('job_desc',$job['job_desc'])
			),
			'user_surname' => array(
				'type' 				=> 'date',
				'name' 				=> 'job_end',
				'placeholder' 		=> 'Borg',
				'id' 				=> 'exampleInputDesc',
				'required' 			=> TRUE,
				'value'				=> set_value('job_end', $job['job_end'])
			)
		);
	}








}
