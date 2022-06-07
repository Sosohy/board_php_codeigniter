<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getUsers(){
        $sql = "Select * FROM user WHERE id IN (SELECT writer FROM post ORDER BY id) GROUP BY id;";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function getUser($idx){
        $result = $this->db->get_where('user', array('id'=>$idx))->row();
        return $result;
    }

    public function registerUser($array){

        $insertArray = array(
            'name' => $array['name'],
            'pw' => $array['pw'],
            'email' => $array['email']
        );

        $this->db->insert('user', $insertArray);
        $result = $this->db->insert_id();
        return $result;
    }
    
    public function registerCommentUser($array){

        $insertArray = array(
            'name' => $array['name'],
            'pw' => $array['pw'],
        );

        $this->db->insert('user', $insertArray);
        $result = $this->db->insert_id();
        return $result;
    }

    function deleteUser($idx){
       $result = $this->db->where('id', $idx)->delete('user');
       return $result;
    }

    function confirmPW($pw, $idx){
        $sql = "select * from user where id=".$idx." and pw='".$pw."'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}