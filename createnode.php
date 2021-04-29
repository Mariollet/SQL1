<?php
// Récupération de l'instance de pdo
require_once($_SERVER["DOCUMENT_ROOT"] . "/exos/sql1/model/MyCMSPDO.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crétaion d'un node</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card">

      <div class="card-header bg-dark text-white">
        <h1>Création d'un node</h1>
      </div>

      <div class="card-body col-10 align-self-center">
        <form action="/exos/sql1/index.php" method="POST" class="form d-flex flex-column">
         
          <label for="type">Type</label>
          <input type="text" name="type">

          <label for="title">Titre</label>
          <input type="text" name="title">

          <label for="body">Corps</label>
          <textarea name="body"></textarea>

          <label for="summary">Résumé</label>
          <textarea name="summary"></textarea>

          <label for="seo_title">Titre SEO</label>
          <input type="text" name="seo_title">

          <label for="path">Chemin</label>
          <input type="text" name="path">

          <br>

          <input type="hidden" value="create_node" name="create_node">
          <input type="submit" class="btn btn-success" value="Créer">
          <br>
          <a href="./index.php" class="btn btn-outline-info">Retour</a>
        </form>
      </div>

    </div>
  </div>
</body>

</html>