<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller 
{
	function __construct(){
		        parent::__construct();
		        $this->load->database();
		        $this->load->model('PostModel');
				$this->load->model('UserModel');
}

	public function index() {
		$this -> writePost();
	}

	public function getPostList() {
		$data['postList'] = $this -> PostModel -> getPostList();
		$this -> load -> view('post_list', $data);
	}

	public function viewPost($idx=1) {
		$data['post'] = $this -> PostModel -> getPost($idx);
		$this -> load -> view('view_post', $data);
	}

	public function writePost(){
		//echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';

		if($_POST){
			$userData = array(
				'name'=> $this->input->post('name', TRUE),
				'pw'=> $this->input->post('pw', TRUE),
				'email'=> $this->input->post('email', FALSE)
			);
			$result = $this->UserModel->registerUser($userData);

			$writeData = array(
				'title'=> $this->input->post('title', TRUE),
				'content'=> $this->input->post('content', TRUE),
				'writer'=> $result
			);
			$write_result = $this->PostModel->writePost($writeData);

			if($write_result >= 1)
				$this->getPostList();
		}
		else{
			$this->load->view('write_post');
		}
	}

	function deletePost($userIdx, $postIdx){
		$result = $this->UserModel->deleteUser($userIdx);
		if($result > 0)
			$this->PostModel->deletePost($postIdx);

		$this->getPostList();
	}

	function confirmUser(){
		$func = $this->uri->segment(3);

		$data['func'] = $func;
		$data['post'] = $this -> PostModel -> getPost($this->uri->segment(4));
		$data['user'] = $this -> UserModel -> getUser($this->uri->segment(5));
		$this -> load -> view('confirm_user', $data);
	}
}