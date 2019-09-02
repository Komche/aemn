<?php 
    $title = "AEMN| Nos activités";
    ob_start();
?>

<main>
<div class="article">
        <div class="row">
            <div class="col-md-8">
                <div class="container">
                <h1 align="center">Nos Annonces</h1>
                    <div class="row">
                        <?php
                        $datas = getArticles(null, 7);
                        foreach ($datas as $data)
                        {
                            ?>
                            <div class="col-md-4">
                                <img class="card-img" src="<?= $data['url'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="index.php?action=article&id=<?= $data['id_article']; ?>"><?= $data['title'] ?> </a></h5>
                                    <p>Le <?= strftime(' %A %d %B  %G ',strtotime($data['date_evenement'])) ?>, Lieu: <?= $data["lieu"]?></p>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h1>ok ok ok</h1>
                <!--<iframe title="La page Facebook de l'AEMN" src="https://www.facebook.com/Associations-des-Etudiants-Musulmans-du-Niger-AEMN-262470803769982" width="400px" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpg%2FAssociations-des-Etudiants-Musulmans-du-Niger-AEMN-262470803769982%2Fposts%2F%3Fref%3Dpage_internal&tabs=timeline&width=400&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
    </div>
</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>