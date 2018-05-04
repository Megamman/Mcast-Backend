<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$data = array(
			'links'		=> $this->stud_edit_links()
		);
		$this->build('student/portfolio', $data);
	}

}
