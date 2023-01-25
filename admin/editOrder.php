<?php
include("partials/header.php");
include("orderController.php");

$id = $_GET["id"];
include("connection.php");
$stmt = $connection->prepare("SELECT detailorders.id as detail_id,detailorders.drawee,detailorders.order_id,products.id,products.name,products.stock,detailorders.price,
detailorders.quantity,products.stock FROM detailorders JOIN products ON detailorders.product_id = products.id  where order_id = ?");

$stmt->execute(array($id));
$datas = $stmt->fetchAll();

$userData = $connection->prepare("SELECT *FROM orders JOIN users ON users.id = orders.id_user WHERE orders.id = ?");

$userData->execute(array($id));
$datas2 = $userData->fetchAll();

if (isset($_POST["submit"])) {
    $option = $_POST["option"];

    $updateStatus = $connection->prepare("UPDATE orders SET status= ? WHERE id = ?");
    $updateStatus->execute(array($option, $id));

    header("Location: listOrder.php");
}

if (isset($_POST["reduce"])) {
    $idproduct = $_POST["product_id"];
    $qty = $_POST["quantity"];
    $detailid = $_POST["detail_id"];
    $stockQty;

    $getProduct = $connection->prepare("SELECT *FROM products WHERE id = ? ");

    $getProduct->execute(array($idproduct));
    $getProductDatas = $getProduct->fetchAll();

    foreach ($getProductDatas as $product) {
        $stockQty = $product["stock"];
    }
    $stock = $stockQty - $qty;
    if ($qty > $stockQty) {
        echo "<script>alert('A quantidade pedida é maior que a quantidade em stock');
        window.history.back ();
        </script>";
    } else {
        $updateStock = $connection->prepare("UPDATE products SET stock= ? WHERE id = ?");
        $updateStock->execute(array($stock, $idproduct));

        $updateDetailOrder = $connection->prepare("UPDATE detailorders SET drawee= ? WHERE id = ?");
        $updateDetailOrder->execute(array(1, $detailid));

        echo "<script>
        alert('Pedido retirado');
        window.history.back ();
        </script>";
    }
}
?>
<div class="container">

    <h1>Detalhes do Pedido</h1>

    <?php
    foreach ($datas2 as $data) {
        print "<strong>Pedido:</strong> " . $id . "<br>";
        print "<strong>NOME:</strong> " . $data["name"] . "<br>";
        print "<strong>EMAIL:</strong> " . $data["email"] . "<br>";
        print "<strong>TELEFONE:</strong> " . $data["phone"] . "<br>";
        print "<strong>ENDEREÇO:</strong> " . $data["adress"] . "<br><br>";
        switch ($data["status"]) {
            case 0:
                print "<strong>STATUS:</strong> SOLICITAÇÃO<br><br>";
                break;
            case 1:
                print "<strong>STATUS:</strong> PROCESSAMENTO<br><br>";
                break;
            case 2:
                print "<strong>STATUS:</strong> FINALIZAÇÃO<br><br>";
                break;
            case 3:
                print "<strong>STATUS:</strong> RECUSADO<br><br>";
                break;
        }
    }
    ?>

    <div>
        <form method="post">
            <select name="option">
                <option desabled>Selecionar</option>
                <option value="0">Solicitação</option>
                <option value="1">Processamento</option>
                <option value="2">Finalização</option>
                <option value="3">Recusado</option>
            </select>
            <button type="submit" name="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Preço unitário</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Total</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datas as $data) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data["detail_id"] ?></th>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php echo $data["price"] ?></td>
                    <td><?php echo $data["quantity"] ?></td>
                    <td><?php echo $data["price"] * $data["quantity"] ?></td>
                    <form method="post">
                        <input type="hidden" name="product_id" value="<?php echo $data['id'] ?>">
                        <input type="hidden" name="detail_id" value="<?php echo $data['detail_id'] ?>">
                        <input type="hidden" name="quantity" value="<?php echo $data["quantity"] ?>">
                        <td><button type="submit" name="reduce" <?php if ($data["drawee"] !== 0) echo "disabled" ?> class="btn btn-primary">Reduzir</button></td>
                    </form>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>