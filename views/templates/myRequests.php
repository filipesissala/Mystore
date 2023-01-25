<!--<div class="banner"></div>-->
<section class="shop-section shop container">
  <h2 class="section-title">Meus Pedidos</h2>
  <div class="cards-content">
    <?php
    $myOrders = \Models\MyRequestsModel::findAll();
    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Ordem de Pedido</th>
          <th scope="col">Data</th>
          <th scope="col">Status</th>
          <th scope="col">Operações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($myOrders as $data) {
        ?>
          <tr>
            <th scope="row"><?php echo $data["o_id"] ?></th>
            <td><?php echo $data["date"] ?></td>
            <td><?php
                switch ($data["status"]) {
                  case 0:
                    echo "Solicitado";
                    break;
                  case 1:
                    echo "Processando...";
                    break;
                  case 2:
                    echo "Finalizado";
                    break;
                  case 3:
                    echo "Recusado";
                    break;
                }
                ?></td>

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
</section>