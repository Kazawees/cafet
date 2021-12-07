<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafet</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CAFET</font></font></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Basculer la navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= URL ?>commande"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Commande
            </font></font><span class="visually-hidden"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(courant)</font></font></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>produits"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Produit</font></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>clients"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Client</font></font></a>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Chercher">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chercher</font></font></button>
      </form>
    </div>
  </div>
</nav>
<br>

<div>
    <h1><?= $titre ?></h1>
    <?= $content ?>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>