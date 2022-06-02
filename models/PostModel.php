<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostModel extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getPostList(){
        $sql = 'select * from post';
        $result = $this->db->query($sql)->result();

        return $result;
    }


}