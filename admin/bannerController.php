<?php

function listAllBanners()
{
    include("connection.php");

    $stmt = $connection->prepare("SELECT *FROM banner");
    $stmt->execute();
    $datas = $stmt->fetchAll();

    return $datas;
}

function saveImages($name, $image)
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
    $stmt = $connection->prepare("INSERT INTO banner VALUES(null,?,?)");
    $stmt->execute(array($name, $imagePath));
    $datas = $stmt->fetchAll();

    return $datas;
}

function editProduct($id)
{
    include("connection.php");
    $stmt = $connection->prepare("SELECT *FROM banner WHERE id=?");
    $stmt->execute(array($id));
    $datas = $stmt->fetch();

    return $datas;
}

function updatePublicity($id, $name, $image)
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
    $stmt = $connection->prepare("UPDATE banner SET name=?,image=? WHERE id=?");
    $stmt->execute(array($name, $imagePath, $id));
}
