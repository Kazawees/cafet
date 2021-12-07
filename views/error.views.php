<?php 
ob_start(); 
?>

<?= $msg; ?>

<?php
$content = ob_get_clean();
$titre = "ERREUR 404 !";
require "template.php";
?>