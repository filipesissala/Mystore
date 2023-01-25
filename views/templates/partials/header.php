<?php include "config/session.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>views/templates/css/style.css" />
  <link rel="stylesheet" href="views/templates/css/bootstrap.min.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <title>Home</title>
</head>

<body>
  <header>
    <nav class="nav container">
      <a href="<?php echo INCLUDE_PATH; ?>" class="logo">Mystore</a>
      <div>
        <i class="bx bx-shopping-bag" id="cart-icon"></i>
        <aside class="cart">
          <a href="<?php echo INCLUDE_PATH; ?>myRequests">Meus pedidos</a>
          <h2 class="cart-title">Seu Carrinho</h2>
          <div class="cart-content">

            <div class="total">
              <div class="total-title">Total</div>
              <div class="total-price">0Kzs</div>
            </div>
            <button class="btn-buy">Comprar</button>
            <i class="bx bx-x" id="close-cart"></i>
          </div>
        </aside>
        <a href="<?php echo INCLUDE_PATH; ?>login" class="bx bx-log-in" id="login-icon"></a>
      </div>
    </nav>
  </header>