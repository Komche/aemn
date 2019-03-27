<?php 
    $title = "AEMN| Organigramme";
    ob_start();
?>
<br><br>
<main>
<section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Instances et Organes de l'AEMN</h3>
          <p><strong> Congrès</strong> : il est la plus haute instance de l’Association. Il se tient tous les deux ans.</p>
          <p><strong> L’Assemblée Générale</strong> : elle se tient en session ordinaire chaque année. Toutefois, une session extraordinaire peut, au besoin, être convoquée.</p>
          <p>Les organes de l’AEMN sont: </p>
        </div>

        <div class="row contact-info">

          <div class="col-md-3">
            <div class="contact-address">
              <h3>Conseil Consultatif National</h3>
              <address>C’est un organe d’orientation, de conseil et de suivi de l’Association. Il regroupe les membres fondateurs, les anciens membres du Bureau Exécutif National (BEN) n’ayant pas fait l’objet de sanction disciplinaire. Il est dirigé par un bureau national composé de cinq(5) membres représenté par des bureaux régionaux.</address>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-phone">
              <h3>BEN</h3>
              <p>Il est chargé de l’exécution des décisions du Congrès, de la coordination des activités de l’Association et de la gestion saine des ressources. Il est élu par le congrès pour un mandat de deux ans.</p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-email">
              <h3>Les Sections</h3>
              <p>Elles sont composées à l’image du BEN et représentent l’Association dans les régions, les universités nationales, l’université islamique de Say et à l’étranger.</a></p>
            </div>
          </div>

          <div class="col-md-3">
              <div class="contact-phone">
              <h3>Sous Sections</h3>
              <p>Représentent l’Association au niveau des instituts, écoles supérieurs et universités privées.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>