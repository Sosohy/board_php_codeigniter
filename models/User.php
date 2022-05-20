<?php

namespace application\models; 
use CodeIgniter\Model; 

class User extends Model
{
	protected $id = 0;
	protected $name = '';
    protected $pw = '';
    protected $email = '';
}