<header>
    <div class="header-dep-1">
        <p><a href="#"><img src="img/logo-f.png" alt="logo du ltn" ></a></p>
    </div>
    <div class="header-dep-2">
        <div class="flex">
            <p class="flex mg-auto full-size search-div"><i class="fa fa-search"></i><input type="text" name="search" class="outline"></p>
            <p class="id-log-div">
                <ul class='dropdowns'><a><img src="img/icon/login-person.png" class="relative login"></a>
                    <ul class="list submenu bbx" style="width: 200px; border-radius: 3px;">
                    <li><a href="#">ID : <span>
                      <?php if($_SESSION['suv-connect'] == true){echo $_SESSION['idSuv'];}
                      else if($_SESSION['prof-connected'] == true){echo $_SESSION['idProf'];}
                      ?></span></a></li>
                    <li><a href="#">Nom d'utilisateur : <span>
                      <?php if($_SESSION['suv-connect'] == true){echo 'Admin';}
                      else if($_SESSION['prof-connected'] == true){echo $_SESSION['nomProf'];}
                      ?>
                    </span></a></li>
                    <li><a href="#">Ecole : <span>LT-NATITINGOU</span> </a></li>
                    <li class="center"><a href="logout.php">Se déconnecter</a></li>
                  </ul>

                </ul>
            </p>
        </div>
    </div>
</header>
