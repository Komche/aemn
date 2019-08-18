<?php 
    $title = "AEMN| Nos activités";
    ob_start();
?>

<main>
<div class="article">
        <h1 align="center">Nos Annonces</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <?php
                        $datas = getArticles();
                        foreach ($datas as $data)
                        {
                            ?>
                            <div class="col-md-4">
                                <img class="card-img" src="<?= $data['url'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="index.php?action=article&id=<?= $data['id_article']; ?>"><?= $data['title'] ?> </a></h5>
                                    <p>Le <?= strftime(' %A %d %B  %G ',strtotime($data['date_event'])) ?>, <?= $data["lieu"]?></p>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>