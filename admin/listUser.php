<?php
include("partials/header.php");
include("userController.php");
?>

<div class="container">

    <h1>Lista de Usuários</h1>
    <a href="user.php" class="btn btn-primary btn-add">Novo usuário</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Genero</th>
                <th scope="col">Idade</th>
                <th scope="col">Morada</th>
                <th scope="col">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (listAllUsers() as $data) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data["id"] ?></th>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td><?php echo $data["phone"] ?></td>
                    <td><?php echo $data["gender"] ?></td>
                    <td><?php echo $data["birth"] ?></td>
                    <td><?php echo $data["adress"] ?></td>
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