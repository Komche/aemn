<?php $title = 'Panel'; ?>
<?php ob_start(); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->


        <div class="row no-print">

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="#">
                    <div class="info-box dark-bg">
                        <i class="fa fa-thumbs-o-up"></i>
                        <div class="count"><?php echo nbArticles(); ?></div>
                        <div class="title">Nombre totale des articles</div>
                    </div>
                </a>
                <!--/.info-box-->
            </div>
            <!--/.col-->

            <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-female"></i>
              <div class="count"><?php  ?></div>
              <div class="title">Nombre de Femelle</div>
            </div>
            <!--/.info-box-->
        </div>
        <!--/.col-->
        </div>

        <!--/.row-->


        <!-- Today status end -->



        <div class="container">
            <?php 
            if (!empty($_GET['del'])) {
              deleteArticles($_GET['del']);
            }
            $like = 0;
            $datas = getArticles();
            foreach ($datas as $data) {
              $like = $data['likes'] + 1;
              ?>
            <i onclick="showAlerte('article',<?= $data['id_article'] ?>)" class="text-danger sup fa fa-times-circle"></i>
            <a href="index.php?action=modif&article=<?= $data['id_article'] ?>">
                <i class="fa fa-edit text-primary" style="margin-left: 10px; cursor: pointer;"></i>
            </a>
            <div class="card " style="width: 45rem;">
                <img class="card-img-top" src="<? echo $data['url'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <? echo $data['title'] ?>
                    </h5>
                    <p class="card-text">
                        <? echo $data['content'] ?>
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Rédiger par :
                        <? echo $data['last_name'] . ' ' . $data['first_name'] ?>
                        <span style="margin-left: 150px; font-weight: bold">
                            <? echo $data['likes'] . ' ' ?></span>
                        <a class="" href="index.php?like=<? echo $like ?>&amp;article=<? echo $data['id_article'] ?>""><i style=" color:red" class="fa fa-heart"></i></a>
                    </li>
                    <li class="list-group-item">Le
                        <? echo strftime(' %A %d %B  %G ', strtotime($data['dates'])) ?>

                    </li>
                </ul>

            </div>
            <br> <br>

            <?php 
          }

          ?>

            <div class="alert-parent panel-alert">
                <div class="myalert">
                    <i onclick="delAlerte()" class="text-danger delete-alerte fa fa-times"></i>
                    <div class="myalert-content">
                        <p>Voulez vous vraiment supprimer cet </p>
                        <p class="text-danger">

                        </p>
                    </div>
                    <div class="myalert-footer">
                        <a class="btn btn-danger right" href="index.php?panel=go&del=">Supprimer</a>
                        <button class="btn btn-primary left" onclick="delAlerte()">Retour</button>
                    </div>
                </div>
            </div>
            <!--/col-->


            <!--/col-->

            <!--/col-->

        </div>


        <div class="container">
            <button onclick="printer()" class="btn btn-primary no-print" href="" title="Imprimer le tableau"><span class="fa fa-print"></span>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> Imprimer</font>
                </font>
            </button>
        </div>


        <!-- statics end -->




    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<?php
$content = ob_get_clean();

require('template.php');

?> 