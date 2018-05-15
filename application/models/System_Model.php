<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_Model extends CI_Model {

    # Register a user into the first table
    public function add_user($idcard, $name, $surname, $email, $password, $role, $salt){


        $dataLogin = array(
            'user_id'               => $idcard,
            'email_login'           => $email,
            'pass_login'            => password_hash($salt.$password, CRYPT_BLOWFISH),
            'salt_login'            => strrev($salt),
            'tbl_roles_id'          => $role

        );
        $this->db->insert('tbl_login', $dataLogin);
        //gives us whatever the PK value is last
        //return $this->db->insert_id(); code below will get ID (this-db-insert-id)
        $id = $this->db->insert_id();


        //adding user data to its table
        $dataUser = array(
            'tbl_login_id_login'    => $id,
            'user_name'             => $name,
            'user_surname'          => $surname
        );
        $this->db->insert('tbl_users', $dataUser);

        return $id;

    }

    # Checks the user details table for unchanged/existing data
    public function check_user_details($id, $name, $surname){

        $data = array(
            'tbl_login_id_login'          => $id,
            'user_name'         => $name,
            'user_surname'      => $surname
        );

        return $this->db->get_where('tbl_users', $data)->num_rows() == 1;
    }

    

    # Associate user details with the login data
    public function user_details($id){
        if ($this->check_user_details($id, $name, $surname))
        {
            return TRUE;
        }

        $data = array(
            'tbl_login_id_login'          => $id,
            'user_creation'    => time()
        );

        $this->db->insert('tbl_users', $data);

        return $this->db->affected_rows() == 1;
    }

    # Checks the password provided by the user
    public function check_password($email, $password){
        $info = $this->db->select('id_login, pass_login, salt_login')
                        ->where('email_login', $email)
                        ->get('tbl_login')
                        ->row_array();

        $checkstr = strrev($info['salt_login']).$password;

        return password_verify($checkstr, $info['pass_login']) ? $info['id_login'] : FALSE;
    }

    # Writes the login data and retrieve the user's information
    public function set_login_data($id, $code){
        # 1. write the login information or stop the code here
        if (!$this->persist($id, $code))
        {
            return FALSE;
        }

        return $this->db->select('tbl_login.id_login,
                            tbl_login.email_login AS email,
                            tbl_users.user_name AS name,
                            tbl_users.user_surname AS surname,
                            tbl_login_info.u_persistence AS session_code')
                        ->join('tbl_users', 'tbl_users.user_id = tbl_users.tbl_login_id_login', 'left')
                        ->join('tbl_login_info', 'tbl_login_info.tbl_login_id_login = tbl_login.id_login', 'left')
                        ->where('tbl_login.id_login', $id)
                        ->get('tbl_login')
                        ->row_array();
    }

    # Writes the login information to the database
    public function persist($id, $code){
        $data = array(
            'tbl_login_id_login'       => $id,
            'user_time'  => time(),
            'u_persistence' => $code
        );

        $this->db->insert('tbl_login_info', $data);

        return $this->db->affected_rows() == 1;
    }


    //get roles from Database
    public function getRoles(){
        $results = $this->db->select("*")
                        ->where('id != ', 3)
                        ->get('tbl_roles')
                        ->result_array();

        $array = [];
        foreach ($results as $row)
        {
            $array[$row['id']] = $row['name'];
        }

        return $array;
    }

}
