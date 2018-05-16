<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_Model extends CI_Model {

    public function add_forms($id, $name, $desc){

        $dataForm = array(
            'form_id'       => $id,
            'form_name'     => $name
            'form_desc'     => $desc
        );
        $this->db->insert('tbl_forms', $dataForm);
    }

    public function get_forms(){
        return $this->db->select('form_id')
                        ->get('tbl_forms');
    }

}
