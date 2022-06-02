<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
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

        $result = $this->db->insert($arrays['user'], $insertArray);
        return $result;
    }
    
}