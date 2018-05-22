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
            'lect_end'           => strtotime($endDate),
        );
        $this->db->insert('tbl_lects', $data);
        //gives us whatever the PK value is last
        //return $this->db->insert_id();
        return $this->db->insert_id();
    }

    public function get_lecturers_for_table(){

        return $this->db->select('  tbl_lects.lect_end,

                                    tbl_login.email_login,

                                    tbl_users.user_name')

                        ->join('tbl_login',     'tbl_login.id_login             = tbl_lects.tbl_login_id_login',        'left')
                        ->join('tbl_users',     'tbl_users.tbl_login_id_login   = tbl_login.id_login',                  'left')
                        ->get('tbl_lects');


    }

    /*public function delete_lecture($lecture){
        $this->db->where_in('id_login', $lecture)->delete('tbl_lects');
    }*/



}
