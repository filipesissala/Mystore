<div class="banner"></div>
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