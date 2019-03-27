<div class="row">

<div class="col-lg-12">
    <h1 class="page-header"><?= getFolderName($_GET['galerie']) ?></h1>
      
      <?php 
      $datas = getFiles($_GET['galerie']);
      if (is_array($datas) || is_object($datas)) {
        foreach ($datas as $data) {

          ?>

    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://onelive.us/wp-content/uploads/2014/08/flower-delivery-online.jpg" data-target="#image-gallery">
            <img title="<?= $data['label'] ?>" class="img-responsive" src="<?= $data['path'] ?>" alt="<?= $data['label'] ?>">
        </a>
    </div>

        <?php 
      }
    } else {
      global $erreur;
      $erreur = "Auncune image trouver";
      if (!empty($erreur)) {
        error($erreur);
      }
    }
    ?>

</div>


<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="image-gallery-title"></h4>
          </div>
          <div class="modal-body">
              <img id="image-gallery-image" class="img-responsive" src="">
          </div>
          <div class="modal-footer">

              <div class="col-md-2">
                  <button type="button" class="btn btn-primary" id="show-previous-image">Précedent</button>
              </div>

              <div class="col-md-8 text-justify" id="image-gallery-caption">
                  This text will be overwritten by jQuery
              </div>

              <div class="col-md-2">
                  <button type="button" id="show-next-image" class="btn btn-default">Suivant</button>
              </div>
          </div>
      </div>
  </div>
</div>