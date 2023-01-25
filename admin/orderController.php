<?php

function listProduct()
{
    include("connection.php");
    $stmt = $connection->prepare("SELECT orders.id,name,status,date FROM orders JOIN users ON orders.id_user = users.id ORDER BY orders.id DESC");
    $stmt->execute();
    $datas = $stmt->fetchAll();

    return $datas;
}

function saveProduct($name, $price, $description, $image, $stock, $checkbox)
{
    if (!preg_match("/^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$/", $image["type"])) {
        $error[1] = "O ficheiro escolhido não é uma imagem.";
        echo "<script>alert('Erro $error');</script>";
    }
    // Pega extensão da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image["name"], $ext);
    // Gera um nome único para a imagem
    $imageName = md5(uniqid(time())) . "." . $ext[1];
    // Caminho de onde ficará a imagem
    $imagePath = "uploads/" . $imageName;

    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($image["tmp_name"], $imagePath);


    include("connection.php");
    $stmt = $connection->prepare("INSERT INTO products VALUES(null,?,?,?,?,?,?)");
    $stmt->execute(array($name, $price, $description, $imagePath, $stock, $checkbox));
    $datas = $stmt->fetchAll();

    return $datas;
}

function editProduct($id)
{
    include("connection.php");
    $stmt = $connection->prepare("SELECT * FROM detailorders where order_id = ?");
    $stmt->execute(array($id));
    $datas = $stmt->fetchAll();

    return $datas;
}

function updateProduct($id, $name, $price, $description, $image, $stock, $checkbox)
{
    if (!preg_match("/^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$/", $image["type"])) {
        $error[1] = "O ficheiro escolhido não é uma imagem.";
        echo "<script>alert('Erro $error');</script>";
    }
    // Pega extensão da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image["name"], $ext);
    // Gera um nome único para a imagem
    $imageName = md5(uniqid(time())) . "." . $ext[1];
    // Caminho de onde ficará a imagem
    $imagePath = "uploads/" . $imageName;

    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($image["tmp_name"], $imagePath);


    include("connection.php");
    $stmt = $connection->prepare("UPDATE products SET name=?,price=?,description=?,image=?,stock=?,available=? WHERE id=?");
    $stmt->execute(array($name, $price, $description, $imagePath, $stock, $checkbox, $id));
}
