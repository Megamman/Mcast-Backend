<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
		$this->has_permission('ACCESS_LECTURER') or show_404();

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
		$config['file_name']          	= urlencode($name);
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



	public function submit_form()
	{
		switch ($this->input->post('button'))
		{
			case 'delete':
				$this->delete_form();
				break;

			case 'update':
				$this->update();
				break;
		}
	}

	public function delete_form(){
		$this->load->model('forms_model');

		$form 	= $this->input->post('form');// TO GET ARRAY FROM SELECT BOX student[]<-- name of checkbox
		$names = $this->forms_model->get_titles($form);
		foreach($names as $name)
		{
			$title = urlencode($name['form_name']);
			$files = glob("uploads/forms/{$title}.*");
			foreach ($files as $file) unlink($file);
		}
		$this->forms_model->delete_form($form);

		redirect('forms');

	}


	public function edit($id = NULL, $extra = NULL){

		if ($id === 'submit')
		{
			$this->edit_submit($extra);
			return;
		}

		$this->load->model('forms_model');
		$user = $this->forms_model->get_user($id);


		if($user == NULL){
			show_404();
			return;
		}

		// load the form helper to get the function isndie the file otherwise known as a plugin
		$this->load->helper('form');
		// this array will contain all the inputs we will need
		$file = glob("uploads/forms/{$user['form_name']}.*");
		if (count($file) > 0)
		{
			$file = $file[0];
		}
		else
		{
			$file = 'img-not-found.png';
		}

		$data = array(
			'properties'	=> array(
								'action'	=> "forms/edit/submit/{$id}",
								'hidden'	=> 	array(	'form_id' => $user['form_id'],
														'old_name' => $user['form_name']
							)
			),
			'form' => $this->user_form($user),
			'image' => $file
		);


			//the page itself
			$this->build('forms/update', $data);

	}

	private function edit_submit($id){

		//load the form_validation library
		$this->load->library('form_validation');
		//load the users_model
		$this->load->model('forms_model');

		//this instead of

		if ($this->fv->run('add_forms') === FALSE)
		{
			echo validation_errors();
			return;
		}

		$id 		= $this->input->post('form_id');
		$name     	= $this->input->post('form_name');
		$desc    	= $this->input->post('form_desc');
		$oldName    = $this->input->post('old_name');

		//update the user
		$check = $this->forms_model->update_form($id, $name, $desc);
		if(!$check){
			$this->edit($id);
			return;
		}

		chmod('uploads', 0777);
		chmod('uploads/forms', 0777);

		$config['upload_path']          = './uploads/forms/';
		$config['file_name']          	= urlencode($name);
	   	$config['allowed_types']        = 'jpg|png|pdf';
	   	$config['max_size']             = 10000;
		$this->load->model('forms_model');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('forms', $error);
		}

		//reload the page
		redirect("forms/edit/{$id}");
	}

	private function user_form($form = NULL){

		if($form == NULL){
			$form = array (
				'form_name' 		=> NULL,
				'form_desc' 		=> NULL
			);
		}
		return array(
			'Form Name' => array(
				'type' 				=> 'text',
				'name' 				=> 'form_name',
				'placeholder' 		=> 'Sick Form',
				'id' 				=> 'sickForm',
				'required' 			=> TRUE,
				'value'				=> set_value('form_name', $form['form_name'])
			),
			'Form Desc' => array(
				'type' 				=> 'text',
				'name' 				=> 'form_desc',
				'placeholder' 		=> 'Description here',
				'id' 				=> 'descId',
				'required' 			=> TRUE,
				'value'				=> set_value('form_desc',$form['form_desc'])
			)
		);
	}


}
