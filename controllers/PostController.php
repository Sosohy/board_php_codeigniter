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

	// public function writePost(){
	// 	//echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';

	// 	if($_POST){
	// 		// $this -> load -> helper('alert');

	// 		// if(!$this->input->post('title', TRUE) AND !$this->input->post('content', TRUE)){
	// 		// }

	// 		$userData = array(
	// 			'name'=> $this->input->post('name', TRUE),
	// 			'pw'=> $this->input->post('pw', TRUE),
	// 			'email'=> $this->input->post(email, FALSE)
	// 		);
	// 		$result = $this->UserModel->registerUser($userData);

	// 		$writeData = array(
	// 			'title'=> $this->input->post('title', TRUE),
	// 			'content'=> $this->input->post('content', TRUE)
	// 			'writer'=> $this->$result
	// 		);
	// 		$write_result = $this->PostModel->writePost($writeData);
	// 	}
	// }
}