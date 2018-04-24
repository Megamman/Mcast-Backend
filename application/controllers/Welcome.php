<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	// magic method to load the parent class
	function __construct()
	{
		// without this, we won't  be able to...
		// this->build our pages.
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){

		//this command loads a view from the views folder
		$this->build('studentprof');
	}

	public function studentprof(){

		//this command loads a view from the views folder
		$this->build('studentprof');
	}

	public function studentres(){

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


}
