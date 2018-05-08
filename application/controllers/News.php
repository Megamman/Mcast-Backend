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
		$data = array(
			'links'		=> $this->news_edit_links()
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





}
