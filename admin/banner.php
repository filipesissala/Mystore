<?php
include("partials/header.php");
include("bannerController.php");

if (isset($_POST["submit"])) {
    $image = $_FILES["image"];
    $name = $_POST["name"];

    if (empty($name) || empty($image)) {
        echo "<script>alert('Erro ao tentar cadastrar publicidade, porfavor preencha todos os campos corretamente'); 
        window.history.back ();
        </script>";
        exit;
    } else {
        try {
            saveImages($name, $image);
            echo "<script>alert('Imagem cadastrada com sucesso!');</script>";
            header("Location: listBanner.php");
            exit;
        } catch (Exception $ex) {
            echo "<script>alert('Erro ao tentar cadastrar imagem');</script>";
        }
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Cadastrar publicidade
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">imagem</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Insira o nome da publicidade">
                </div>
                <div class="form-group">
                    <label for="image">imagem</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Insira uma foto de perfil">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>