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

	public function index(){

		//this command loads a view from the views folder
		$this->build('studentport');
	}

	public function portfolio(){

		//this command loads a view from the views folder
		$this->build('studentport');
	}

	public function resources(){

		//this command loads a view from the views folder
		$this->build('studentres');
	}

	public function forms(){

		//this command loads a view from the views folder
		$this->build('forms');
	}

	public function timetables(){

		//this command loads a view from the views folder
		$this->build('timetables');
	}

	public function lectures(){

		//this command loads a view from the views folder
		$this->build('lectures');
	}

	public function news(){

		//this command loads a view from the views folder
		$this->build('news');
	}

	public function studentportadd(){

		//this command loads a view from the views folder
		$this->build('studentportadd');
	}

	public function studentportupdate(){

		//this command loads a view from the views folder
		$this->build('studentportupdate');
	}


}
