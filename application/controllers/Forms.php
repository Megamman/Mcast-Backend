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

		$this->load->model('forms_model');

		$data = array(
			'links'		=> $this->form_edit_links(),
			'forms' 	=> $this->forms_model->get_forms()

		);
		$this->build('forms/forms', $data);
	}

	function add()
	{
		//this command loads a view from the views folder
		$this->build('forms/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('forms/update');
	}

	public function add_forms(){
        # 1. Check the form for validation errors
        if ($this->fv->run('add_forms') === FALSE)
        {
			echo validation_errors();
            return;
        }

		$name     	= $this->input->post('form_name');
		$desc    	= $this->input->post('form_desc');

		chmod('uploads', 0777);
		chmod('uploads/forms', 0777);

		$config['upload_path']          = './uploads/forms/';
		$config['file_name']          	= $name;
	   	$config['allowed_types']        = 'jpg|png|pdf';
	   	$config['max_size']             = 10000;
		$this->load->model('forms_model');

		$this->forms_model->add_forms($id, $name, $desc);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('forms', $error);
		}


		echo "The Form was added";

		redirect('forms');








	}

}
