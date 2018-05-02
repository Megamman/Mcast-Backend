<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$this->portfolio();
	}

	function portfolio()
	{
		$data = array(
			'links'		=> $this->edit_links()
		);
		$this->build('student/portfolio', $data);
	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('student/add');
	}

	public function studentportupdate(){

		//this command loads a view from the views folder
		$this->build('student/update');
	}





}
