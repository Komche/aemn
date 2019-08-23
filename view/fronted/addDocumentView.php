<?php if (isset($_GET['document'])) {
  $title = 'Modifier un document';
} else {
  $title = 'Ajouter un document';
} ?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i <i <?php if (isset($_GET['document'])) {
                                            echo 'class="fa fa-pencil"';
                                          } else {
                                            echo 'class="fa fa-plus-circle"';
                                          } ?>></i> <?php if (isset($_GET['document'])) {
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
                  <?php if (isset($_GET['document'])) {
                    echo $title;
                  } else {
                    echo $title;
                  } ?>
              </header>
              <div class="panel-body">
                <div class="form">
                    <?php if (isset($_GET['document'])) $document = getdocumentToUpdate($_GET['document']); ?>
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label for="type" class="control-label col-lg-2">Type du document<span class="required">*</span></label>
                          <div class="col-lg-10" id="parent">
                            <select onclick="typeImage(this.id)" class="form-control" id="type" name="type">
                                <option value="Images">Images</option>
                                <option value="Autre">Word/PDF ...</option>
                                <option value="youtube">Youtube</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="type" class="control-label col-lg-2">Dossier<span class="required">*</span></label>
                          <div class="col-lg-10" id="parent">
                          <select class="form-control" id="folder" name="folder">
                              <?php
                              $folders = getFolders(null);
                              foreach ($folders as $folder) {

                                echo '<option value="' . $folder['id_folder'] . '">' . $folder['label'] . '</option>';
                              };
                              ?>

                          </select>
                          </div>
                          </div>
                        <div id="fic" class="form-group ">
                          <label for="chassis_number" class="control-label col-lg-2">Fichiers</label>
                          <div class="col-lg-10" id="parentF">
                              <input class="form-control" multiple accept="" id="images[]" name="images[]"  type="file"  />
                              <p class="help-block">Selectionner les fichiers(images, document..) depuis votre pc.</p>
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
