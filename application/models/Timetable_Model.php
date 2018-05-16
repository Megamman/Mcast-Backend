<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable_Model extends CI_Model {

    public function add_forms($id, $name, $level){

        $dataCourse = array(
            'course_id'       => $id,
            'course_name'     => $name,
            'course_lvl'     => $level
        );
        $this->db->insert('tbl_courses', $dataCourse);
    }

}
