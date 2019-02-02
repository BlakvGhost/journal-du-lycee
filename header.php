<header class="full-size">
  <div class="flex h1 justify-sb">
    <p class="logo"><a href="index.php"><img src="img/logo-f.png" alt=""></a> </p>
    <form class="" action="recherche.php" method="get">
      <p class="search-div flex">
      <i class="fa fa-search" onclick="document.querySelector('.sh').click()"></i>
      <input type="text" name="search" placeholder="Entrer un mot clé" class="iph"></p>
      <input type="submit" name="cherher" value="over" class="dnone sh">
    </form>
    <p class="inscr flex"><?php if(!$online){echo "<a href=\"inscription.php\" role=\"button\">Se Connecter</a>";}else{echo "<a href=\"logout.php\" role=\"button\">Se Deconnecter</a>";} ?><a href="user.php" role="button">Compte</a> </p>
  </div>
  <div class="h2">
    <ul class="list flex justify-sb">
      <li class="reveal trans"><a href="index.php"><i class="fa fa-home"></i>  Home</a> </li>
      <li class="reveal trans"><a href="page.php?doc"><i class="fa fa-book"></i>  Documents</a> </li>
      <li><a href="page.php?article"><i class="fa fa-question-circle"></i>  Comment faire ?</a> </li>
      <li class="reveal trans"><a href="page.php?article#Autres"><i class="fa fa-retweet"></i>  Article Divers</a> </li>
      <li class="reveal trans"><a href="forum.php"><i class="fa fa-users"></i>  Forum de Discussion</a> </li>
      <li class="reveal trans"><a href="publier.php"><i class="fa fa-share"></i>  Publier</a> </li>
    </ul>
  </div>
</header>
