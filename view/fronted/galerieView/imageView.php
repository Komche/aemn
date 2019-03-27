<div class="container">
	<div class="row">
      
      <?php 
        global $admin;
        $taille ="col-lg-3 col-md-4 col-xs-6";
        $show="";
        $datas = getFiles($_GET['galerie']);
        if (function_exists('currentPage')) {
            $page = currentPage(null, "go");
            $show="affiche";
        }

        if (!empty($page)) {
            if ($page == 'galerie.php') {
                $taille = "col-lg-6 col-md-12 col-xs-12";
            }
        }

        if (is_array($datas) || is_object($datas)) {
            $i = 0;
            foreach ($datas as $data) {
                $i++;
                if($show!=="affiche"){
                ?>
                    <div class="doc <?= $taille ?> ">
                        <i onclick="showAlerte('<?= $data['label'] ?>',<?= $data['id_files'] ?>)" class="text-danger fa fa-times-circle"></i>
                        <a href="<?= $admin . $data['path'] ?>" class="text-center galery">
                            <img src="<?= $admin . $data['path'] ?>" alt="<?= $data['label'] ?>" title="<?= $data['label'] ?>">
                            <p><?= $data['label'] ?></p>
                        </a>
                    </div>
                    <?php 
      }else{
        ?>
            <a href="<?= $admin . $data['path'] ?>" class="text-center galery">
                <img src="<?= $admin . $data['path'] ?>" alt="<?= $data['label'] ?>" title="<?= $data['label'] ?>">
                <p><?= $data['label'] ?></p>
            </a>
        <?php 
    }}
} else {
    global $erreur;
    $erreur = "Auncune image trouver";
    if (!empty($erreur)) {
        error($erreur);
    }
}

if (!empty($_GET['del'])) {
    deleteFiles($_GET['galerie'], $_GET['del'], 'Galerie');
  }
?>


    </div>
    
    <!--<div class="img-galery">
        <img src="p" alt="">
    </div>-->
</div>
<?php if ($show!=="affiche") {?>
<div class="alert-parent">
  <div class="myalert">
    <i onclick="delAlerte()" class="text-danger delete-alerte fa fa-times"></i>
      <div class="myalert-content">
        <p>Voulez vous vraiment supprimer cette image </p>
      </div>
      <div class="myalert-footer">
        <a class="btn btn-danger right" href="index.php?action=showGalerie&galerie=<?= $_GET['galerie'] ?>&del=">Supprimer</a>
        <button class="btn btn-primary left" onclick="delAlerte()">Retour</button>
      </div>
  </div>
</div>
<?php }?>