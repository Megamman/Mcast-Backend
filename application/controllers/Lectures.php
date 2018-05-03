<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectures extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$this->lectures();
	}

	function lectures()
	{
		$data = array(
			'links'		=> $this->lect_edit_links()
		);
		$this->build('lectures\lectures', $data);
	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('lectures/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('lectures/update');
	}





}
