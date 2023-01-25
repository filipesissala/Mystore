<?php

include("config/database.php");
	

	class MySql
	{
		private $pdo;
		
		public static function connect(){
			if(!isset($pdo)){
				$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
			}

			return $pdo;
		}
	}
?>