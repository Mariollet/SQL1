<?php
class MyCMSPDO
{

  function __construct()
  {
  }
  public static function getPDOInstance()
  {
    try {
      // new appelle le constructeur (__construct) de la classe PDO
      $pdo = new PDO('mysql:host=local.php.my;dbname=mycms;charset=utf8', 'diginamic', '123');
      // -> permet d'appeler les méthodes (ou les attributs) de l'objet
      // :: Appel d'une méthode "static" ou méthode de classe
      // setAttribute est une méthode de la classe PDO
      // ATTR_ERRMODE est attribut static (sans $ signifie que c'est une constante de classe)
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      return $pdo;
    } catch (PDOException $e) {
      echo "Pb de connexion à la base de données ", $e->getMessage();
    }
  }
  public static function getAllNodes()
  {
    $pdo = self::getPDOInstance();
    // Vue de tous mes nodes
    // Paramètres de la requête préparée stockés dans un tableau associatif
    $data = [
    ];
    // Requête préparée. pdo->prepare renvoie un objet puisque l'on va pouvoir appeler la 
    // méthode execute (cf ligne 47). Attention, cette requête attend des paramètres (:type)
    $req = $pdo->prepare('SELECT * FROM node');

    //Execution de la requête. L'argument $data va permettre de remplacer les paramatres de la 
    // requête
    $req->execute($data);
    return $req;
  }
  public static function updateNode()
  {
    $pdo = self::getPDOInstance();
    try {
      $data = [
        'nid' => $_POST['nid'],
        'type' => $_POST['type'],
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'summary' => $_POST['summary'],
        'seo_title' => $_POST['seo_title'],
        'path' => $_POST['path']
      ];

      $req = $pdo->prepare('UPDATE node SET 
          type = :type,    
          title = :title,    
          body = :body,    
          summary = :summary,   
          seo_title = :seo_title,    
          path = :path    
          WHERE nid = :nid');
      $req->execute($data);
    } catch (PDOException $e) {
      echo "Pb de requête", $e->getMessage();
    }
  }
  public static function getNode()
  {
    $pdo = self::getPDOInstance();
    // Récupération de la données via une requête préparée
    // Paramètres de la requête préparée
    $data = [
      'nid' => $_GET['nid']
    ];
    // Requête préparée
    $req = $pdo->prepare('SELECT * FROM node WHERE nid = :nid');

    //Execution de la requête
    $req->execute($data);

    // Récupération de la donnée
    return $req->fetch(PDO::FETCH_ASSOC);
  }

  public static function createNode()
  {
    $pdo = self::getPDOInstance();
    try {
      $data = [
        'type' => $_POST['type'],
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'summary' => $_POST['summary'],
        'seo_title' => $_POST['seo_title'],
        'path' => $_POST['path']
      ];

      $req = $pdo->prepare('INSERT INTO 
        mycms.node(type,title,body,summary,seo_title, path)
        VALUES (:type,:title,:body,:summary,:seo_title,:path)
          ');
      $req->execute($data);
    } catch (PDOException $e) {
      echo "Pb de requête", $e->getMessage();
    }
  }

  public static function deleteNode()
  {
    $pdo = self::getPDOInstance();
    // Récupération de la données via une requête préparée
    // Paramètres de la requête préparée
    $data = [
      'nid' => $_GET['nid']
    ];
    // Requête préparée
    $req = $pdo->prepare('DELETE FROM node WHERE nid = :nid');

    //Execution de la requête
    $req->execute($data);

  }
}
