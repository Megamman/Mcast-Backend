<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_Model extends CI_Model {

    # Register a user into the first table
    public function add_user($email, $password, $salt)
    {

        $data = array(
            'email_login'       => $email,
            'password_login'    => password_hash($salt.$password, CRYPT_BLOWFISH),
            #  MUST ADD 'salt_login'        => strrev($salt)
        );

        $this->db->insert('tbl_login', $data);

        return $this->db->insert_id();

    }

    # Checks the user details table for unchanged/existing data
    public function check_user_details($id)
    {

        $data = array(
            'id_login'       => $id
        );

        return $this->db->get_where('tbl_login', $data)->num_rows() == 1;
    }

    # Deletes a user from the database
    public function delete_user($id)
    {
        $this->db->delete('tbl_login', array('id' => $id));
    }

    # Associate user details with the login data
    public function user_details($id)
    {
        if ($this->check_user_details($id))
        {
            return TRUE;
        }

        $data = array(
            'user_id'       => $id,
            #  MUST ADD name and 'u_creation'    => time()
        );

        $this->db->insert('tbl_user_details', $data);

        return $this->db->affected_rows() == 1;
    }

    # Checks the password provided by the user
    public function check_password($email, $password)
    {
        $info = $this->db->select('id_login, pass_login, u_salt')
                        ->where('email_login', $email)
                        ->get('tbl_login')
                        ->row_array();

        $checkstr = strrev($info['u_salt']).$password;

        return password_verify($checkstr, $info['pass_login']) ? $info['id_login'] : FALSE;
    }

    # Writes the login data and retrieve the user's information


    
