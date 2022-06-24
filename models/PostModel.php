<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostModel extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getPostList(){
        $sql = "Select post.*, user.name, 
                (SELECT COUNT(*) FROM comment WHERE comment.post_idx = post.id) AS commentCount
                FROM post 
                JOIN user on post.writer = user.id 
                ORDER BY post.id DESC";

        $result = $this->db->query($sql)->result();
        return $result;
    }

    function getPost($idx){
        $sql = "update post SET views = views + 1 WHERE id=".$idx."";
        $this->db->query($sql);

        $result = $this->db->get_where('post', array('id'=>$idx))->row();
        return $result;
    }

    function writePost($array){
        $insertArray = array(
            'title' => $array['title'],
            'content' => $array['content'],
            'writer' => $array['writer'],
            'private' => $array['private']
        );
        $this->db->insert('post', $insertArray);

        $result = $this->db->insert_id();
        return $result;
    }

    function modifyPost($array, $idx){
        $insertArray = array(
            'title' => $array['title'],
            'content' => $array['content'],
            'private' => $array['private']
        );
        $this->db->where('id', $idx)->update('post', $insertArray);
    }

    function deletePost($idx) {
        $result = $this->db->where('id', $idx)-> delete('post');
        return $result;
    }

    function searchPost($word){
        $sql = "Select post.*, user.name FROM post 
                JOIN user on post.writer = user.id 
                WHERE (title LIKE '%".$word."%') OR (content LIKE '%".$word."%') OR (name LIKE '%".$word."%');";
        $result = $this->db->query($sql)->result();

        return $result;
    }
}