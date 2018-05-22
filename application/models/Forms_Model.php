<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_Model extends CI_Model {

    public function add_forms($id, $name, $desc){

        $dataForm = array(
            'form_id'       => $id,
            'form_name'     => $name,
            'form_desc'     => $desc
        );
        $this->db->insert('tbl_forms', $dataForm);
    }



    public function get_forms(){
        return $this->db->select('  form_id,
                                    form_name,
                                    form_desc')
                        ->get('tbl_forms');
    }

    public function delete_form($form){
        $this->db->where_in('form_id', $form)->delete('tbl_forms');
    }

}
