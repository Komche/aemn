<?php $title='Gérer'; ?>
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
                                Gérer
                            </font></font></header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>

                        <tr>
                            <th><i class="icon_profile"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Nom Complet</font></font></th>
                            <th><i class="icon_mail_alt"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Email </font></font></th>
                            <th><i class="icon_mobile"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Numéro de téléphone</font></font></th>
                            <th class="no-print"><i class="icon_cogs"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> action</font></font></th>
                        </tr>
                        <?php
                        $users = getUserRole();
                        $i = 0;
                        $j = 100;
                        foreach ($users as $user){

                            $i++;
                            $j++;
                            ?>
                        <tr>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $user['last_name'].' '.$user['first_name'] ?></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $user['email'] ?></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $user['phone_number'] ?></font></font></td>
                            <td class="no-print" >
                                <form style="display:flex;" action="#" method="post" accept-charset="utf-8">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Droit:</label>
                                        <div class="col-lg-10">
                                            
                                            <label class="checkbox-inline">
                                                <input type="checkbox" <? if($user['read_role']=="yes-done") echo('checked="true"'); ?> <? $a = "'inlineCheckbox".$i."'"; echo 'id='.$a; ?> name="read" value="yes-done"> Consulter
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" <? if($user['write_role']=="yes-done") echo("checked"); ?> <? $b = "'inlineCheckbox".$j."'"; echo 'id='.$b; ?> name="write" value="yes-done"> Ecrire
                                            </label>
                                        </div>
                                    </div>
                                    <div class="radios">
                                        <label class="label_radio r_off" for="radio-01">
                                            <input name="type" <? if($user['types']=="Admin") echo("checked"); ?> <?= 'onclick="isAdmin('.$a.','.$b.')"'; ?>  <?= 'id="radio-'.$i.'"'; ?> value="Admin" type="radio" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Administrateur</font></font>
                                        </label>
                                        <label class="label_radio r_on" for="radio-02">
                                            <input <? if($user['types']=="Membre") echo("checked"); ?> name="type" <?= 'onclick="notAdmin('.$a.','.$b.')"'; ?> <?= 'id="radio-'.$j.'"'; ?> value="Membre" type="radio" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Membre</font></font>
                                        </label>
                                    </div>
                                    <input type="hidden" value="<?= $user['id_user'] ?>" name="user">
                                    <input type="hidden" value="<?= $user['id_roles'] ?>" name="role">
                                    <div class="btn-group">
                                        <button <? if(!empty($user['types'])) echo("disabled"); ?> class="btn btn-primary" type="submit"><i class="fa fa-check"></i></button>
                                    
                                        <a class="btn btn-primary" href="index.php?action=modif&amp;user=<?= $user['id_user'] ?>"><i class="icon_pencil-edit"></i></a>
                                    </div>
                                </form>
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