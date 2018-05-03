<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$this->resources();
	}

	function resources()
	{
		$data = array(
			'links'		=> $this->res_edit_links()
		);
		$this->build('resources\resources', $data);
	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('resources/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('resources/update');
	}





}
