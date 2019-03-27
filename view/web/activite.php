<?php 
    $title = "AEMN| Nos activités";
    ob_start();
?>

<main>
    <div style="margin-top: 100px" class="article">
        <div class="row">
            <div class="col-md-8">
                <div class="container">
                    <?php 
                      $datas = getArticles();
                      foreach ($datas as $data)
                      {
                          ?>
                          <div class="card " style="width: 45rem;">
                              <img class="card-img-top" src="<? echo $data['url'] ?>" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title"><a href="index.php?action=article&id=<? echo $data['id_article']; ?>"><? echo $data['title'] ?> </a></h5>
                              </div>
                          </div>
                          <br>
                          <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row portfolio-container">
                <div class="container">
                    <div class="card ">
                        <div class="card-header">
                            <h1>Catégories</h1>
                        </div>
                        <?php 
                            $datas = getType_articles();
                            foreach ($datas as $data)
                            {
                                ?>
                                <div class="card-body">
                                   <a href="index.php?action=activite&id=<? echo $data['id_type_article']; ?>"><? echo $data['label']; ?></a>
                                </div>
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