<?php 
$taille = "col-lg-2";
$show = "";
$datas = getFiles($_GET['document']);

if (function_exists('currentPage')) {
  $page = currentPage(null, "go");
}
if (!empty($page)) {
  if ($page == 'documentation.php') {
    $taille = "col-lg-4";
    $show="affiche";
  }
}

if (is_array($datas) || is_object($datas)) {
  foreach ($datas as $data) {
    if($show!=="affiche"){
    ?>
        <div class="<?= $taille ?> doc">
          <i onclick="showAlerte('<?= $data['label'] ?>',<?= $data['id_files'] ?>)" class="text-danger fa fa-times-circle"></i>
          <a class="folder text-center" href="<?= $data['path'] ?>">
                <img src="<?= getIcone($data['label']) ?>" alt="dossier">
                <p><?= $data['label'] ?></p>
          </a>
        </div>

        <?php 
      }else{
        ?>
          <a class="folder text-center" href="<?= $data['path'] ?>">
                <img src="<?= getIcone($data['label']) ?>" alt="dossier">
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
      deleteFiles($_GET['document'], $_GET['del'], 'Documentation');
    }
    if ($show!=="affiche") {
   
      ?>

<div class="alert-parent">
  <div class="myalert">
    <i onclick="delAlerte()" class="text-danger delete-alerte fa fa-times"></i>
      <div class="myalert-content">
        <p>Voulez vous vraiment supprimer ce fichier </p>
      </div>
      <div class="myalert-footer">
        <a class="btn btn-danger right" href="index.php?action=showDocumentation&document=<?= $_GET['document'] ?>&del=">Supprimer</a>
        <button class="btn btn-primary left" onclick="delAlerte()">Retour</button>
      </div>
  </div>
</div>
<?php } ?>    