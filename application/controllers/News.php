<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
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





}
