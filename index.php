<?php
// Récupération de l'instance de pdo
require_once($_SERVER["DOCUMENT_ROOT"] . "/exos/sql1/model/MyCMSPDO.php");

// Est-ce que je dois modifier un enregistrement ?
// Si je dois modifier un enregistrement, c'est que je suis en méthode POST
if (isset($_POST["nid"])) {
  MyCMSPDO::updateNode();
}
if (isset($_POST["create_node"])) {
  MyCMSPDO::createNode();
}
if (isset($_GET["delete_node"])) {
  MyCMSPDO::deleteNode();
}
// Récupération des données venant de la base de données via une requête préparée
$req = MyCMSPDO::getAllNodes();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des nodes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>

<body>

  <table class="table table-bordered table-striped">
    <tr class="thead-dark">
      <th style="text-align: left;">ID</th>
      <th style="text-align: left;">Type</th>
      <th style="text-align: left;">Titre</th>
      <th style="text-align: left;">Titre SEO</th>
      <th style="text-align: left;">Sommaire</th>
      <th style="text-align: left;">Corps</th>
      <th style="text-align: left;">Action</th>
    </tr>
    <?php while ($record = $req->fetch(PDO::FETCH_ASSOC)) : ?>
      <tr>
        <td><?= $record['nid'] ?></td>
        <td><?= $record['type'] ?></td>
        <td><?= $record['title'] ?></td>
        <td><?= $record['seo_title'] ?></td>
        <td><?= $record['summary'] ?></td>
        <td><?= $record['body'] ?></td>
        <td class="text-center">
          <a class="btn btn-block btn-warning m-1" href="/exos/sql1/editnode.php?nid=<?= $record['nid'] ?>">Modifier</a>
          
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-block btn-outline-danger m-1" data-toggle="modal" data-target="#exampleModal<?= $record['nid'] ?>">
            Supprimer
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal<?= $record['nid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment supprimer <?= $record['type'] ?> : <b><?= $record['title'] ?></b> ?
                </div>
                <div class="modal-footer">
                  <a class="btn btn-danger m-1" href="./index.php?nid=<?= $record['nid'] ?>&delete_node=true">Supprimer</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                </div>
              </div>
            </div>
          </div>

        </td>
      </tr>
    <?php endwhile ?>
  </table>

  <a href="./createnode.php" class="btn btn-block btn-lg btn-success">Créer un Node</a>

</body>

</html>