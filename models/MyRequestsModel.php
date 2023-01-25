<?php

namespace models;

class MyRequestsModel extends Model
{

	public static function findAll()
	{
		$userlogged = $_SESSION["user_id"];
		$products = \MySql::connect()->prepare("SELECT *, orders.id as o_id FROM orders JOIN detailorders ON orders.id = detailorders.order_id WHERE id_user = ?");
		$products->execute(array($userlogged));


		return $products->fetchAll();
	}
}
