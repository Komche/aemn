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
                      $datas = getArticleType($id);
                      foreach ($datas as $data)
                      {
                          ?>
                          <div class="card " style="width: 45rem;">
                              <img class="card-img-top" src="<? echo $data['url'] ?>" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title"><? echo $data['title'] ?></h5>
                                  <p class="card-text"> <? echo $data['content'] ?></p>
                              </div>
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item">Rédiger par : <? echo $data['last_name'].' '.$data['first_name'] ?>
                                      <span style="margin-left: 150px; font-weight: bold"><? echo $data['likes'].' ' ?></span>
                                      <a class="" href="index.php?like=<? echo $like ?>&amp;article=<? echo $data['id_article'] ?>""><i style="color:red" class="fa fa-heart"></i></a>
                                  </li>
                                  <li class="list-group-item">
                                      Le <? echo strftime(' %A %d %B  %G ',strtotime($data['dates'])) ?>
                                  </li>
                              </ul>
                          </div>
                          <br>

                          <!-- <ul>
                              <li><? //echo $data['title'] . ' ' . $data['content']; ?></li>
                          </ul> -->
                          <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
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
                                    <ul>
                                        <li><a href="index.php?action=activite&id=<? echo $data['id_type_article']; ?>"><? echo $data['label']; ?></a></li>
                                    </ul>
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