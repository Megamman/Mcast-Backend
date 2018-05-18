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


    

}
