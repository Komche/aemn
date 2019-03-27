<?php $title='Inscription'; ?>

<?php ob_start(); ?>
<img class="bg" src="public/img/bg_photo.jpg" alt="">
  <div class="container">

    <form class="login-form" action="" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" <? if(!empty($_GET['token'])) echo('value="'.$_GET['token'].'"') ?> class="form-control" id="code" name="code" placeholder="Votre code d'authentification" required autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" id="mdp2" name="mdp2" placeholder="Mot de passe de confirmation">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Créer le compte</button>
        <?php 
        global $erreur;
        if (!empty($erreur)) {
          error($erreur);
        } ?>
        <a href="index.php?login"><big><b> Ou se connecter</b></big></a>
      </div>
    </form>
    
  </div>
<?php
  $content = ob_get_clean();

  require('template.php');
?>


