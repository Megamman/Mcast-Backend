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

    public function get_titles($ids){
        return $this->db->select('form_name')->where_in('form_id', $ids)->get('tbl_forms')->result_array();
    }


    public function get_user($id){
        //run a query and return the row immediately
        return $this->db->select('  form_id,
                                    form_name,
                                    form_desc')
                        ->where('form_id', $id)
                        ->get('tbl_forms')
                        ->row_array();
    }

    public function update_form($id, $name, $desc){

        $flag = FALSE;

        //an insert query
        //inset into tbl_users(cols) values (cols)

        $data = array(
            'form_name'                 => $name,
            'form_desc'                 => $desc

        );

        $this->db   ->where('form_id', $id)
                    ->update('tbl_forms', $data);

        if (!$flag)
            $flag = $this->db->affected_rows() == 1;

        return $flag;
    }





}
