<?php
include("partials/header.php");
include("bannerController.php");

$productFound = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    try {
        $productFound =  editProduct($id);
    } catch (Exception $ex) {
        echo "O id não existe ou não é válido";
    }
}

if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $name = $_POST["name"];
    $image = $_FILES["image"];
    $imageSaved = $_FILES["imageSaved"];

    if (empty($image)) {
        $image = $imageSaved;
    }

    if (empty($id) || empty($name)) {
        echo "<script>alert('Erro ao tentar cadastrar publicidade, porfavor preencha todos os campos corretamente'); 
        window.history.back ();
        </script>";
        exit;
    } else {
        try {
            updatePublicity($id, $name, $image);
            echo "<script>alert('publicidade cadastrado com sucesso!');</script>";
            header("Location: listBanner.php");
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
            Editar produto
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Descrição</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $productFound["name"] ?>" id="name" placeholder="Insira o nome da publicidade">
                </div>
                <div class="form-group">
                    <label for="image">imagem</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Insira uma foto de perfil">
                    <input type="hidden" name="imageSaved" value="<?php echo $productFound["image"] ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>