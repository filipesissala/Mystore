<?php
include('config/database.php');
error_reporting(E_ERROR | E_PARSE);
$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
$stmt = $dbh->prepare("SELECT *FROM banner");
$stmt->execute();
$allData = $stmt->fetchAll();
?>
<div class="banner">
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <?php
      foreach ($allData as $key => $data) {
      ?>
        <?php

        if ($key == 0) { ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key ?>" class="active" aria-current="true" aria-label="Slide <?php echo $key ?>"></button>
        <?php } ?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key + 1 ?>" aria-label="Slide <?php echo $key ?>"></button>
      <?php
      }
      ?>
    </div>
    <div class="carousel-inner">
      <?php
      foreach ($allData as $key => $data) {
      ?>
        <?php if ($key == 0) { ?>
          <div class="carousel-item active">
            <img src="<?php echo INCLUDE_PATH; ?>admin/<?php echo $data["image"] ?>" class="d-block w-50" alt="...">
          </div>
        <?php } ?>
        <div class="carousel-item">
          <img src="<?php echo INCLUDE_PATH; ?>admin/<?php echo $data["image"] ?>" class="d-block w-50" alt="...">
        </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<section class="shop-section shop container">
  <h2 class="section-title">Produtos</h2>
  <div class="cards-content">
    <?php
    $products = \Models\HomeModel::findAll();
    foreach ($products as $product) {
    ?>
      <div class="card">
        <span class="product-id" hidden><?php echo $product['id'] ?></span>
        <img src="<?php echo INCLUDE_PATH; ?>admin/<?php echo $product['image'] ?>" alt="" class="product-img" />
        <h2 class="product-title"><?php echo $product['name'] ?></h2>
        <span class="price"><?php echo $product['price'] ?>Kzs</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
    <?php
    }
    ?>
  </div>
</section>