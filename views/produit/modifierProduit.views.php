<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>produits/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $produit->getTitre() ?>">
    </div>
    <div class="form-group">
        <label for="prix">Prix : </label>
        <input type="number" class="form-control" id="prix" name="prix" value="<?= $produit->getPrix() ?>">
    </div>
    <h3>Images : </h3>
    <img src="<?= URL ?>public/images/<?= $produit->getImage(); ?>">

    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $produit->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification du Produit :  ".$produit->getId();
require "views/template.php";
?>