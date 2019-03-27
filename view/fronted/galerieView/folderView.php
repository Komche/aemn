<?php 
global $admin;
$taille = "col-lg-2";
$show = "";
$lien = "index.php?action=showGalerie&";
$datas = getFolders('Galerie');
if (function_exists('currentPage')) {
  $page = currentPage(null, "go");
  $show="affiche";
}

if (!empty($page)) {
  if ($page == 'galerie.php') {
    $taille = "col-lg-6";
  }
  $lien = "galerie.php?";
}

if (is_array($datas) || is_object($datas)) {
  foreach ($datas as $data) {
    if($show!=="affiche"){
    ?>
        <div class="<?= $taille ?> doc">
          <i onclick="showAlerte('<?= $data['label'] ?>',<?= $data['id_folder'] ?>)" class="text-danger  fa fa-times-circle"></i>
          <a class="folder <?= $taille ?> text-center" href="<?= $lien ?>galerie=<?= $data['id_folder'] ?>">
                <img src="<?= $admin ?>public/img/folder.png" alt="dossier">
                <p><?= $data['label'] ?></p>
          </a>
  </div>

  <?php 
      }else{
        ?>
          <a class="folder <?= $taille ?> text-center" href="<?= $lien ?>galerie=<?= $data['id_folder'] ?>">
                <img src="<?= $admin ?>public/img/folder.png" alt="dossier">
                <p><?= $data['label'] ?></p>
          </a>
        <?php 
      }}
    } else {
      global $erreur;
      $erreur = "Auncun dossier trouver";
      if (!empty($erreur)) {
        error($erreur);
      }
    }

    if (!empty($_GET['del'])) {
      deleteFolders($_GET['del'], 'Galerie');
    }
    if ($show!=="affiche") {
   
      ?>
  
        <div class="alert-parent">
          <div class="myalert">
            <i onclick="delAlerte()" class="text-danger delete-alerte fa fa-times"></i>
              <div class="myalert-content">
                <p>Voulez vous vraiment supprimer ce dossier </p>
                <p class="text-danger">
                  
                </p>
              </div>
              <div class="myalert-footer">
                <a class="btn btn-danger right" href="index.php?action=showGalerie&del=">Supprimer</a>
                <button class="btn btn-primary left" onclick="delAlerte()">Retour</button>
              </div>
          </div>
        </div>
  <?php } ?>      