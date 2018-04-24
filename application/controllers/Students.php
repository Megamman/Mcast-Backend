<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	function index()
	{
		$data = array(
			'links'		=> $this->edit_links()
		);
		$this->build('student/portfolio', $data);
	}

	public function studentportadd(){

		//this command loads a view from the views folder
		$this->build('studentportadd');
	}

	public function studentportupdate(){

		//this command loads a view from the views folder
		$this->build('studentportupdate');
	}

	private function edit_links(){
		return array(
			array(
				'icon'		=> 'fa-plus',
				'caption'	=> NULL,
				'link'		=> 'students/portfolio'
			),
			array(
				'icon'		=> 'fa-trash-alt',
				'caption'	=> NULL,
				'link'		=> 'students/boop'
			),
			array(
				'icon'		=> NULL,
				'caption'	=> 'Update',
				'link'		=> 'students/update'
			)
		);
	}

}
