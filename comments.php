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
        <section class="body w-75 forum" id="article">
          <div class="d d1 bxs">
            <p><a href="#" class="title"><i class="fa fa-users"></i> Forum de Discussion </a> </p>
          </div>
        <?php
        $db = connect();
        $query = $db->prepare("SELECT * FROM forum WHERE id = ?");
        $query->execute(array($get['id']));
        $forum = $query->fetch();
        $now = new DateTime(date('Y-m-d H:i:s'));
        $posted = new DateTime($forum['date']);
        $diff = $now->diff($posted);
        // comptage des vues sur la page
        $total = $forum['vue'] +1;
        $mod = $db->prepare('UPDATE forum SET vue=? WHERE id=?');
        $mod->execute(array($total++,$get['id']));
         ?>
        <div class="disc bxs">
          <div class="d d1">
            <p><a href="#" class="title"><i class="fa fa-share-square-o"></i>Par <?php echo $forum['auteur'] ?>   /   <?php echo $diff->d . 'jour et '. $diff->h .'heures '. $diff->i.'min' ; ?> /   <?php echo $forum['type']?>
           <i class="fa fa-caret-left"></i> /   <?php echo $forum['filiere'] ;?>  <em class="right"><span><?php echo $forum['vue'] ?> vue<?php if ($forum['vue'] > 1){echo 's';} ?>  </span><span> / 4 Comm</span> </em></a> </p>
          </div>
          <div class="d d1">
          <div class="sub_disc">
            <p class="flex logo msg_box cm"><span style="width: 20%;height:90px;"><img src="<?php echo $forum['photo'] ?>" alt="photo de <?php echo $forum['auteur'] ?>"> </span> <em class="flex mbx"><i class="fa fa-3x fa-caret-left"></i> <i class="msg"><?php echo $forum['msg'] ?></i> </em>   </p>
              <p class="mgr">Commentaires <br> <i class="fa fa-2x fa-caret-down down"></i> </p>
              <div class="rpdr">
                <form class="do" action="" method="post">
                  <?php
                  if (isset($post['repondre'])) {
                    if (!$online){
                      header('Location:inscription.php?url=comments&not=commenter');
                    }else{
                      $cv = $db->prepare("SELECT * FROM commentaires WHERE id_post=? AND contenu=? AND auteur=?");
                      $si = $cv->execute(array($get['id'],htmlentities($post['rpse']),$moi['nom']. ' ' . $moi['prenom']));
                      if (!$si){
                    if (!empty($post['rpse'])) {
                      $query = $db->prepare('INSERT INTO commentaires (id_post,contenu,categorie,type,auteur,photo) VALUES (:a,:b,:c,:e,:f,:d)');
                      $is = $query->execute(array(
                        'a' => $forum['id'],
                        'b' => htmlentities($post['rpse']),
                        'c' => $forum['type'],
                        'e' => $forum['i'],
                        'f' => $moi['nom']. ' ' . $moi['prenom'] ,
                        'd' => $moi['photo']
                      ));
                    }
                  }}}
                   ?>
                  <p><input type="text" name="rpse" value="" placeholder="Ecrivez votre reponse ici"><input type="submit" name="repondre" value="Repondre"> </p>
                </form>
              </div>
              <?php
              // comptage des likes sur la page
              if (isset($get['liked'])) {
                if (!$online){
                  header('Location:inscription.php?url=comments&not=liker&id='.$get['id']);
                }else{
                $vis = $db->prepare('SELECT liked FROM commentaires WHERE id=? ');
                $vis->execute(array($get['cm']));
                $data = $vis->fetch();
                $total = $data['liked'] +1;
                $mod = $db->prepare('UPDATE commentaires SET liked=? WHERE id=?');
                $mod->execute(array($total++,$get['cm']));
              }}
               ?>
              <div class="comm">
                <?php
                $req = $db->prepare("SELECT * FROM commentaires WHERE id_post=? AND type='Forum' ORDER BY id DESC LIMIT 6");
                $req->execute(array($get['id']));
                 ?>
                 <?php if (!$req->fetch()): ?>
                   <h3 class="rose">0 commentaire</h3>
                 <?php endif; ?>
                 <?php while ($cmts = $req->fetch()): ?>
                   <?php
                   $now = new DateTime(date('Y-m-d H:i:s'));
                   $posted = new DateTime($cmts['date']);
                   $diff = $now->diff($posted);
                    ?>
                   <p class="t1"><i><?php echo $cmts['auteur'] ?>&nbsp;&nbsp;il a <?php echo $diff->d . 'jour et '. $diff->h .'heures '. $diff->i.'min' ; ?></i> </p>
                <div class="logo flex msg_box cm"><em class="mbx msg black"> <i class=""><?php echo $cmts['contenu'] ;?> <br><a href="comments.php?id=<?php echo $cmts['id_post'] ?>&liked&cm=<?php echo $cmts['id'] ?>" class="a"><i class="fa fa-2x fa-heart"></i> </a><b><?php echo $cmts['liked']?></b> </i> </em>
                  <span style="width: 20%;height:110px;" class="flex"><i class="fa fa-3x fa-caret-left"></i><img src="<?php echo $cmts['photo'] ?>" alt="photo de <?php echo $cmts['auteur'] ?>"> </span>
                </div>
                <?php endwhile; ?>
              </div>
          </div>
        </div>
      </div>
      <p class="txtcenter index"><a href="#">1</a><a href="#">2</a> </p>
        </div>
      </div>
        </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
