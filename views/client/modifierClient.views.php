<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>clients/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $client->getNom() ?>">
    </div>
    <div class="form-group">
        <label for="prenom">prenom : </label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $client->getPrenom() ?>">
    </div>
    <div class="form-group">
        <label for="email">email : </label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $client->getEmail() ?>">
    </div>
    
    <input type="hidden" name="identifiant" value="<?= $client->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification du Client :  ".$client->getNom();
require "views/template.php";
?>