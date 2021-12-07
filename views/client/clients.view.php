<?php 
require_once "models/client/ClientManager.class.php";
ob_start(); 
?>
<div class="container">
    <table class="table text-center">
        <tr class="table-default">
            <th>nom</th>
            <th>prenom</th>
            <th>email</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php 
        for($i=0; $i < count($clients);$i++) : 
        ?>
        <tr>
            <td class="align-middle"><?= $clients[$i]->getNom(); ?></td>
            <td class="align-middle"><a href="<?= URL ?>clients/l/<?= $clients[$i]->getId(); ?>"><?= $clients[$i]->getPrenom(); ?></a></td>
            <td class="align-middle"><?= $clients[$i]->getEmail(); ?></td>
            <td class="align-middle"><a href="<?= URL ?>clients/m/<?= $clients[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>clients/s/<?= $clients[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le client ?');">
                    <button class="btn btn-danger" type="submit">Suppprimer</button>
                </form>

            </td>
        </tr>
        <?php endfor; ?>
    </table>
</div>
<div class="container">
    <a href="<?= URL ?>clients/a" class="btn btn-success d-block">Ajouter</a>
</div>

<?php
$content = ob_get_clean();
$titre = "Les clients de la cafet";
require "views/template.php";
?>