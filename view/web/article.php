<?php 
    $title = "AEMN| Article";
    ob_start();
?>

<main>
<br><br><br><br>
    <div class="container">
        <div class="row ">
            <?php
                $datas = Article($id);
                foreach ($datas as $data)
                {
                    ?>
                    <div class="col-lg-4 col-md-8 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="<?= $data['url'] ?>" class="img-fluid" alt="<?= $data['title'] ?>">
                                <a href="<?= $data['url'] ?>" data-lightbox="portfolio" data-title="<?= $data['title'] ?>" class="link-preview" title="Afficher"><i class="ion ion-eye"></i></a>
                                <a href="#" class="link-details" title="Plus de Détails"><i class="ion ion-android-open"></i></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4">
                        <h1><?= $data['title'] ?></h1>
                        <div class="portfolio-info">
                            <p>Le <?= strftime(' %A %d %B  %G ',strtotime($data['dates'])) ?></p>
                            <p class="card-text"> <?= $data['content'] ?></p>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>