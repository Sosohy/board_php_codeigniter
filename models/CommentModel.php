<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CommentModel extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getCommentList($postIdx){
        $sql = 'Select comment.*, user.name FROM comment 
                JOIN user on comment.writer = user.id 
                WHERE post_idx='.$postIdx.'';

        $result = $this->db->query($sql)->result();
        return $result;
    }

    function writeComment($array){
        $insertArray = array(
            'writer' => $array['writer'],
            'post_idx' => $array['post_idx'],
            'content' => $array['content'],
        );
        $this->db->insert('comment', $insertArray);
        
        $result = $this->db->insert_id();
        return $result;
    }

    function deleteComment($postIdx, $userIdx) {
        //$sql = 'Delete FROM comment WHERE post_idx='.$postIdx.' and writer='.$userIdx.'';
        $result = $this->db->where('post_idx', $postIdx)->where('writer', $userIdx)->delete('comment');
        return $result;
    }

}