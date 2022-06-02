<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller 
{
	function __construct(){
		        parent::__construct();
		        $this->load->database();
		        $this->load->model('PostModel');
		    }

	public function index()
	{
		$this->getPostList();
	}

	public function getPostList(){
		        $data['postList'] = $this->PostModel->getPostList();
				$this->load->view('post_list', $data);
		    }
}
