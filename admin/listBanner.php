<?php
include("partials/header.php");
include("bannerController.php");
?>

<div class="container">

    <h1>Lista de publicidades</h1>
    <a href="banner.php" class="btn btn-primary btn-add">Nova publicidade</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (listAllUsers() as $data) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data["id"] ?></th>
                    <td id="productId"><img src="<?php echo $data["image"] ?>" alt=""></td>
                    <td><?php echo $data["name"] ?></td>
                    <td>
                        <a href=""><span class="material-symbols-outlined">
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