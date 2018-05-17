<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectures_Model extends CI_Model {

    //get lectureres email
    public function get_lecturers(){
        $result = $this->db->select('id_login, email_login')
                        ->get('tbl_login')
                        ->result_array();

        $array = array();
        foreach ($result as $row)
        {
            $array[$row['id_login']] = $row['email_login'];
        }

        return $array;
    }

    //adding lecturer and end date to database.
    public function add_lecturer($email, $endDate){

        $data = array(
            'tbl_login_id_login' => $email,
            'lect_end'           => $endDate,
        );
        $this->db->insert('tbl_lects', $data);
        //gives us whatever the PK value is last
        //return $this->db->insert_id();
        return $this->db->insert_id();
    }


}
