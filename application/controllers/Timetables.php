<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetables extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	//	$this->has_permission('ACCESS_ADMIN') or show_404();

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

		# 1. Check the form for validation errors
        if ($this->fv->run('add_timetable') === FALSE)
        {
			echo validation_errors();
            return;
        }

		$name     	= $this->input->post('timetable');
		$level    	= $this->input->post('level');

		chmod('uploads', 0777);
		chmod('uploads/timetables', 0777);

		$config['upload_path']          = './uploads/timetables/';
		$config['file_name']          	= $name;
	   	$config['allowed_types']        = 'jpg|png|pdf';
	   	$config['max_size']             = 10000;
		$this->load->model('Timetable_Model');

		$this->Timetable_Model->add_timetable($name, $level);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('timetables', $error);
		}


		echo "The Timetable was added";

		redirect('timetables');
	}





}
