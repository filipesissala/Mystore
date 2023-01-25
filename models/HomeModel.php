<?php
	namespace models;
	class HomeModel extends Model
	{

		public static function findAll(){
		$products = \MySql::connect()->prepare("SELECT * FROM products WHERE available = 1 and stock > 0");
		$products->execute();


		return $products->fetchAll();
		}
		
	}
?>