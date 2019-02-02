<?php include 'meta.php' ?>
<?php include 'functions/fun.php';$db = connect(); ?>
    <section id="main" class="bbx">
      <?php include 'header.php'; ?>
      <section class="main flex">
        <?php include 'sidebar.php'; ?>
        <section class="body page w-75" id="article">
          <div class="d d1 bxs">
            <p><a href="#" class="title"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;   Page <?php if(isset($doc)){echo "Des Documents déjà publiés";}else if (isset($article)){echo 'Articles déjà publiés';} ?> </a> </p>
          </div>
          <?php if (isset($doc)): ?>
            <div class="d bxs">
              <div class="dd">
                <div class="sub_dd">
                  <p class="title"> Rechercher</p>
                  <div class="form_c flex">
                    <form class="" action="" method="get">
                      <legend class="title">Recherche classique</legend>
                      <input type="text" name="doc" value="over" class="dnone">
                      <input type="text" name="mot" value="" placeholder="Entrer le nom d'un Document"><input type="submit" name="find" value="Chercher">
                    </form>
                    <form class="" action="" method="get">
                      <legend class="title">Recherche avancée</legend>
                      <input type="text" name="doc" value="over" class="dnone">
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
                      <input type="submit" name="Chercher" value="Chercher">
                    </form>
                  </div>
                  <div class="recher">
                    <?php if (isset($get['find']) && !empty($get['mot'])): ?>
                      <h2>Resultats de Recherhe</h2>
                      <h4>Resultats pour <span class="rose"><?php echo $get['mot'] ?></span>  </h4>
                      <?php
                      $mot = htmlentities($get['mot']);
                      $mot = strtolower($mot);
                      $mot = trim($mot);
                      $mot = strip_tags($mot);
                      $pre = $db->prepare("SELECT * FROM documents WHERE nom LIKE ? AND statue='non'");
                      $pre->execute(array('%'.$mot.'%'));
                      $da = $pre->fetchAll();
                       ?>
                       <div class="dd">
                         <div class="doc_aff">
                           <?php if (!$da): ?>
                             <p>Document introuvable,verifiez l'orthographe</p>
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
                    <?php endif; ?>
                    <?php if (isset($get['Chercher'])): ?>
                      <h2>Resultats de Recherhe</h2>
                      <h4>Resultats pour <span class="white">&nbsp;<?php echo $get['tp_doc'].'/ &nbsp;'.$get['sl_fl'].'/&nbsp;'.$get['lycee'] ?></span>  </h4>
                      <?php
                      if ($get['tp_doc'] == 'littératue') {
                        $pre = $db->query("SELECT * FROM documents WHERE type='littératue'  AND statue='non'");
                      }else{
                      $pre = $db->prepare("SELECT * FROM documents WHERE type=? AND filiere=? AND lycee=? AND statue='non'");
                      $pre->execute(array($get['tp_doc'],$get['sl_fl'],$get['lycee']));
                      $da = $pre->fetchAll();
                      }
                       ?>
                       <div class="dd">
                         <div class="doc_aff">
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
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $asked = $db->query("SELECT * FROM documents WHERE statue='non' ORDER BY type");
             ?>
             <?php while ($ask = $asked->fetch()): ?>
               <?php if ($used !== $ask['type']): ?>
                 <div class="d d1 bxs" id="<?php echo $ask['type'] ?>">
                   <p><a href="" class="title" id="<?php echo $ask['type'] ?>"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $ask['type']; ?></a> </p>
                   <div class="dd">
                     <div class="doc_aff">
                       <?php
                         $used = $ask['type'];
                         $query = $db->prepare("SELECT * FROM documents WHERE statue='non'AND type=? ORDER BY id DESC LIMIT 3");
                         $query->execute(array($ask['type']));
                        ?>
                        <?php while ($docs = $query->fetch()): ?>
                          <div class="doc reveal trans">
                            <p><?php echo $docs['nom'] ?> </p>
                            <p><span>Type de Document : </span> <?php echo $docs['type'] ?></p>
                            <p><span>Filiere :</span> <?php echo $docs['filiere'] ?> </p>
                            <p><span>Lycée :</span> <?php echo $docs['lycee'] ?></p>
                            <a href="<?php echo 'http://docs.google.com/gview?url=localhost/'.$docs['file'] ?>"><i class="fa fa-folder-open"></i> Lire</a><a href="<?php echo $docs['file'] ?>" download><i class="fa fa-download"></i> Telecharger</a>
                          </div>
                       <?php endwhile; ?>
                     </div>
                     <p class="txtcenter index"><a href="#">1</a><a href="#">2</a> </p>
                   </div>
                 </div>
               <?php endif; ?>
             <?php endwhile; ?>
          <?php endif; ?>
          <?php if (isset($article)): ?>
            <?php
            $asked = $db->query("SELECT * FROM articles WHERE statue='non' ORDER BY categorie");
             ?>
             <?php while ($ask = $asked->fetch()): ?>
               <?php if ($used !== $ask['categorie']): ?>
               <div class="d d1 bxs">
                 <p><a href="" class="title" id="<?php echo $ask['categorie'] ?>"><i class="fa fa-code"></i>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $ask['categorie'] ?></a> </p>
                 <div class="flex fwp">
                   <?php
                   if (isset($get['page'])){$pg = $get['page'];}else{$pg = 1;}
                   $nbrt = $db->prepare('SELECT COUNT(*) AS vt FROM articles WHERE categorie=?');
                   $nbrt->execute(array($ask['categorie']));
                   $t = $nbrt->fetch();
                   $t = (int)$t['vt'];
                   $n = 2;
                   $pn = ceil($t/$n);
                   if($pg<=0){$pg = 1;}
                   if($pg>$pn){$pg = $pn;}
                   $dc = ($pg*$n)-$n;

                    $used = $ask['categorie'];
                    $query = $db->prepare("SELECT * FROM articles WHERE statue='non' AND categorie=? ORDER BY id DESC LIMIT 2");
                    $query->execute(array($ask['categorie']));
                    ?>
                    <?php while ($articles = $query->fetch()): ?>
                   <div class="atcl trans reveal">
                     <p class="title"><a href="#"><?php echo $articles['titre'] ?> </a> </p>
                     <div class="atcl_c">
                       <p><span>Publier par</span>  : <?php echo $articles['auteur'] ?> </p>
                       <p><span>Date de Publication</span> : <?php echo $articles['date'] ?></p>
                       <p><span>Nombre de Commentaires</span>  : 3 </p>
                       <p><span>Nombre de vue</span>  : 3 </p>
                       <p><img src="<?php echo $articles['img'] ?>" alt=""> </p>
                       <p ><nav class="preview"><?php echo $articles['contenu'] ?> </nav>  <br>
                       <button type="button" name="button"><a href="cfaire.php?id=<?php echo $articles['id'] ?>">Lire Suite</a></button>
                       </p>
                     </div>
                   </div>
                   <?php endwhile; ?>
                   </div>
                   <p class="index txtcenter"><a href="#">1</a><a href="#">2</a> </p>
               </div>
               <?php endif; ?>
             <?php endwhile; ?>
          </section>
          <?php endif; ?>
      </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
