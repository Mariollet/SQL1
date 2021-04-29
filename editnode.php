<?php
// Récupération de l'instance de pdo
require_once($_SERVER["DOCUMENT_ROOT"] . "/exos/sql1/model/MyCMSPDO.php");

// Récupération d'un node
$record = MyCMSPDO::getNode();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modification d'un node</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card">

      <div class="card-header bg-dark text-white">
        <h1>Modification du node <?= $_GET['nid'] ?></h1>
      </div>

      <div class="card-body col-10 align-self-center">
        <form action="/exos/sql1/index.php" method="POST" class="form d-flex flex-column">
          
          <label for="type">Type</label>
          <input list="types"  value="<?= $record['type'] ?>" name="type" id="type">
          <datalist id="types">
            <option value="article">
          </datalist>

          <label for="title">Titre</label>
          <input type="text" value="<?= $record['title'] ?>" name="title">

          <label for="body">Corps</label>
          <textarea name="body"><?= $record['body'] ?></textarea>

          <label for="summary">Résumé</label>
          <textarea name="summary"><?= $record['summary'] ?></textarea>

          <label for="seo_title">Titre SEO</label>
          <input type="text" value="<?= $record['seo_title'] ?>" name="seo_title">

          <label for="path">Chemin</label>
          <input type="text" value="<?= $record['path'] ?>" name="path">

          <br>

          <input type="hidden" value="<?= $record['nid'] ?>" name="nid">
          <input type="submit" class="btn btn-success" value="Modifier">
          <br>
          <a href="./index.php" class="btn btn-outline-info">Retour</a>
        </form>
      </div>

    </div>
  </div>
</body>

</html>