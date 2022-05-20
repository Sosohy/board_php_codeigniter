<?php

namespace application\models; 
use CodeIgniter\Model; 

class Comment extends Model
{
	protected $id = 0;
	protected $postIdx = 0;
    protected $content = '';
    protected $writer = 0;
    protected $photo = '';
}