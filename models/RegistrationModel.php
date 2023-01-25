<?php
	namespace models;

use Exception;

	class RegistrationModel extends Model
	{

		public function store($username,$email,$password,$phone,$gender,$birth,$adress){
			try{
				$stmt = \Mysql::connect()->prepare("INSERT INTO users VALUES(null,?,?,?,?,?,?,?,?)");
				$stmt->execute(array($username,$email,$password,$phone,$gender,$birth,$adress,0));

				return $stmt;
			}catch(Exception $e){
				echo "<script>alert('Algum erro aconteceu no banco de dados');</script>";
			}
			
		}
		
	}
?>