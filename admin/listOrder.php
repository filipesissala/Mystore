<?php
include("partials/header.php");
include("orderController.php");
?>

<div class="container">

    <h1>Lista de Pedidos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (listProduct() as $data) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data["id"] ?></th>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php
                        switch ($data["status"]) {
                            case 0:
                                echo "Solicitação";
                                break;
                            case 1:
                                echo "Processamento";
                                break;
                            case 2:
                                echo "Finalização";
                                break;
                            case 3:
                                echo "Recusado";
                                break;
                        }
                        ?></td>
                    <td><?php echo $data["date"] ?></td>
                    <td class="btn-aye">
                        <a href="editOrder.php?id=<?php echo $data["id"]; ?>"><span class="material-symbols-outlined">
                                visibility
                            </span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>