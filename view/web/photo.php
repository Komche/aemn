<?php 
    $title = "AEMN| Galérie Photo";
    ob_start();
    if($_GET['id']){
        $id= $_GET['id'];
    } else {
        $id = null;
    }
?>
<br><br>
<section id="portfolio"  class="section-bg" >
    <div class="container">
        <header class="section-header">
          <h3 class="section-title">Galérie photo</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
                <li data-filter="*">
                    <a href="index.php?action=photo">Tous</a>
                </li>
                <?php 
                    $datas = getType_Articles();
                    foreach ($datas as $data)
                    {
                        ?>
                        <li data-filter=".filter-app"><a href="index.php?action=photo&id=<?= $data['id_type_article'] ?>"><?= $data['label'] ?></a></li>
                        <?php
                    }
                ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
            <?php
                $datas = getPhotoArticles($id);
                if($datas != null)
                {
                    foreach ($datas as $data)
                    {
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="<?= $data['url'] ?>" class="img-fluid" alt="<?= $data['title'] ?>">
                                    <a href="<?= $data['url'] ?>" data-lightbox="portfolio" data-title="<?= $data['title'] ?>" class="link-preview" title="Afficher"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="Plus de Détails"><i class="ion ion-android-open"></i></a>
                                </figure>

                                <div class="portfolio-info">
                                    <h4><a href="#"><?= $data['title'] ?></a></h4>
                                    <p>Le <?= strftime(' %A %d %B  %G ',strtotime($data['dates'])) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } elseif($datas=[])
                { ?>
                    <div class="row">
                        <h3> Aucune photo pour ce type d'Article ! </h3>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>
<?php
    $content = ob_get_clean();
    require('template.php');
?>