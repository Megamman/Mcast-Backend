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
            'rules' => ''
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

    ),
    'add_forms'   => array(
        array(
            'field' => 'form_name',
            'label' => 'Form_name',
            'rules' => 'required'
        ),
        array(
            'field' => 'form_desc',
            'label' => 'Form_desc',
            'rules' => 'required'
        )
    ),
    'add_timetable'   => array(
        array(
            'field' => 'timetable',
            'label' => 'Timetable',
            'rules' => 'required'
        ),
        array(
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'required'
        )
    ),
    'lecturer'   => array(
        array(
            'field' => 'endDate',
            'label' => 'EndDate',
            'rules' => 'required'
        )
    ),
    'add_news'   => array(
        array(
            'field' => 'newsTitle',
            'label' => 'NewsTitle',
            'rules' => 'required'
        ),
        array(
            'field' => 'newsDecs',
            'label' => 'NewsDecs',
            'rules' => 'required'
        )
    ),
    'edit_student'   => array(
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
            'rules' => 'required|valid_email'
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
    )


);
