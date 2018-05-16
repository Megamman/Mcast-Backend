<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(

    # The login form rules
    'login'         => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),

    # The register form rules
    'register'      => array(
        array(
            'field' => 'idcard',
            'label' => 'Idcard',
            'rules' => 'required'
        ),
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'surname',
            'label' => 'Surname',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[tbl_login.email_login]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[8]|password_strength'
        )

    ),

    'add_student'   => array(
        array(
            'field' => 'id_card',
            'label' => 'Id_card',
            'rules' => 'required'
        ),
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'surname',
            'label' => 'Surname',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[tbl_login.email_login]'
        ),
        array(
            'field' => 'course',
            'label' => 'Course',
            'rules' => 'required'
        ),
        array(
            'field' => 'link',
            'label' => 'Link',
            'rules' => 'required'
        )
    ),
    'add_vacancy'   => array(
        array(
            'field' => 'jobName',
            'label' => 'JobName',
            'rules' => 'required'
        ),
        array(
            'field' => 'jobDesc',
            'label' => 'JobDesc',
            'rules' => 'required'
        )

    )


);
