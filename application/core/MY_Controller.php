<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    //this will load right before the
    //controllers we have in controllers folder
    //magic method
    //is called/used when the class loads


    function __contruct(){
        //required
        //load the parent into its child
        //will add the plugins from autoload
        parent:: __contruct();
    }

    //we can use this to replace $this->load->view
    function build($pages = NULL, $data = NULL){

        $start = array(
            'nav'       => $this->nav_links()
        );

        $this->load->view('templates/start', $start);
        $this->load->view($pages, $data);
        $this->load->view('templates/end');
    }

    //use an associative array for the navigation
    function nav_links(){
        return array(
            'Student Profile'                      => 'welcome',
            'Student Resources'                    => 'welcome/studentres',
            'Forms'                                => 'welcome/forms',
            'Timetables'                           => 'welcome/timetables',
            'Lectures'                             => 'welcome/lectures',
            'News'                                 => 'welcome/news'
        );
    }

    


}

?>
