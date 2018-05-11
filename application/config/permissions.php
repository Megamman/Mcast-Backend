<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#A config file always has a $config variable.

$config['permissions'] = array(
    'admin' => array(
        'ACCESS_WELCOME_PAGE'  => TRUE,
        'ACCESS_SECRET_PAGE'   => TRUE,
        'EDIT_SECRET_MESSAGE'  => TRUE
    ),

    'Lecturer' => array(
        'ACCESS_WELCOME_PAGE'  => TRUE,
        'ACCESS_SECRET_PAGE'   => FALSE
    ),
    'Student' => array(
        'ACCESS_WELCOME_PAGE'  => TRUE,
        'ACCESS_SECRET_PAGE'   => FALSE
    )
);

?>
