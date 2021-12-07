<?php 
ob_start(); 
?>

<div class="row">
    <div class="col-6">
        
    </div>
    <div class="col-6">
        <p>nom : <?= $client->getNom(); ?></p>
        <p>prenom : <?= $client->getPrenom(); ?></p>
        <p>email : <?= $client->getEmail(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $client->getPrenom();
require "views/template.php";
?>