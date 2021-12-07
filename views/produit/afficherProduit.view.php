<?php 
ob_start(); 
?>

<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?= $produit->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Titre : <?= $produit->getTitre(); ?></p>
        <p>Prix : <?= $produit->getPrix(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $produit->getTitre();
require "views/template.php";?>