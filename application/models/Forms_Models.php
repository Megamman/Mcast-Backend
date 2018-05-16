<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_Model extends CI_Model {

    public function add_forms($id, $name){

        $dataForm = array(#
            'form_id'       => $id,
            'form_name'     => $name
        );

    }

}
