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
		$this->build('timetables/timetables', $data);
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

	public function add_timetable(){

		//this command adds a timetable to the db
		if ($this->fv->run('add_timetable') === FALSE)
        {
			echo validation_errors();
            return;
        }

		$id 	= $this->input->post('course_id');
		$name 	= $this->input->post('course_name');
		$level 	= $this->input->post('course_lvl');

		$this->load->model('Timetable_Model');		
	}





}
