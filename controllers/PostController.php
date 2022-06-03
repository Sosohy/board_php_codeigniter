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
		$this -> getPostList();
	}

	public function getPostList() {
		$data['postList'] = $this -> PostModel -> getPostList();
		$this -> load -> view('post_list', $data);
	}

	public function viewPost($idx=1) {
		$data['post'] = $this -> PostModel -> getPost($idx);
		$data['user'] = $this->UserModel->getUser($data['post']->writer);
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
				'writer'=> $result,
				'private'=>$this->input->post('private', TRUE)
			);
			$write_result = $this->PostModel->writePost($writeData);

			if($write_result >= 1)
				$this->getPostList();
		}
		else{
			$this->load->view('write_post');
		}
	}

	function deletePost(){
		$result = $this->UserModel->deleteUser($this->uri->segment(5));
		if($result > 0)
			$this->PostModel->deletePost($this->uri->segment(4));
		$this->getPostList();
	}

	function modifyPost(){
		if($_POST){
			$modifyData = array(
				'title'=> $this->input->post('title', TRUE),
				'content'=> $this->input->post('content', TRUE),
				'private'=> $this->input->post('private', FALSE)
			);
			$result = $this->PostModel->modifyPost($modifyData, $this->uri->segment(3));
			$this->getPostList();
		}else{
			$this->viewPost($this->uri->segment(3));
			// $data['post'] = $this -> PostModel -> getPost($this->uri->segment(4));
			// $data['user'] = $this -> UserModel -> getUser($this->uri->segment(5));
			// $this -> load -> view('modify_post', $data);
		}
	}

	function confirmUser(){
		$func = $this->uri->segment(3);

		if($_POST){
			$result = $this->UserModel->confirmPW($this->input->post('pw', TRUE), $this->uri->segment(5));

			if($result != NULL){
				if($func == "delete")
					$this->deletePost();
				else{
					$data['post'] = $this -> PostModel -> getPost($this->uri->segment(4));
					$data['user'] = $this -> UserModel -> getUser($this->uri->segment(5));
					$this -> load -> view('modify_post', $data);
				}	
			}else{
			}

		}else{
			$data['func'] = $func;
			$data['post'] = $this -> PostModel -> getPost($this->uri->segment(4));
			$data['user'] = $this -> UserModel -> getUser($this->uri->segment(5));
			$this -> load -> view('confirm_user', $data);
		}
	}
}