<?php 
require_once "models/produit/ProduitManager.class.php";
ob_start(); 
?>
<div class="container">
    <table class="table text-center">
        <tr class="table-default">
            <th>Image</th>
            <th>Titre</th>
            <th>prix</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php 
        for($i=0; $i < count($produits);$i++) : 
        ?>
        <tr>
            <td class="align-middle"><img src="public/images/<?= $produits[$i]->getImage(); ?>" width="60px;"></td>
            <td class="align-middle"><a href="<?= URL ?>produits/l/<?= $produits[$i]->getId(); ?>"><?= $produits[$i]->getTitre(); ?></a></td>
            <td class="align-middle"><?= $produits[$i]->getPrix(); ?></td>
            <td class="align-middle"><a href="<?= URL ?>produits/m/<?= $produits[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>produits/s/<?= $produits[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le produit ?');">
                    <button class="btn btn-danger" type="submit">Suppprimer</button>
                </form>

            </td>
        </tr>
        <?php endfor; ?>
    </table>
</div>
<div class="container">
    <a href="<?= URL ?>produits/a" class="btn btn-success d-block">Ajouter</a>
</div>

<?php
$content = ob_get_clean();
$titre = "Les produits de la cafet";
require "views/template.php";
?>