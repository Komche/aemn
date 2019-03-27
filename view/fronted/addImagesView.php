<?php if (isset($_GET['product'])) {
  $title = 'Modifier des images défilantes';
} else {
  $title = 'Ajouter des images défilantes';
} ?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i <i <?php if (isset($_GET['product'])) {
                                            echo 'class="fa fa-pencil"';
                                          } else {
                                            echo 'class="fa fa-plus-circle"';
                                          } ?>></i> <?php if (isset($_GET['product'])) {
                                                      echo $title;
                                                    } else {
                                                      echo $title;
                                                    } ?></h3>

          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                  <?php if (isset($_GET['product'])) {
                    echo $title;
                  } else {
                    echo $title;
                  } ?>
              </header>
              <div class="panel-body">
                <div class="form">
                    <?php if (isset($_GET['product'])) $product = getProductToUpdate($_GET['product']); ?>
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group ">
                      <label for="chassis_number" class="control-label col-lg-2">Images</label>
                      <div class="col-lg-10">
                          <input onchange="file(this.id)" accept="image/*" multiple class="form-control"  id="images[]" name="images[]"  type="file"  />
                          <p class="help-block">Selectionner les images défilante.</p>
                      </div>
                    </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit">Valider</button>
                            <? global $erreur;
                            if (isset($erreur)) error($erreur); ?>
                          </div>
                        </div>
                  </form>
                </div>

              </div>
            </section>
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