<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller 
{
	function __construct(){
		        parent::__construct();
		        $this->load->database();
		        $this->load->model('PostModel');
				$this->load->model('UserModel');
				$this->load->model('CommentModel');
	}

	public function index() {
		$this -> getPostList();
	}

	//post
	public function getPostList() {
		$data['postList'] = $this -> PostModel -> getPostList();
		$this -> load -> view('post_list', $data);
	}

	public function viewPost($idx=1) {
		$data['post'] = $this -> PostModel -> getPost($idx);
		$data['user'] = $this->UserModel->getUser($data['post']->writer);
		$data['commentList'] = $this -> CommentModel -> getCommentList($idx);
		$this -> load -> view('view_post', $data);
	}

	public function writePost(){
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
		}
	}

	function deletePost(){
		$result = $this->PostModel->deletePost($this->uri->segment(4));
		if($result > 0)
			$this->UserModel->deleteUser($this->uri->segment(5));
		$this->getPostList();
	}

	function searchPost(){
		$word = $this->input->post('searchWord', TRUE);
		$data['postList'] = $this -> PostModel -> searchPost($word);
		$data['word'] = $word;
		$this -> load -> view('post_search', $data);
	}


	//comment
	function writeComment(){
		if($_POST){
			$userData = array(
				'name'=> $this->input->post('name', TRUE),
				'pw'=> $this->input->post('pw', TRUE),
			);
			$result = $this->UserModel->registerCommentUser($userData);

			$commentData = array(
				'post_idx'=> $this->uri->segment(3),
				'writer'=> $result,
				'content'=>$this->input->post('content', TRUE)
			);
			$comment_result = $this->PostModel->writeComment($commentData);
			$this->viewPost($this->uri->segment(3));
		}
	}

	function deleteComment(){
		$result = $this->CommentModel->deleteComment($this->uri->segment(4), $this->uri->segment(5));
		if($result > 0)
			$this->UserModel->deleteUser($this->uri->segment(5));
		$this->viewPost($this->uri->segment(4));
	}
	
	//user
	function confirmUser(){
		$func = $this->uri->segment(3);

		if($_POST){
			$result = $this->UserModel->confirmPW($this->input->post('pw', TRUE), $this->uri->segment(5));

			if($result != NULL){
				if($func == "delete")
					$this->deletePost();
				else if($func){
					$data['post'] = $this -> PostModel -> getPost($this->uri->segment(4));
					$data['user'] = $this -> UserModel -> getUser($this->uri->segment(5));
					$this -> load -> view('modify_post', $data);
				}	
			}else{
				echo '<script type="text/javascript">'; 
				echo 'alert("비밀번호가 일치하지 않습니다."); history.back();'; 
				echo '</script>';
			}
		}else{
			$data['func'] = $func;
			$data['post'] = $this -> PostModel -> getPost($this->uri->segment(4));
			$data['user'] = $this -> UserModel -> getUser($this->uri->segment(5));
			
			if($func == "commentDelete")
				$this -> load -> view('comment_user', $data);
			else
				$this -> load -> view('confirm_user', $data);
		}
	}

	

}