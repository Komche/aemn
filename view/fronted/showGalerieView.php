<?php 
  $title = "Galerie";
?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
            <?php 
              if (empty($_GET['galerie'])) {
                require_once('view/fronted/galerieView/folderView.php');
              } else {
                require_once('view/fronted/galerieView/imageView.php');
              }
              
            ?>
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
