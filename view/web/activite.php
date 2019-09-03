<?php 
    $title = "AEMN| Nos activités";
    ob_start();
    $currentPage = (int)($_GET['page'] ?? 1);
    if($currentPage <= 0){
        throw new Exception("Numéro de page invalide");
        
    }
    $count = countArticles(7);
    $perPage = 6;
    $pages = ceil($count / $perPage);
    if ($currentPage > $pages){
        throw new Exception("Cette page n'existe pas");
    }
    $offset = $perPage * ($currentPage - 1);
    $link = "index.php?action=activite";
?>

<main>
    <div class="article">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="container">
                <h3 align="center">Nos Annonces</h3>
                    <div class="row">
                        <?php
                        $datas = getArticles(null, 7, $perPage, $offset);
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
            <div class="col-12 col-md-4">
                <h3>Notre page <i class="fa fa-facebook"></i>acebook</h3>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpg%2FAssociations-des-Etudiants-Musulmans-du-Niger-AEMN-262470803769982%2Fposts%2F%3Fref%3Dpage_internal&tabs=timeline&width=400&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
        <div class="d-flex justify-content-between my-4">
            <?php if($currentPage > 1):?>
                <?php
                if($currentPage > 2) $link .= '&page' . ($currentPage - 1);
                ?>
                    <a href="<?= $link ?>" class="btn btn-primary">&laquo; Page précédente</a>
                <?php endif; ?>
            <?php if($currentPage < $pages):?>
                <a href="index.php?action=activite&page=<?= $currentPage + 1 ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>