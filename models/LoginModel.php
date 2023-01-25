<?php
	namespace models;
	include('config/session.php');
	class LoginModel extends Model
	{
		public function store($useremail,$userpassword){
			$stmt = \Mysql::connect()->prepare("SELECT * FROM users WHERE email = ?");
			$stmt->execute(array($useremail));
			$user = $stmt->fetchAll();
			
			if($user){
				foreach($user as $item){
					$userId = $item['id'];
					$username = $item['name'];
					$useremail = $item['email'];
					$pass = $item['password'];
					$isAdmin = $item['isAdmin'];
				}
					if($userpassword == $pass){
						$_SESSION["user_id"] = $userId;
						$_SESSION["name"] = $username;
						if($isAdmin == 1){
							echo "<script>alert('Dentro');</script>";
							header("Location: ".INCLUDE_PATH."admin");
							exit;
						}else{
							header("Location: home");
							exit;
						}
						
					}else{
						echo "<script>alert('Acesso negado, verifique suas credenciais');</script>";
					}
			}else{
				echo "<script>alert('Usuário não existe!');</script>";
			}
			
		}
		
		
	}
?>