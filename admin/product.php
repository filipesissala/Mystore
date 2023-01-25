<?php
include("partials/header.php");
include("productController.php");

if (isset($_POST["submit"])) {
    $image = $_FILES["image"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $description = $_POST["description"];

    if ($checkbox = $_POST["checkbox"] == "on") {
        $checkbox = 1;
    } else {
        $checkbox = 0;
    }
    if (empty($image) || empty($name) || empty($price) || empty($description)) {
        echo "<script>alert('Erro ao tentar cadastrar produto, porfavor preencha todos os campos corretamente'); 
        window.history.back ();
        </script>";
        exit;
    } else {
        try {
            saveProduct($name, $price, $description, $image, $stock, $checkbox);
            echo "<script>alert('Produto cadastrado com sucesso!');</script>";
            header("Location: listProduct.php");
            exit;
        } catch (Exception $ex) {
            echo "<script>alert('Erro ao tentar cadastrar produto');</script>";
        }
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Cadastrar produto
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Disponibilidade</label>
                    <input type="checkbox" name="checkbox" class="" id="image" placeholder="Insira uma foto de perfil">
                </div>
                <div class="form-group">
                    <label for="image">imagem</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Insira uma foto de perfil">
                </div>
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Insira o nome do produto">

                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Insira o preço do produto">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control" id="stock" placeholder="Insira a quantidade em stock">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>