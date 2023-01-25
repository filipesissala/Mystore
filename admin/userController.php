<?php

function listAllUsers()
{
    include("connection.php");

    $stmt = $connection->prepare("SELECT *FROM users");
    $stmt->execute();
    $datas = $stmt->fetchAll();

    return $datas;
}

function countUsers()
{
    include("connection.php");

    $stmt = $connection->prepare("SELECT COUNT(*) AS count FROM users");
    $stmt->execute();
    $datas = $stmt->fetch();

    return $datas;
}

function sumTotal()
{
    include("connection.php");
    $stmt = $connection->prepare("SELECT orders.id,orders.status,detailorders.product_id,detailorders.order_id,detailorders.price,detailorders.quantity, 
    SUM(quantity * price) AS total FROM detailorders 
    JOIN orders ON detailorders.order_id = orders.id 
    WHERE orders.status = 2");
    $stmt->execute();
    $datas = $stmt->fetch();

    return $datas;
}

function favorite()
{
    include("connection.php");

    $stmt = $connection->prepare("SELECT d.product_id,d.order_id,p.name 
    FROM detailorders AS d JOIN products AS p ON d.product_id = p.id 
    GROUP BY 1 ORDER BY d.product_id DESC LIMIT 1");
    $stmt->execute();
    $datas = $stmt->fetch();

    return $datas;
}
