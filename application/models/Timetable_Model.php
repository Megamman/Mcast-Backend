<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable_Model extends CI_Model {

    //to arrange with sir

    public function add_timetable($name, $level){

        $dataCourse = array(
            'course_name'     => $name,
            'course_lvl'     => $level
        );
        $this->db->insert('tbl_courses', $dataCourse);
    }

}
