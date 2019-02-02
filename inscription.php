<?php
  session_start();
  ob_start();
 ?>
<?php include 'meta.php' ?>
<?php include 'functions/fun.php';$db = connect(); ?>
    <section id="main" class="bbx">
      <?php include 'header.php'; ?>
      <section class="main flex">
        <?php include 'sidebar.php'; ?>
        <section class="body w-75 sign" id="article">
          <div class="d d1 bxs">
            <p><a href="#" class="title"><i class="fa fa-gears"></i>&nbsp;&nbsp;&nbsp;&nbsp;CONNECTER-VOUS ou CREER UN COMPTE </a> </p>
          </div>
          <div class="d d1 bxs">
            <?php
            if (isset($get['not'])){
              echo "<div class='form_check fail white'>Veillez d'abord vous Connectez avant de ' ".$get['not']. "' !</div> ";
            }
             ?>
          </div>
          <div class="d bxs" id="sign">
            <div class="flex sign_m">
              <form class="" action="" method="post" enctype="multipart/form-data">
                <legend>Creer un Compte</legend>
                <?php
                if ($online){
                  header('Location:index.php?why=already_connected');
                  die();
                }
                if (isset($post['inscrire'])) {
                  if (!empty($post['nom']) && !empty($post['prenom']) && !empty($post['numero']) && $post['filiere'] !== 'Default' && $post['lycee'] && !empty($post['mdp']) && !empty($post['mdps'])) {
                    $nom = htmlentities($post['nom']);$prenom =htmlentities($post['prenom']);$num = htmlentities($post['numero']);$lycee = htmlentities($post['lycee']);$filiere = htmlentities($post['filiere']);$mdp = htmlentities($post['mdp']);
                    $e = htmlentities($post['mdps']);
                    if (strlen($nom)<20 && strlen($prenom)<20 && strlen($num) == 8) {
                      if (strlen($mdp >= 8)){
                      if ($mdp === $e) {
                        $mdp = password_hash($mdp,PASSWORD_DEFAULT);
                        $query = $db->prepare('SELECT * FROM users WHERE tel=?');
                        $query->execute(array($num));
                        if (!$query->fetch()) {
                          $file = $_FILES['profil'];
                        if (isset($file) && $file['error'] == 0){
                          $extensions = ['png','jpg','jpeg'];
                          $extension = basename($file['type']);
                          if ($file['size'] <= 8388608 && in_array($extension,$extensions) ) {
                            $file_from = $file['tmp_name'];
                            $file_to = 'assets' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $num . '_profile.png';
                            $download = move_uploaded_file($file_from,$file_to);
                          }else {
                            echo "<div class='form_check warning'> Fichier image trop lourd ou Erreur de format de l'image,envoyez uniquement des photo png,jpeg & jpg !</div> ";
                          }
                    }else {
                        echo "<div class='form_check warning'> Vous n'evez pas chargé d'image ou erreur de chargement,Votre compte sera crée sans photo de profile !</div> ";
                    }
                    $query = $db->prepare('INSERT INTO users(nom,prenom,tel,lycee,filiere,mdp,photo) VALUES (?,?,?,?,?,?,?)');
                    $add = $query->execute(array($nom,$prenom,$num,$lycee,$filiere,$mdp,$file_to));
                    if ($add) {
                      echo "<div class='form_check done'>". $nom . ' '.$prenom . '  Inscrit avec succes' ." </div> ";
                      $_SESSION['online'] = true;
                      $_SESSION['nom'] = $nom;$_SESSION['prenom'] = $prenom;$_SESSION['creation'] = date('Y-m-d H:i:s');$_SESSION['photo'] = $file_to;$_SESSION['filiere'] = $filiere;$_SESSION['lycee'] = $lycee;$_SESSION['tel'] = $num;
                      if (isset($get['url'])){
                        if (isset($get['id'])){
                          header('Location:'.$get['url'].'.php'.'?id='.$get['id']);
                        }else {header('Location:'.$get['url'] .'.php');}
                      }else{
                        header('Location:index.php');
                      }
                    }else {
                      echo "<div class='form_check fail'> Erreur d'Enregistrement !</div> ";
                    }
                        }else {
                          echo "<div class='form_check fail'>Erreur ! Le numero de Téléphone est déjà utilisé,Si vous avez oublié votre mot de passe cliquer <a href=\"#\">Mot de Passe oublié ?</a> </div> ";
                        }
                      }else {
                        echo "<div class='form_check fail'>Vos deux mot de Passe sont differents,Réessayez à nouveau !</div> ";
                      }
                      }else {
                          echo "<div class='form_check fail'>Mot de Passe trop court !</div> ";
                          }
                    }else{
                      echo "<div class='form_check fail'>Nom ou Prénom ou Numero de téléphone trop long,Réessayez à nouveau !</div> ";
                    }
                  }else {
                    echo "<div class='form_check fail'>Veillez bien rempli tout les champs !</div> ";
                  }
                }
                 ?>
                <div class="ins">
                  <input type="file" name="profil" class="dnone fs">
                  <p class="file" onclick="document.querySelector('.fs').click()"><i class="fa fa-2x fa-cloud-upload"></i><br>Selectionner la photo de profile </p>
                  <input type="text" name="nom" value="" placeholder="Entrer votre nom">
                  <input type="text" name="prenom" value="" placeholder="Entrer votre Prenom">
                  <input type="number" name="numero" value="" placeholder="Entrer votre Numero de Telephone">
                  <nav class="flex sl-m justify-sb">
                    <select class="sl sl3" name="lycee">
                      <option value="Default">Votre Lycée</option>
                      <option value="LTN">LTN</option>
                    </select>
                    <select class="sl sl2" name="filiere">
                      <option value="Default">Votre Filieres</option>
                      <option value="STI">STI</option>
                      <option value="STAG">STAG</option>
                      <option value="HR">HR</option>
                    </select>
                  </nav>
                  <input type="password" name="mdp" value="" placeholder="Entrer un mot de passe">
                  <input type="password" name="mdps" value="" placeholder="Retaper le mot de passe">
                  <input type="submit" name="inscrire" value="S'INSCRIRE">
                </div>
              </form>
        <form class="" action="" method="post">
                <legend>Connectez-Vous</legend>
                <?php
                if (isset($post['connect']))
                  if (!empty($post['numero']) && !empty($post['mdp']) && $post['lycee'] !== 'Default' ) {
                    $check = $db->prepare("SELECT * FROM users WHERE tel=?");
                    $check->execute(array(htmlentities($post['numero'])));
                    if ($datas = $check->fetch()) {
                      if (password_verify($post['numero'],$datas['mdp'])) {
                        $_SESSION['online'] = true;
                        $_SESSION['nom'] = $datas['nom'];$_SESSION['prenom'] = $datas['prenom'];$_SESSION['creation'] = $datas['date'];$_SESSION['photo'] = $datas['photo'];$_SESSION['filiere'] = $datas['filiere'];$_SESSION['lycee'] = $datas['lycee'];
                        $_SESSION['tel'] = $datas['tel'];
                        if (isset($get['url'])){
                          if (isset($get['id'])){
                            header('Location:'.$get['url'].'.php'.'?id='.$get['id']);
                          }else {header('Location:'.$get['url'] .'.php');}
                        }else {
                          header('Location:index.php');
                        }
                      }else {
                        echo "<div class='form_check fail'>Mot de passe incorrect,Réessayez à nouveau ou cliquer <a href=\"#\">Mot de Passe oublié ?</a> !</div> ";
                      }
                    }else {
                      echo "<div class='form_check fail'>Numero incorrect,Réessayez à nouveau !</div> ";
                    }
                  }else {
                    echo "<div class='form_check fail'>Veillez bien rempli tout les champs !</div> ";
                  }
                 ?>
                <div class="ins">
                  <input type="number" name="numero" value="" placeholder="Entrer votre Numero de Telephone">
                    <select class="sl sl3" name="lycee">
                      <option value="Default">Selectionner Votre Lycée</option>
                      <option value="LTN">LTN</option>
                    </select>
                  <input type="password" name="mdp" value="" placeholder="Entrer un mot de passe">
                  <input type="submit" name="connect" value="SE CONNECTER">
                </div>
                <p class="a-s"><a href="#" class="">Mot de Passe oublié ?</a></p>
              </form>
            </div>
          </div>
        </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
