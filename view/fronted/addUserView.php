<?php if (isset($_GET['user'])){$title='Modifier un utilisateur';} else{$title='Ajouter un utilisateur';} ?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i <?php if (isset($_GET['user'])){echo 'class="fa fa-pencil"';} else{echo 'class="fa fa-plus-circle"';} ?> ></i> <?php if (isset($_GET['user'])){echo  $title;} else{echo $title;} ?></h3>

          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                  <?php if (isset($_GET['user'])){echo $title;} else{echo $title;} ?>
              </header>
              <div class="panel-body">
                <div class="form">
                    <?php if (isset($_GET['user'])) $user = getUsersToUpdate($_GET['user']); ?>
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                    <div class="form-group ">
                      <label for="last_name" class="control-label col-lg-2">Nom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value=" <? if (isset($_GET['user'])) echo $user['last_name'] ?>" id="last_name" name="last_name" minlength="3" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="frist_name" class="control-label col-lg-2">Prénom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="<?if (isset($_GET['user'])) echo $user['first_name'] ?>" id="frist_name" type="text" minlength="3" name="first_name" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email</label>
                      <div class="col-lg-10">
                        <input class="form-control " value="<?if (isset($_GET['user'])) echo $user['email'] ?>" id="email" type="email" name="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="phone_number" class="control-label col-lg-2">N° de téléphone <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="<?if (isset($_GET['user'])) echo $user['phone_number'] ?>" id="phone_number" name="phone_number" minlength="8" type="tel" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Valider</button>
                        <? global $erreur; if(isset($erreur)) error($erreur); ?>
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

