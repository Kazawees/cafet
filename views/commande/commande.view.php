<!--transform : scale(5);-->
<?php 

require_once "models/client/ClientManager.class.php";
ob_start(); 
?>
    <div class="container">
  <div class="row row-cols-1 row-cols-md-2 g-800">
  <?php for($i=0; $i < count($clients);$i++) : ?>
    <div class="col" style="padding: 15px;">
      <div class="card">
        <!--img src="..." class="card-img-top" alt="..."-->
        <div class="card-body text-center">
          <h5 class="card-title"><?= $clients[$i]->getPrenom(); ?> <?= $clients[$i]->getNom(); ?> </h5>
          <p class="card-text"><?= $clients[$i]->getEmail(); ?> </p>
          <a href="<?= URL ?>commande/aj/<?= $clients[$i]->getId(); ?>" class="btn btn-dark">ajouter Produit</a>
        </div>
      </div>
    </div>
  <?php endfor; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
$titre = "Commande";
require "views/template.php";
?>