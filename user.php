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
          <div class="d bxs" id="sign">
            <?php foreach ($_SESSION as $key => $value): ?>
              <h3 class="white"><?php echo $value; ?> </h3>
            <?php endforeach; ?>
          </div>
        </section>
      </section>
      <?php include 'footer.php' ?>
    </section>
  </body>
</html>
