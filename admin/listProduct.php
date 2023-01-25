<?php
include("partials/header.php");
include("productController.php");
?>

<div class="container">

    <h1>Lista de Produtos</h1>
    <a href="product.php" class="btn btn-primary btn-add">Novo produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">Name</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                <th scope="col">Stock</th>
                <th scope="col">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (listProduct() as $data) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data["id"] ?></th>
                    <td id="productId"><img src="<?php echo $data["image"] ?>" alt=""></td>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php echo $data["price"] ?></td>
                    <td><?php echo $data["description"] ?></td>
                    <td><?php echo $data["stock"] ?></td>
                    <td>
                        <a href="editProduct.php?id=<?php echo $data["id"]; ?>"><span class="material-symbols-outlined">
                                edit
                            </span></a>
                        <a href=""><span class="material-symbols-outlined">
                                delete
                            </span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>