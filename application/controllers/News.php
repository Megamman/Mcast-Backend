<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

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
		$this->news();
	}

	function news()
	{
		$this->load->model('news_model');

		$data = array(
			'links'		=> $this->news_edit_links(),
			'news' 		=> $this->news_model->get_news()
		);
		$this->build('news/news', $data);
	}

	public function add()
	{
		//this command loads a view from the views folder
		$this->build('news/add');
	}

	public function update(){

		//this command loads a view from the views folder
		$this->build('news/update');
	}

	public function add_news(){

		if ($this->fv->run('add_news') === FALSE)
        {
			echo validation_errors();
            return;
        }

		$title			= $this->input->post('newsTitle');
		$desc			= $this->input->post('newsDecs');

		chmod('uploads', 0777);
		chmod('uploads/news', 0777);

		$config['upload_path']          = './uploads/news/';
		$config['file_name']          	= $title;
	   	$config['allowed_types']        = 'jpg|png|pdf';
	   	$config['max_size']             = 10000;
		$this->load->model('news_model');

		$this->news_model->add_news($title, $desc);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('news', $error);
		}

		echo "The News was added";

		redirect('news');

	}

	public function submit_form()
	{
		switch ($this->input->post('button'))
		{
			case 'delete':
				$this->delete_news();
				break;

			//case 'update':
				//$this->update();
				//break;
		}
	}

	public function delete_news(){
		$this->load->model('news_model');

		$new 	= $this->input->post('news');// TO GET ARRAY FROM SELECT BOX student[]<-- name of checkbox

		$names = $this->news_model->get_titles($new);
		foreach($names as $name)
		{
			$title = urlencode($name['news_title']);
			$files = glob("uploads/news/{$title}.*");
			foreach ($files as $file) unlink($file);
		}

		$this->news_model->delete_news($new);


		redirect('news');

	}

	public function edit($id = NULL, $extra = NULL){

		if ($id === 'submit')
		{
			$this->edit_submit($extra);
			return;
		}

		$this->load->model('news_model');
		$news = $this->news_model->get_news_by_id($id);


		if($news == NULL){
			show_404();
			return;
		}

		// load the form helper to get the function isndie the file otherwise known as a plugin
		$this->load->helper('form');
		// this array will contain all the inputs we will need
		$file = glob("uploads/news/{$news['news_title']}.*");
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
								'action'	=> "news/edit/submit/{$id}",
								'hidden'	=> 	array(	'news_id' => $news['news_id'],
														'old_name' => $news['news_title']
							)
			),
			'form' => $this->news_form($news),
			'image' => $file
		);


			//the page itself
			$this->build('forms/update', $data);

	}


	private function edit_submit($id){

		//load the form_validation library
		$this->load->library('form_validation');
		//load the users_model
		$this->load->model('news_model');

		//this instead of

		if ($this->fv->run('add_news') === FALSE)
		{
			echo validation_errors();
			return;
		}

		$id 		= $this->input->post('news_id');
		$name     	= $this->input->post('news_title');
		$desc    	= $this->input->post('news_desc');
		$oldName    = $this->input->post('old_name');

		//update the user
		$check = $this->news_model->update_news($id, $name, $desc);
		if(!$check){
			$this->edit($id);
			return;
		}

		chmod('uploads', 0777);
		chmod('uploads/forms', 0777);

		$config['upload_path']          = './uploads/news/';
		$config['file_name']          	= urlencode($name);
	   	$config['allowed_types']        = 'jpg|png|pdf';
	   	$config['max_size']             = 10000;
		$this->load->model('news_model');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('news', $error);
		}

		//reload the page
		redirect("news/edit/{$id}");
	}

	private function news_form($news = NULL){

		if($news == NULL){
			$news = array (
				'news_title' 		=> NULL,
				'news_desc' 		=> NULL
			);
		}
		return array(
			'News Title' => array(
				'type' 				=> 'text',
				'name' 				=> 'news_title',
				'placeholder' 		=> 'New Title',
				'id' 				=> 'newsTitleId',
				'required' 			=> TRUE,
				'value'				=> set_value('news_title', $news['news_title'])
			),
			'News Desc' => array(
				'type' 				=> 'text',
				'name' 				=> 'news_desc',
				'placeholder' 		=> 'Description here',
				'id' 				=> 'newsDescId',
				'required' 			=> TRUE,
				'value'				=> set_value('news_desc',$news['news_desc'])
			)
		);
	}





}
