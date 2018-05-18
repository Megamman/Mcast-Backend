<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#A config file always has a $config variable.

$config['permissions'] = array(
    'admin' => array(
        'ACCESS_ADMIN'      => TRUE,
        'ACCESS_LECTURER'   => TRUE,
        'ACCESS_STUDENT'    => TRUE
    ),
    'lecturer' => array(
        'ACCESS_ADMIN'      => FALSE,
        'ACCESS_LECTURER'   => TRUE,
        'ACCESS_STUDENT'    => FALSE
    ),
    'students' => array(
        'ACCESS_ADMIN'      => FALSE,
        'ACCESS_LECTURER'   => FALSE,
        'ACCESS_STUDENT'    => TRUE
    )
);

?>
