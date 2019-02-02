<?php
  session_start();
  ob_start();
 ?>
<?php include 'meta.php' ?>
<?php include 'functions/fun.php' ?>
    <section id="main" class="bbx">
      <?php include 'header.php'; ?>
      <section class="main flex">
        <?php include 'sidebar.php'; ?>
        <section class="body w-75 forum publier" id="article">
          <div class="d d1 bxs">
            <p><a href="#" class="title"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp; Publier Des Articles </a> </p>
          </div>
          <div class="d bxs">
            <div class="dd">
              <div class="sub_dd">
                <p class="title"> Remplissez les champs pour soumettre votre article</p>
                <div class="">
                  <form class="" action="" method="post" enctype="multipart/form-data">
                    <?php
                    if (!$online){
                      header('Location:inscription.php?url=publier&not=publier');
                      die();
                    }
                      $db = connect();
                      if (isset($post['pub_arti'])) {
                        var_dump($_POST);
                        exit();
                        if (!empty($post['art_cn']) && !empty($post['title']) & $post['categorie'] !== 'default'){
                          $contenu_a = $post['art_cn'];
                          $title_a = htmlentities($post['title']);
                          $file = $_FILES['file_a'];
                          if (isset($file) && $file['error'] == 0){
                            $extensions = ['png','jpg','jpeg'];
                            $extension = basename($file['type']);
                            if ($file['size'] <= 8388608 && in_array($extension,$extensions) ) {
                              $file_from = $file['tmp_name'];
                              $np = mkdir('assets' . DIRECTORY_SEPARATOR . 'articles'. DIRECTORY_SEPARATOR . date('Y-m-d H:i:s'));
                              $file_to = 'assets' . DIRECTORY_SEPARATOR . 'articles' . DIRECTORY_SEPARATOR .date('Y-m-d H:i:s'). DIRECTORY_SEPARATOR . $psd . '_profile.png';
                              move_uploaded_file($file_from,$file_to);
                        }else {
                              echo "<div class='form_check fail'>Soumetter uniquement des fichiers images !</div> ";
                          }
                        }else {
                            echo "<div class='form_check warning'> Vous n'evez pas chargé d'image ou erreur de chargement,l'image par defaut sera utilisé !</div> ";
                        }
                        $query = $db->prepare('INSERT INTO articles (categorie,titre,contenu,auteur,img) VALUES (:a,:b,:c,:d,:e)');
                        $is = $query->execute(array(
                          'a' => $post['categorie'],
                          'b' => $title_a,
                          'c' => $contenu_a,
                          'd' => $moi['nom']. ' ' . $moi['prenom'] ,
                          'e' => $file_to
                        ));
                        if ($is) {
                          echo "<div class='form_check done'> Votre article a été bien soumis à l'administrateur pour être validé,Merci pour votre collaboration !</div> ";
                        }else {
                          echo "<div class='form_check fail'> Echec d'envoi de votre Article,Veillez reverifier !</div> ";
                        }
                      }else {
                            echo "<div class='form_check fail'>Veillez bien rempli tout les champs !</div> ";
                        }
                      }
                     ?>
                     <nav class="flex">
                       <input type="text" name="title" placeholder="Entrer le title de l'article">
                       <p class="file" onclick="document.querySelector('.in').click()"><i class="fa fa-2x fa-cloud-upload"></i><br>Selectionner l'image de garde </p>
                       <input type="file" name="file_a" class="dnone in">
                     </nav>
                    <textarea type="text" name="art_cn" value="" placeholder="Ecrivez ici votre article"></textarea>
                    <select class="" name="categorie">
                      <option value="default">Categories</option>
                      <optgroup label="Informatique">
                        <option value="Informatique">Informatique</option>
                        <option value="Programmation">Programmation</option>
                        <option value="Reseau">Reseau</option>
                      </optgroup>
                      <option value="Construction Batiment">Construction Batiment</option>
                      <option value="Electronique">Electronique</option>
                      <option value="Electricité">Electricité</option>
                      <option value="Mecanique">Mecanique</option>
                    </select>
                    <input type="submit" name="pub_arti" value="Publier">
                  </form>
            </div>
          </div>
        </div>
      </div>
      <div class="d bxs">
        <div class="dd">
          <div class="sub_dd">
            <p class="title"> Remplissez les champs pour soumettre votre Document</p>
            <div class="">
              <form class="dc-fr" action="" method="post" enctype="multipart/form-data">
                <?php

                if (isset($post['pub_doc'])) {
                  $doc = $_FILES['doc'];
                  if (isset($doc) && $post['tp_doc'] !== 'default' && $post['sl_fl'] !== 'default' && $post['lycee'] !== 'default' && !empty($post['doc_name'])) {
                    if ($doc['error'] == 0 ){
                      $exts_doc = ['doc','docx','pdf','xls'];
                      $ext_doc = pathinfo($doc['name']);
      if ($doc['size'] <= 88888838998608 && in_array($ext_doc['extension'],$exts_doc) ) {
                        $file_from = $doc['tmp_name'];
                        mkdir('assets' . DIRECTORY_SEPARATOR . 'Documents'. DIRECTORY_SEPARATOR . date('Y-m-d H:i:s'));
                        $file_to = 'assets' . DIRECTORY_SEPARATOR . 'Documents' . DIRECTORY_SEPARATOR .date('Y-m-d H:i:s'). DIRECTORY_SEPARATOR . htmlentities($post['doc_name']) .'.'. $ext_doc['extension'];
                        move_uploaded_file($file_from,$file_to);
                        $query = $db->prepare('INSERT INTO documents (file,nom,type,auteur,filiere,lycee) VALUES (:a,:b,:c,:d,:e,:f)');
                        $is = $query->execute(array(
                          'a' => $file_to,
                          'b' => htmlentities($post['doc_name']),
                          'c' => $post['tp_doc'],
                          'd' => $moi['nom']. ' ' . $moi['prenom'] ,
                          'e' => $post['sl_fl'],
                          'f' => $post['lycee']
                        ));
                        if ($is) {
                          echo "<div class='form_check done'> Votre Document a été bien soumis à l'administrateur pour être validé,Merci pour votre collaboration !</div> ";
                        }else {
                          echo "<div class='form_check fail'> Echec d'envoi de votre Document,Veillez reverifier !</div> ";
                        }
                  }else {
                        echo "<div class='form_check fail'>Soumetter uniquement des fichiers document de type : doc , docx,pdf ou xls ou document trop volumineux!</div> ";
                    }
                  }else {
                      echo "<div class='form_check fail'> Erreur de chargement du document!</div> ";
                  }
                  }else {
                        echo "<div class='form_check fail'>Veillez bien rempli tout les champs !</div> ";
                    }
                }
                 ?>
                <input type="file" name="doc" class="dnone cd">
                <div class="flex">
                  <p class="file" onclick="document.querySelector('.cd').click()"><i class="fa fa-2x fa-cloud-upload"></i><br> Selectionner le document </p>
                  <select class="sl sl1" name="tp_doc">
                    <option value="default">Type de Document</option>
                    <option value="littératue">littératue</option>
                    <option value="Epreuve">Epreuve</option>
                    <option value="religion"> Documents Religieuse</option>
                    <option value="cours">Document de cours</option>
                    <option value="Autre">Autre</option>
                  </select>
                  <select class="sl sl2" name="sl_fl">
                    <option value="default">Filieres</option>
                    <option value="General">General</option>
                    <option value="STI">STI</option>
                    <option value="STAG">STAG</option>
                    <option value="HR">HR</option>
                  </select>
                  <select class="sl sl3" name="lycee">
                    <option value="default">Lycée</option>
                    <option value="General">General</option>
                    <option value="LTN">LTN</option>
                  </select>
                </div>
                <input type="text" name="doc_name" placeholder="Entrer le nom du Document">
                <input type="submit" name="pub_doc" value="Publier">
              </form>
        </div>
      </div>
    </div>
  </div>
        </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
