<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$this->jobs();
	}

	function jobs()
	{
		$data = array(
			'links'		=> $this->job_edit_links()
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





}
