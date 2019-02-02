<?php include 'meta.php' ?>
<?php include 'functions/fun.php';$db = connect(); ?>
    <section id="main" class="bbx">
      <?php include 'header.php'; ?>
      <section class="main flex">
        <?php include 'sidebar.php'; ?>
        <section class="body w-75 rech" id="article">
          <div class="d d1 bxs">
            <p><a href="#" class="title"><i class="fa fa-book"></i>   Resultats de Recherhe </a> </p>
          </div>
          <div class="d bxs">
            <div class="dd">
              <p class="title">Resultats pour : <span class="rose"> <?php echo $get['search'] ?></span> </p>
            <?php if (!empty($get['search'])): ?>
              <?php
              $s = $get['search'];
              $quick = $db->prepare("SELECT * FROM documents WHERE nom LIKE ? OR type LIKE ? AND statue='non' ORDER BY id DESC LIMIT 6");
              $quick->execute(array('%'.$s.'%','%'.$s.'%'));
              $da = $quick->fetchAll();
               ?>
               <h3>Resultats "<?php echo $s; ?>" dans 'documents publiés'</h3>
               <div class="dd">
                 <div class="doc_aff">
                   <?php if (!$da): ?>
                     <p class="white">Document introuvable</p>
                   <?php endif; ?>
                    <?php foreach ($da as $key => $docs): ?>
                      <div class="doc reveal trans">
                        <p><?php echo $docs['nom'] ?> </p>
                        <p><span>Type de Document : </span> <?php echo $docs['type'] ?></p>
                        <p><span>Filiere :</span> <?php echo $docs['filiere'] ?> </p>
                        <p><span>Lycée :</span> <?php echo $docs['lycee'] ?></p>
                        <a href="<?php echo 'http://docs.google.com/gview?url=localhost/'.$docs['file'] ?>"><i class="fa fa-folder-open"></i> Lire</a><a href="<?php echo $docs['file'] ?>" download><i class="fa fa-download"></i> Telecharger</a>
                      </div>
                   <?php endforeach; ?>
                 </div>
                 <p class="txtcenter index"><a href="#">1</a><a href="#">2</a> </p>
               </div>
               <?php
               $s = $get['search'];
               $quick = $db->prepare("SELECT * FROM articles WHERE titre LIKE ? OR contenu LIKE ? AND statue='non' ORDER BY id DESC LIMIT 6");
               $quick->execute(array('%'.$s.'%','%'.$s.'%'));
               $da = $quick->fetchAll();
                ?>
                <h3>Resultats "<?php echo $s; ?>" dans 'Comment faire ?'</h3>
                <div class="d d1">
                  <div class="flex fwp">
                    <?php if (!$da): ?>
                      <p class="white">Article introuvable</p>
                    <?php endif; ?>
                     <?php foreach ($da as $key => $articles): ?>
                    <div class="atcl trans reveal">
                      <p class="title"><a href="#"><?php echo $articles['titre'] ?> </a> </p>
                      <div class="atcl_c">
                        <p><span>Publier par</span>  : <?php echo $articles['auteur'] ?> </p>
                        <p><span>Date de Publication</span> : <?php echo $articles['date'] ?></p>
                        <p><span>Nombre de Commentaires</span>  : 3 </p>
                        <p ><nav class="preview"><?php echo $articles['contenu'] ?> </nav>  <br>
                        <button type="button" name="button"><a href="#">Lire Suite</a></button>
                        </p>
                      </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <p class="txtcenter index"><a href="#">1</a><a href="#">2</a> </p>
                </div>
                <?php
                $quick = $db->prepare("SELECT * FROM forum WHERE msg LIKE ? OR type LIKE ? ORDER BY id DESC LIMIT 2");
                $quick->execute(array('%'.$s.'%','%'.$s.'%'));
                $da = $quick->fetchAll()
                 ?>
                 <h3>Resultats "<?php echo $s; ?>" dans 'Forum de Discussion'</h3>
                 <?php if (!$da): ?>
                   <p class="white">Discussion introuvable</p>
                 <?php endif; ?>
                 <?php foreach ($da as $key => $forum): ?>
                   <?php
                    $now = new DateTime(date('Y-m-d H:i:s'));
                    $posted = new DateTime($forum['date']);
                    $diff = $now->diff($posted);
                    ?>
                <div class="disc">
                  <div class="d d1">
                    <p><a href="#" class="title"><i class="fa fa-share-square-o"></i>Par <?php echo $forum['auteur'] ?>   /   <?php echo $diff->d . 'jour et '. $diff->h .'heures '. $diff->i.'min' ; ?> /   <?php echo $forum['type'] ?>   <i class="fa fa-caret-left"></i> /   <?php echo $forum['filiere'] ?>  <em class="right"><span>3 vues </span><span> / 4 Comm</span> </em></a> </p>
                  </div>
                  <div class="sub_disc">
                    <p class="flex logo msg_box"><span style="width: 20%;height:90px;"><img src="<?php echo $forum['photo'] ?>" alt="photo de <?php echo $forum['auteur'] ?>"> </span> <em class="flex mbx"><i class="fa fa-3x fa-caret-left"></i> <i class="msg"><?php echo $forum['msg'] ?></i> </em>   </p>
                      <p class="button"><a href="comments.php?id=<?php echo $forum['id'] ?>" role="button">Repondre</a> <a href="comments.php?id=<?php echo $forum['id'] ?>" role="button">Voir Commentaires</a> </p>
                  </div>
                </div>
              <?php endforeach; ?>
                 <?php
                 $quick = $db->prepare("SELECT * FROM commentaires WHERE contenu LIKE ? OR categorie LIKE ? ORDER BY id DESC LIMIT 2");
                 $quick->execute(array('%'.$s.'%','%'.$s.'%'));
                 $da = $quick->fetchAll();
                  ?>
                  <h3>Resultats "<?php echo $s; ?>" dans 'Commentaires forum'</h3>
                  <div class="comm">
                    <?php if (!$da): ?>
                      <p class="white">Commentaires introuvable</p>
                    <?php endif; ?>
                     <?php foreach ($da as $key => $cmts): ?>
                       <?php
                       $now = new DateTime(date('Y-m-d H:i:s'));
                       $posted = new DateTime($cmts['date']);
                       $diff = $now->diff($posted);
                        ?>
                       <p class="t1"><i><?php echo $cmts['auteur'] ?>&nbsp;&nbsp;il a <?php echo $diff->d . 'jour et '. $diff->h .'heures '. $diff->i.'min' ; ?></i> </p>
                    <div class="logo flex msg_box cm"><em class="mbx msg black m2"> <i class=""><?php echo $cmts['contenu'] ;?> <br><a href="comments.php?id=<?php echo $cmts['id_post'] ?>&liked&cm=<?php echo $cmts['id'] ?>" class="a"><i class="fa fa-2x fa-heart"></i> </a><b><?php echo $cmts['liked']?></b> </i> </em>
                      <span style="width: 20%;height:110px;" class="flex"><i class="fa fa-3x fa-caret-left"></i><img src="<?php echo $cmts['photo'] ?>" alt="photo de <?php echo $cmts['auteur'] ?>"> </span>
                    </div>
                    <?php endforeach; ?>
                  </div>
            </div>
            <?php endif; ?>
          </div>

        </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
