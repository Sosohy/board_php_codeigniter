<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller 
{
	function __construct(){
		        parent::__construct();
		        $this->load->database();
		        $this->load->model('PostModel');
}

	public function index() {
		$this -> viewPost();
	}

	public function getPostList() {
		$data['postList'] = $this -> PostModel -> getPostList();
		$this -> load -> view('post_list', $data);
	}

	public function viewPost($idx=1) {
		$data['post'] = $this -> PostModel -> getPost($idx);
		$this -> load -> view('view_post', $data);
	}
}
