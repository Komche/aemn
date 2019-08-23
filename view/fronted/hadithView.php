<?php if (isset($_GET['hadith'])){$title='Modifier un hadith';} else{$title='Ajouter un hadith';} ?>

<?php ob_start(); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i <?php if (isset($_GET['hadith'])){echo 'class="fa fa-pencil"';} else{echo 'class="fa fa-plus-circle"';} ?> ></i> <?php if (isset($_GET['hadith'])){echo  $title;} else{echo $title;} ?></h3>

          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                  <?php if (isset($_GET['hadith'])){echo $title;} else{echo $title;} ?>
              </header>
              <div class="panel-body">
                <div class="form">
                    <?php if (isset($_GET['hadith'])) $hadith = gethadithsToUpdate($_GET['hadith']); ?>
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="titre" class="control-label col-lg-2">Titre du hadith <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value=" <?php if (isset($_GET['hadith'])) echo $hadith['titre'] ?>" id="titre" name="titre" minlength="3" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="rapporteur" class="control-label col-lg-2"> Rapporteur<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value=" <?php if (isset($_GET['hadith'])) echo $hadith['rapporteur'] ?>" id="rapporteur" name="rapporteur" minlength="3" type="text" required />
                      </div>
                    </div>
                    <div id="contenu" class="form-group">
                        <label for="hadith" class="control-label col-lg-2">Contenu</label>
                        <div class="col-lg-10">
                            <textarea id="hadith" name="hadith" cols="30" rows="5" class="form-control">
                                <?php if (isset($_GET['article'])) echo $article['hadith'] ?>
                            </textarea>
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

          <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Hadith
                            </font></font></header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>

                        <tr>
                            <th><i class="icon_profile"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Titre</font></font></th>
                            <th><i class="icon_mail_alt"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Rapporteur </font></font></th>
                            <th><i class="icon_mobile"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Contenue</font></font></th>
                            <th class="no-print"><i class="icon_cogs"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> action</font></font></th>
                        </tr>
                        <?php
                        $data = Manager::getDatas('hadith');
                        
                        foreach ($data as $value){

                            
                            ?>
                        <tr>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $value['titre'] ?></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $value['rapporteur'] ?></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $value['hadith'] ?></font></font></td>
                            <td class="no-print" >
                                <p>ha</p>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
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

