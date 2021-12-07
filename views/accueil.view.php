<?php 

ob_start(); 
?>
 <h1>Page d'accueil</h1>
<?php
$content = ob_get_clean();
$titre = "Prendre une commande pour un client";
require "template.php";
?>