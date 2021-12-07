<?php 


require_once "models/produit/ProduitManager.class.php";
ob_start(); 
?>
<div class="container">
  <div class="row row-cols-1 row-cols-md-2 g-800">
  <?php for($i=0; $i < count($produit);$i++) : ?>
    <div class="col" style="padding: 15px;">
      <div class="card">
       
        <div class="card-body text-center">
          <h5 class="card-title" name="titre" id="titre"><?= $produit[$i]->getTitre(); ?> </h5>
          <h5 class="card-title" name="prix" id="prix"><?= $produit[$i]->getPrix(); ?>€ </h5>
            <div>
            <form method="POST" action="<?= URL ?>commande/v" enctype="multipart/form-data">
                <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="check" name="check" style="transform : scale(3); margin-left: 25px;">

                </div>
            <div>
            
   
    <select class="form-select text-center" aria-label="Default select example" name="nombre" id="nombre" style="width: 120px; margin-left:150px;">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
    </select>
   
</form>
            </div> 
         </div>
        </div>
      </div>
    </div>
  <?php endfor; ?>
  <br>
  
  </div>
  <a href="<?= URL ?>commande/v" class="btn btn-success">ajouter Produit</a>
</div>


  
<?php
$content = ob_get_clean();
$titre = "Ajouter un produit";
require "views/template.php";
?>


