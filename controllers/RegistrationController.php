<?php
	namespace controllers;
	/**
	* 
	*/
	class RegistrationController extends Controller
	{
		
		public function __construct($view,$model){
			parent::__construct($view,$model);
		}

		public function index(){
			if(isset($_POST['action'])){
				$name = $_POST['nome'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$confirmPassword = $_POST['confirmpassword'];
				$phone = $_POST['phonenumber'];
				$gender = $_POST['gender'];
				$birth = $_POST['birth'];
				$adress = $_POST['adress'];

				if(!(empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($phone) || empty($gender) || empty($birth) || empty($adress))){
					$stmt = \Mysql::connect()->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=?");
					$stmt->execute(array($email));
					$row = $stmt->fetch();
					if($row['numrows'] > 0){
						echo "<script>alert('Erro Usuário já existe');
						window.history.back ()
						</script>";
						exit;
					}
					if($password == $confirmPassword){
						if($this->model->store($name,$email,$password,$phone,$gender,$birth,$adress)){
							echo "<script>alert('Usuário cadastrado com sucesso');</script>";
							header("Location: login");
							exit;
						}else{
							echo "<script>alert('Erro ao tentar cadastrar usuário');</script>";
						}
					}else{
						echo "<script>alert('A password e o confirmpassword não são iguais');</script>";
					}
					
				}else{
					echo "<script>alert('Preencha todos os campos corretamente');</script>";
				}
				
			}
			$this->view->render('registration.php');
		}
		
	}
?>