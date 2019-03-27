<?php 
    $title = "AEMN| Galérie Vidéo";
    ob_start();
?>
<br><br>
<section id="portfolio"  class="section-bg" >
    <div class="container">
        <header class="section-header">
          <h3 class="section-title">Galérie vidéo</h3>
        </header>
        <div class="row portfolio-container">
            <?php 
                $datas = getVideoArticles();
                foreach ($datas as $data)
                {
                    ?>
                    <div class="col-lg-6 col-md-6 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                            <iframe width="540" height="300" src="https://www.youtube.com/embed/<? echo $data['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="portfolio-info">
                                <h4><a href="#"><? echo $data['title'] ?>,Le <? echo strftime(' %A %d %B  %G ',strtotime($data['dates'])) ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <br>
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