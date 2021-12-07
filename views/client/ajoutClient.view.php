<?php 
ob_start(); 
?>
<form method="POST" action="<?= URL ?>clients/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom : </label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="form-group">
        <label for="email">email : </label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Ajout d'un produit
";
require "views/template.php";
?>