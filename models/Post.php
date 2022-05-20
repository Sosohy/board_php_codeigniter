<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Model
{
	protected $id = 0;
	protected $title = '';
    protected $content = '';
    protected $private = 0;
    protected $views = 0;
    protected $date = '';
    protected $writer = 0;

    function __construct() {
        parent::__construct();
        $this->db = db_connect();
    }

    public function GetPost() {
        return $this->db->query("SELECT * FROM post")->getResult();
    }

    public function GetPost($id) {            
        return $this->db->table('post')->where('id', $id)->get()->getRow();
    }

    public function CreatePost() //insert
        {
                $this->title   = $_POST['title']; // please read the below note
                $this->content = $_POST['content'];
                $this->private = $_POST['private']; 
                $this->writer = $_POST['writer'];

                $this->db->insert('post', $this);
        }

        public function ModifyPost()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->private = $_POST['private']; 

                $this->db->update('post', $this, array('id' => $_POST['id']));
        }
}