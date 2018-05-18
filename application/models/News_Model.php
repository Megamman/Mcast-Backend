<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model {

    public function add_news($title, $desc){

        $dataNews = array(
            'news_title'    =>$title,
            'news_desc'     =>$desc
        );
        $this->db->insert('tbl_news', $dataNews);
    }

}
