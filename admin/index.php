<?php
include("partials/header.php");
include("userController.php");
?>

<div class="card-info">

    <div class="userCounter">
        <span><?php echo countUsers()["count"] ?></span>
        Usuários
    </div>
    <div class="totalSell">
        <span><?php error_reporting(E_ERROR | E_PARSE);
                $regex = "/\B(?=(\d{3})+(?!\d))/i";
                $kzs = preg_replace($regex, ",", sumTotal()["total"] . "Kzs");
                echo $kzs  ?></span>
        Total Arrecadado
    </div>
    <div class="userCounter">
        <span><?php echo favorite()["name"]; ?></span>
        Mais requisitado
    </div>
</div>
<?php
include("partials/footer.php");
?>