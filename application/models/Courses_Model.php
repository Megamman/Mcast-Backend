<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_Model extends CI_Model {

    # Get the list of courses from the db
    public function all()
    {

        $result = $this->db->select('course_id, course_name')
                        ->get('tbl_courses')
                        ->result_array();

        $array = array();
        foreach ($result as $row)
        {
            $array[$row['course_id']] = $row['course_name'];
        }

        return $array;

    }


    public function add_student($id_card, $email, $name, $surname, $course, $link) {

        $salt 		= bin2hex($this->encryption->create_key(8));

        //an insert query
        //inset into tbl_users(cols) values (cols)

        $dataLogin = array(
            'user_id'               => $id_card,
            'email_login'           => $email,
            'pass_login'            => password_hash($salt.$id_card, CRYPT_BLOWFISH),
            'salt_login'            => strrev($salt)
        );
        $this->db->insert('tbl_login', $dataLogin);
        //gives us whatever the PK value is last
        //return $this->db->insert_id();
        $id = $this->db->insert_id();

        $dataUser = array(
            'tbl_login_id_login'    => $id,
            'user_name'             => $name,
            'user_surname'          => $surname
        );
        $this->db->insert('tbl_users', $dataUser);


        $data = array(
            'tbl_login_id_login'    => $id,
            'std_link'                  => $link,
            'tbl_courses_course_id' => $course
        );
        $this->db->insert('tbl_std', $data);
    }

}
