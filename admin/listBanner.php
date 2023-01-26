<?php
include("partials/header.php");
include("bannerController.php");
include("connection.php");
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST["submit"])) {
    $id = $_POST["delete"];
    $stmt = $connection->prepare("DELETE FROM banner WHERE id=?");
    $stmt->execute(array($id));

    echo "<script>alert('Publicidade removida com sucesso!');</script>";
    header("Location: listBanner.php");
}
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
            foreach (listAllBanners() as $data) {
            ?>
                <tr>
                    <th scope="row"><?php echo $data["id"] ?></th>
                    <td id="productId"><img src="<?php echo $data["image"] ?>" alt=""></td>
                    <td><?php echo $data["name"] ?></td>
                    <td>
                        <a href="editBanner.php?id=<?php echo $data["id"]; ?>"><span class="material-symbols-outlined">
                                edit
                            </span></a>

                        <form method="post">
                            <input type="hidden" name="delete" value="<?php echo $data["id"]; ?>">
                            <button name="submit">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>