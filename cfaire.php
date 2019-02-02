<?php
  session_start();
  ob_start();
 ?>
<?php include 'meta.php' ?>
<?php include 'functions/fun.php';$db = connect(); ?>
<link rel="stylesheet" href="css/cfaire.css">
    <section id="main" class="bbx">
      <?php include 'header.php'; ?>
      <section class="main flex">
        <?php include 'sidebar.php'; ?>
        <section class="body w-75 cfaire" id="article">
          <?php
          $query = $db->prepare("SELECT * FROM articles WHERE id=?");
          $query->execute(array($get['id']));
          $datas = $query->fetch();
           ?>
          <div class="d d1 bxs">
            <p><a href="#" class="title"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $datas['titre'] ?> </a> </p>
          </div>
          <div class="d d1 bxs">
            <div class="ar flex">
              <div class="ref">
                  <p><span>Publier par</span>  : <?php echo $datas['auteur'] ?> </p>
                  <p><span>Categorie </span> : <?php echo $datas['categorie'] ?></p>
                  <p><span>Date de Publication</span> : <?php echo $datas['date'] ?></p>
                  <p><span>Nombre de Commentaires</span>  : 3 </p>
                  <p><span>Nombre de vue</span>  : 3 </p>
                  <p><img src="<?php echo $datas['img'] ?>" alt=""> </p>
                  <p class="txtcenter"><a href="#" role="button"> <i class="fa fa-facebook-square"></i> </a><a href="#" role="button"> <i class="fa fa-twitter-square"></i> </a><a href="#" role="button"> <i class="fa fa-linkedin-square"></i> </a> </p>
                  </div>
              <div class="cn">
                <?php echo $datas['contenu'] ?>
              </div>
        </div>
      </div>
      <div class="d d1 bxs">
        <div class="ar">
          <div class="rpdr">
            <form class="do" action="" method="post">
              <?php
              if (isset($post['repondre'])) {
                if (!$online){
                  header('Location:inscription.php?url=cfaire&not=Repondre');
                }else {
                $cv = $db->prepare("SELECT * FROM commentaires WHERE id_post=? AND contenu=? AND auteur=?");
                $si = $cv->execute(array($get['id'],htmlentities($post['rpse']),$moi['nom']. ' ' . $moi['prenom']));
                if (!$si){
                  if (!empty($post['rpse'])) {
                    $query = $db->prepare('INSERT INTO commentaires (id_post,contenu,categorie,type,auteur,photo) VALUES (:a,:b,:c,:e,:f,:d)');
                    $is = $query->execute(array(
                      'a' => $datas['id'],
                      'b' => htmlentities($post['rpse']),
                      'c' => $datas['categorie'],
                      'e' => $datas['i'],
                      'f' => $moi['nom']. ' ' . $moi['prenom'] ,
                      'd' => $moi['photo']
                    ));
                  }
                }
              }}
               ?>
              <p><input type="text" name="rpse" value="" placeholder="Commentaire"><input type="submit" name="repondre" value="Repondre"> </p>
            </form>
          </div>
          <div class="comm flex fwp">
            <?php
            // comptage des likes sur la page
            if (isset($get['liked'])) {
              if (!$online){
                header('Location:inscription.php?url=cfaire&not=liker');
              }else{
              $vis = $db->prepare('SELECT liked FROM commentaires WHERE id=? ');
              $vis->execute(array($get['cm']));
              $data = $vis->fetch();
              $total = $data['liked'] +1;
              $mod = $db->prepare('UPDATE commentaires SET liked=? WHERE id=?');
              $mod->execute(array($total++,$get['cm']));
              $vis->closeCursor();
              $mod->closeCursor();
            }
          }
            $req = $db->prepare("SELECT * FROM commentaires WHERE id_post=? AND type='Article' ORDER BY id DESC");
            $req->execute(array($get['id']));
            $da = $req->fetchAll();
             ?>
             <?php if (!$da): ?>
               <h3 class="rose">0 commentaire</h3>
             <?php endif; ?>
             <?php foreach ($da as $key => $cmts): ?>
               <?php
               $now = new DateTime(date('Y-m-d H:i:s'));
               $posted = new DateTime($cmts['date']);
               $diff = $now->diff($posted);
                ?>
               <div class="ct">
                 <p class="t1"><i><?php echo $cmts['auteur'] ?>&nbsp;&nbsp;il a <?php echo $diff->d . 'jour et '. $diff->h .'heures '. $diff->i.'min' ; ?></i> </p>
              <div class="logo flex msg_box cm"><em class="mbx msg black"> <i class=""><?php echo $cmts['contenu'] ;?> <br><a href="comments.php?id=<?php echo $cmts['id_post'] ?>&liked&cm=<?php echo $cmts['id'] ?>" class="a"><i class="fa fa-2x fa-heart"></i> </a><b><?php echo $cmts['liked']?></b> </i> </em>
                <span style="width: 20%;height:110px;" class="flex"><i class="fa fa-3x fa-caret-left"></i><img src="<?php echo $cmts['photo'] ?>" alt="photo de <?php echo $cmts['auteur'] ?>"> </span>
              </div>
               </div>
            <?php endforeach; ?>
          </div>
        </div>
  </div>
        </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
