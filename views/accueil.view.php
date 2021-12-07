<?php 

ob_start(); 
?>
<br>
<div class="container">
<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title text-center">PETIT jean</h5>
    <div class="row">
        
            <div class="col-md-6">
                <p class="card-text text-center">depuis le : 02/10/2021</p>
                <a href="#" class="btn btn-primary text-center">voir Détails</a>
            </div>
            <div class="col-md-6">
                <p class="text-center">prix total : 97 €</p>
            </div>
     
    </div>
  </div>
</div>
<br>
<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title text-center">FORET veronique</h5>
    <div class="row">
       
            <div class="col-md-6">
                <p class="card-text text-center">depuis le : 02/09/2021</p>
                <a href="#" class="btn btn-primary text-center">voir Détails</a>
            </div>
            <div class="col-md-6">
                <p class="text-center">prix total : 48 €</p>
            </div>
        
    </div>
  </div>
</div>
<br>
<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title text-center">POIGNY damien</h5>
    <div class="row">
     
            <div class="col-md-6">
                <p class="card-text text-center">depuis le : 22/08/2021</p>
                <a href="#" class="btn btn-primary text-center">voir Détails</a>
            </div>
            <div class="col-md-6">
                <p class="text-center">prix total : 18 €</p>
            </div>
    
    </div>
  </div>
</div>
</div>

<?php
$content = ob_get_clean();
$titre = "Résumé commande client";
require "template.php";
?>