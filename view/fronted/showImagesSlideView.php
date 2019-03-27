<?php 
  $title = "Documentation";
?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      <div class="slider">
    <div class="slides">
      <?php 
      $datas = getFiles(0);
      if (is_array($datas) || is_object($datas)) {
            $i = 0;
            foreach ($datas as $data) {
                $i++;
                
      ?>
        <figure style="width: 100%; height: 550px">
            <img src="<?=$data['path'] ?>" alt="" style="width: 100%; height: 550px">
            <figcaption>Android</figcaption>
        </figure>

        <?php 
    }
} else {
    global $erreur;
    $erreur = "Auncune image trouver";
    if (!empty($erreur)) {
        error($erreur);
    }
}
?>
    </div>
</div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

  </section>
<?php
$content = ob_get_clean();

require('template.php');
?>
  <!-- container section end -->
