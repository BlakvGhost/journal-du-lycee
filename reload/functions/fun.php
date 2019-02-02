<?php
  $post = $_POST;
  $get = $_GET;
  $files = $_FILES;
  $doc = $get['doc'];
  $article = $get['article'];
  $file_to = 'img/login-person.png';
  $moi = $_SESSION;
  $online = $_SESSION['online'];

    function connect($dbname ='jdl' ,$user ='jdl',$pass = 'passme#')
  {
    try {
    $db = new PDO("mysql:host=localhost;dbname=$dbname","$user","$pass" );
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db;
    }
    catch (\Exception $e) {
      echo "<div class='form_check fail'> Erreur de connexion à la Base de Données !</div> ";
      die();
    }
  }

?>
