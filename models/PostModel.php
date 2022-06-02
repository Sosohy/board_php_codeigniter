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

    function getPost($idx){
        $sql = "update post SET views = views + 1 WHERE id=".$idx."";
        $this->db->query($sql);

        $result = $this->db->get_where('post', array('id'=>$idx))->row();
        return $result;
    }

    
}