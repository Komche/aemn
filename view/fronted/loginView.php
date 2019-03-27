<?php $title='Connexion'; ?>

<?php ob_start(); ?>
<img class="bg" src="public/img/bg_photo.jpg" alt="">
  <div class="container">

    <form class="login-form" action="index.php" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
        </div>
        <button class="btn btn-info btn-lg btn-block" type="submit">Se connecter</button>
      </div>
      <?php 
      global $erreur;
      if (!empty($erreur)) {
        error($erreur);
      } ?>
      <a href="index.php?register"> <big><b> Ou créer un compte</b></big></a>
    </form>
    
  </div>
<?php
  $content = ob_get_clean();

  require('template.php');
?>


