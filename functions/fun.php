<?php
  $post = $_POST;
  $get = $_GET;
  $files = $_FILES;
  $doc = isset($get['doc']) ?? null;
  $article = isset($get['article']) ?? null;
  $file_to = 'img/login-person.png';
  $moi = isset($_SESSION) ?? null;
  $online = isset($_SESSION['online']) ?? null;

    function connect($dbname ='jdl' ,$user ='root',$pass = '')
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
