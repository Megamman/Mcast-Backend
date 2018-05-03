<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetables extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$this->timetables();
	}

	function timetables()
	{
		$data = array(
			'links'		=> $this->tt_edit_links()
		);
		$this->build('timetables\timetables', $data);
	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('timetables/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('timetables/update');
	}





}
