<?php if (isset($_GET['bureau'])){$title='Modifier un bureau';} else{$title='Ajouter un bureau';} ?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i <?php if (isset($_GET['bureau'])){echo 'class="fa fa-pencil"';} else{echo 'class="fa fa-plus-circle"';} ?> ></i> <?php if (isset($_GET['bureau'])){echo  $title;} else{echo $title;} ?></h3>

          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                  <?php if (isset($_GET['bureau'])){echo $title;} else{echo $title;} ?>
              </header>
              <div class="panel-body">
                <div class="form">
                    <?php if (isset($_GET['bureau'])) $bureau = getbureausToUpdate($_GET['bureau']); ?>
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="nom_bureau" class="control-label col-lg-2">Nom du bureau <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value=" <? if (isset($_GET['bureau'])) echo $bureau['nom_bureau'] ?>" id="nom_bureau" name="nom_bureau" minlength="3" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="logo" class="control-label col-lg-2">Logo <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="logo" type="file" name="logo" accept="image" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Status</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="statut" id="statut">
                          <option value="1">Section</option>
                          <option value="2">Sous-section</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Valider</button>
                        <?php if(isset($_SESSION['erreur'])) error($_SESSION['erreur']); ?>
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

