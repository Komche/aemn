<?php $title='Buerau'; ?>
  <?php ob_start();?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->





        <!-- Today status end -->



        <div class="row">

            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                <?=$title ?>
                            </font></font></header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>

                        <tr>
                            <th><i class="icon_profile"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Nom du bureau</font></font></th>
                            <th><i class="icon_mail_alt"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Statut </font></font></th>
                            <th><i class="icon_mobile"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Logo</font></font></th>
                            <th class="no-print"><i class="icon_cogs"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> action</font></font></th>
                        </tr>
                        <?php
                        $bureaus = BureauManager::getBureau();
                        
                        foreach ($bureaus as $bureau){

                            
                            ?>
                        <tr>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $bureau['nom_bureau'] ?></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $bureau['statut'] ?></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><img src="<?= $bureau['logo'] ?>" alt="logo" sizes="50"></font></font></td>
                            <td class="no-print" >
                                <p>ha</p>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </section>
            </div>
          <!--/col-->
          
          
          <!--/col-->
          
          <!--/col-->

        </div>



        <!-- statics end -->

        <div class="container">
            <button onclick="printer()" class="btn btn-primary no-print" href="" title="Imprimer le tableau"><span class="fa fa-print"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Imprimer</font></font></button>
        </div>


      </section>
    </section>
    <!--main content end-->
  </section>
    
  <!-- container section start -->
  <?php
  $content = ob_get_clean();

  require('template.php');
?>