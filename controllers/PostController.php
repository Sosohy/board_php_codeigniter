<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $this->load->view('post_detail');
        $result = $this->db->query('select * from post')->result();
        foreach ($result as $item) {
            echo $item->title;
        }
    }
}