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
            <p><a href="#" class="title"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp; Forum de Discussion </a> </p>
          </div>
          <div class="d bxs">
            <div class="dd">
              <div class="sub_dd">
                <p class="title"> Poser une question ?</p>
                <div class="reveal trans">
                  <form class="" action="" method="post">
                  <?php
                if (isset($post['pub_fo'])) {
                  if (!$online){
                    header('Location:inscription.php?url=forum&not=question');
                  }else{
                    if (!empty($post['preocupation']) && $post['categoriee'] !== 'default'){
                      $forump = $post['preocupation'];
                      $db = connect();
                      $query = $db->prepare('INSERT INTO forum (msg,type,auteur,filiere) VALUES (:a,:b,:c,:d)');
                      $is = $query->execute(array(
                        'a' => $forump,
                        'b' => $post['categoriee'],
                        'c' => $moi['nom']. ' ' . $moi['prenom'] ,
                        'd' => $moi['filiere'],
                      ));
                      if ($is) {
                        echo "<div class='form_check done'> Votre Question a été bien soumis à l'administrateur pour être validé,Merci pour votre collaboration !</div> ";
                      }else {
                        echo "<div class='form_check fail'> Echec d'envoi de votre Question,Veillez reverifier !</div> ";
                      }
                    }else {
                      echo "<div class='form_check warning'> Echec d'envoi de votre Question,Veillez reverifier !</div> ";
                  }}}
                   ?>
                    <div class="fm">
                      <textarea type="text" name="preocupation" value="" placeholder="Ecrivez ici votre preocupation" ></textarea>
                      <select class="" name="categoriee" style="width:75%">
                        <option value="default">Categories</option>
                        <optgroup label="Informatique">
                          <option value="Informatique" name="in">Informatique</option>
                          <option value="Programmation">Programmation</option>
                          <option value="Reseau">Reseau</option>
                        </optgroup>
                        <option value="Construction Batiment">Construction Batiment</option>
                        <option value="Electronique">Electronique</option>
                        <option value="Electricité">Electricité</option>
                        <option value="Mecanique">Mecanique</option>
                      </select>
                      <input type="submit" name="pub_fo" value="Publier">
                    </div>
                  </form>
            </div>
          </div>
          <div class="sub_dd">
            <p class="title"> Discussion</p>
            <div class="reveal trans">
              <form class="flex form2" action="" method="post">
                <h2 class="mg-none">Trier selon </h2>
                <select class="flex" name="">
                  <option value="Informatique">Informatique</option>
                  <option value="">Construction Batiment</option>
                  <option value="">Electronique</option>
                  <option value="">Electricité</option>
                  <option value="Mecanique">Mecanique</option>
                </select>
                <input type="submit" name="" value="Trier" class="mg-none in" style="height:30px!important">
              </form>
        </div>
        <?php
        $db = connect();
        $query = $db->query('SELECT * FROM forum ORDER BY id DESC');
         ?>
         <?php while ($forum = $query->fetch()): ?>
           <?php
            $now = new DateTime(date('Y-m-d H:i:s'));
            $posted = new DateTime($forum['date']);
            $diff = $now->diff($posted);
            ?>
        <div class="disc reveal trans bxs">
          <div class="d d1">
            <p><a href="#" class="title"><i class="fa fa-share-square-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;Par <?php echo $forum['auteur'] ?>   /   <?php echo $diff->d . 'jour et '. $diff->h .'heures '. $diff->i.'min' ; ?> /   <?php echo $forum['type'] ?>   <i class="fa fa-caret-left"></i> /   <?php echo $forum['filiere'] ?>  <em class="right"><span>3 vues </span><span> / 4 Comm</span> </em></a> </p>
          </div>
          <div class="sub_disc">
            <p class="flex logo msg_box"><span style="width: 20%;height:90px;"><img src="<?php echo $forum['photo'] ?>" alt="photo de <?php echo $forum['auteur'] ?>"> </span> <em class="flex mbx trans"><i class="fa fa-3x fa-caret-left"></i> <i class="msg"><?php echo $forum['msg'] ?></i> </em>   </p>
              <p class="button"><a href="comments.php?id=<?php echo $forum['id'] ?>" role="button">Repondre</a> <a href="comments.php?id=<?php echo $forum['id'] ?>" role="button">Voir Commentaires</a> </p>
          </div>
        </div>
        <?php endwhile; ?>
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
