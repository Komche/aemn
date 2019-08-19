<?php if (isset($_GET['article'])) {
    $title = 'Modifier un article';
} else {
    $title = 'Ajouter un article';
} ?>

<?php ob_start(); ?>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i <i <?php if (isset($_GET['article'])) {
                                                    echo 'class="fa fa-pencil"';
                                                } else {
                                                    echo 'class="fa fa-plus-circle"';
                                                } ?>></i> <?php if (isset($_GET['article'])) {
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
                        <?php if (isset($_GET['article'])) {
                            echo $title;
                        } else {
                            echo $title;
                        } ?>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <?php if (isset($_GET['article'])) $article = getArticles($_GET['article']); ?>
                            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <label for="chassis_number" class="control-label col-lg-2">Titre</label>
                                    <div class="col-lg-10" id="title">
                                        <input class="form-control" id="title" name="title" type="text" value="<? if (isset($_GET['article'])) echo $article['title'] ?>" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="type" class="control-label col-lg-2">Type d'article<span class="required">*</span></label>
                                    <div class="col-lg-10" id="parent">
                                        <select onclick="hideType()" class="form-control" id="type" name="type">
                                            <?php
                                            $articles = getType_articles();
                                            foreach ($articles as $articl) {
                                                if (!empty($article['type'])) {
                                                    if ($article['type'] === $articl['id_type_article']) {
                                                        echo '<option value="' . $articl['id_type_article'] . '" selected>' . $articl['label'] . '</option>';
                                                    }
                                                }
                                                echo '<option value="' . $articl['id_type_article'] . '">' . $articl['label'] . '</option>';
                                            };
                                            echo '<option value="Autre">Autre</option>';
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="chassis_number" class="control-label col-lg-2">Fichiers</label>
                                    <div class="col-lg-10" id="parentF">
                                        <input class="form-control" id="url" name="url" type="file" value="<? if (isset($_GET['article'])) echo $article['url'] ?>" />
                                        <p class="help-block">Selectionner le fichier(images, documents..) de l'article depuis votre pc.</p>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="power" class="control-label col-lg-2">Contenu</label>
                                    <div class="col-lg-10">
                                        <textarea id="summernote" name="content" cols="30" rows="5" class="form-control">
                                            <? if (isset($_GET['article'])) echo $article['content'] ?>
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