<?php
	namespace controllers;
	/**
	* 
	*/
	class LoginController extends Controller
	{
		
		public function __construct($view,$model){
			parent::__construct($view,$model);
		}

		public function index(){
			if(isset($_POST['action'])){
				$useremail = $_POST['email'];
				$userpassword = $_POST['password'];
				if(!(empty($useremail) || empty($userpassword))){
					$this->model->store($useremail,$userpassword);
				}
			}
			$this->view->render('login.php');
		}
	}
?>