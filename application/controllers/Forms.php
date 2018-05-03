<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$this->forms();
	}

	function forms()
	{
		$data = array(
			'links'		=> $this->form_edit_links()
		);
		$this->build('forms\forms', $data);
	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('forms/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('forms/update');
	}





}
