<?php
  session_start();
  ob_start();
 ?>
<?php include 'meta.php'; ?>
<?php include 'functions/fun.php';$db = connect(); ?>
    <section id="main" class="bbx fdInL">
      <?php include 'header.php'; ?>
      <section class="main flex">
        <?php include 'sidebar.php'; ?>
        <section class="body w-75" id="article">
          <div class="d d1 bxs">
            <p><a href="page.php?doc" class="title"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;   Document à telécharger</a> </p>
            <div class="dd">
              <div class="sub_dd">
                <p class="title ri"> Rechercher</p>
                <div class="form_c flex">
                  <form class="reveal transs" action="page.php" method="get">
                    <legend class="title">Recherche classique</legend>
                    <input type="text" name="mot" value="" placeholder="Entrer le nom d'un Document"><input type="submit" name="find" value="Chercher">
                    <input type="text" name="doc" value="over" class="dnone">
                  </form>
                  <form class="reveal transs" action="page.php?doc" method="get">
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
              </div>
              <div class="doc_aff">
                <p class="title">Documents Recents</p>
                <?php
                  $query = $db->query("SELECT * FROM documents WHERE statue='non' ORDER BY id DESC LIMIT 6");
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
            </div>
          </div>
          <div class="d d2 bxs">
            <p><a href="page.php?article" class="title"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;   Comment faire ?</a> </p>
            <div class="dd">
              <div class="dc">
                <p class="title">Categories</p>
                <ul class="list flex ch1">
                  <li class="reveal"><a href="page.php?article#Informatique"><i class="fa fa-code"></i>  Informatique </a>                   </li>
                  <li class="reveal"><a href="page.php?article#Electronique"><i class="fa fa-book"></i>  Electronique</a> </li>
                  <li class="reveal"><a href="page.php?article#Electricité"><i class="fa fa-question-circle"></i>  Electricité</a> </li>
                  <li class="reveal"><a href="page.php?article#Hôtéllerie et Restauration"><i class="fa fa-retweet"></i>  Hôtéllerie et Restauration</a> </li>
                  <li class="reveal"><a href="page.php?article#Mécanique"><i class="fa fa-users"></i>  Mécanique</a> </li>
                  <li class="reveal"><a href="page.php?article#Construction Batiment"><i class="fa fa-building-o"></i>  Construction Batiment</a> </li>
                </ul>
              </div>
              <div class="d_ac">
                <p class="title">Articles Recents</p>
                <div class="flex fwp">
                  <?php
                    $query = $db->query("SELECT * FROM articles WHERE statue='non' ORDER BY id DESC LIMIT 2");
                   ?>
                   <?php while ($articles = $query->fetch()): ?>
                  <div class="atcl trans reveal">
                    <p class="title"><a href="#"><?php echo $articles['titre'] ?> </a> </p>
                    <div class="atcl_c">
                      <p><span>Publier par</span>  : <?php echo $articles['auteur'] ?> </p>
                      <p><span>Categorie </span> : <?php echo $articles['categorie'] ?></p>
                      <p><span>Date de Publication</span> : <?php echo $articles['date'] ?></p>
                      <p><span>Nombre de Commentaires</span>  : 3 </p>
                      <p><img src="<?php echo $articles['img'] ?>" alt=""> </p>
                      <p ><nav class="preview"><?php echo $articles['contenu'] ?> </nav>  <br>
                      <button type="button" name="button"><a href="cfaire.php?id=<?php echo $articles['id'] ?>">Lire Suite</a></button>
                      </p>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </section>
      <?php require 'footer.php' ?>
    </section>
  </body>
</html>
