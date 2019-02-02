<!DOCTYPE html>
<html lang="fr" dir="ltr" manifest="manifest.json">
  <head>
    <?php $agent = $_SERVER['HTTP_USER_AGENT']; ?>
    <meta charset="utf-8">
    <title>Journal du Lycée</title>
    <meta name="description" content="Publier vos receuilles littérales et des articles sur vos filieres afin d'aider les autres">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/forum.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/require.css">
    <?php if (strstr($agent,'Android') || strstr($agent,'iPhone') || strstr($agent,'iPad') ): ?>
      <link rel="stylesheet" href="css/mobile.css">
    <?php endif; ?>
    <script src="vendors/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
   });
  </script>
  </head>
  <body>
