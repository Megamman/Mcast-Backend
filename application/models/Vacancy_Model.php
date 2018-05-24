<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancy_Model extends CI_Model {


    public function add_vacancy($jobName, $jobDesc, $jobEndDate) {
        //an insert query
        //inset into tbl_users(cols) values (cols)
        $data = array(
            'job_name'          => $jobName,
            'job_desc'          => $jobDesc,
            'job_end'           => strtotime($jobEndDate)
        );
        $this->db->insert('tbl_jobs', $data);
        //gives us whatever the PK value is last
        //return $this->db->insert_id();
        return $this->db->insert_id();
    }


    public function get_vacancy(){
        return $this->db->select('  job_id,
                                    job_name,
                                    job_desc,
                                    job_end')
                        ->get('tbl_jobs');
    }

    public function delete_job($job){
        $this->db->where_in('job_id', $job)->delete('tbl_jobs');
    }


    public function get_vacancy_by_id($id){
        return $this->db->select('  job_id,
                                    job_name,
                                    job_desc,
                                    job_end')
                        ->get('tbl_jobs')
                        ->row_array();
    }

    public function update_form($job_id, $jobName, $jobDesc, $jobEndDate){


        $flag = FALSE;

        //an insert query
        //inset into tbl_users(cols) values (cols)

        $data = array(
            'job_name'              => $jobName,
            'job_desc'              => $jobDesc,
            'job_end'               => strtotime($jobEndDate)
        );

        $this->db   ->where('job_id', $job_id)
                    ->update('tbl_jobs', $data);

        if (!$flag)
            $flag = $this->db->affected_rows() == 1;

        return $flag;
    }





}
