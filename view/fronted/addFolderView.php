<?php if (isset($_GET['folder'])) {
  $title = 'Modifier un dossier';
} else {
  $title = 'Ajouter un dossier';
} ?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i <i <?php if (isset($_GET['folder'])) {
                                            echo 'class="fa fa-pencil"';
                                          } else {
                                            echo 'class="fa fa-plus-circle"';
                                          } ?>></i> <?php if (isset($_GET['folder'])) {
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
                  <?php if (isset($_GET['folder'])) {
                    echo $title;
                  } else {
                    echo $title;
                  } ?>
              </header>
              <div class="panel-body">
                <div class="form">
                    <?php if (isset($_GET['folder'])) $folder = getfolderToUpdate($_GET['folder']); ?>
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label for="brand" class="control-label col-lg-2">Nom du dossier <span class="required">*</span></label>
                          <div class="col-lg-10">
                            <input class="form-control" value="<? if (isset($_GET['folder'])) echo $folder['title'] ?>" id="label" name="label" minlength="2" type="text" required />
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="type" class="control-label col-lg-2">Type du dossier<span class="required">*</span></label>
                          <div class="col-lg-10" id="parent">
                            <select class="form-control" id="type" name="type">
                                <option value="Galerie">Galerie</option>
                                <option value="Documentation">Documentation</option>
                            </select>
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
