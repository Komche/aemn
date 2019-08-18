<?php $title = "Accueil";
ob_start();
?>

<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="public/vendor/img/intro-carousel/img1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Association des Etudiants Musulmans du Niger</h2>
                <p>Unis par la foi, Ensemble pour le bien.</p>
                <a href="#featured-services" class="btn-get-started scrollto">AEMN</a>
              </div>
            </div>
          </div>
          <?php 
            $datas = getFiles(0);
            if (is_array($datas) || is_object($datas)) {
                $i = 0;
                foreach ($datas as $data) {
                    $i++;
              ?>
              <div class="carousel-item">
                <div class="carousel-background"><img src="<?= $data['path'] ?>" alt="photo dynamique"></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Association des Etudiants Musulmans du Niger</h2>
                    <p>Unis par la foi, Ensemble pour le bien.</p>
                    <a href="#featured-services" class="btn-get-started scrollto">AEMN</a>
                  </div>
                </div>
              </div>
                <?php }
            }
          ?>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Lorem Ipsum Delino</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Adhésion</a></h4>
            <p class="description">L’adhésion à l’Association est libre et volontaire pour tout étudiant musulman au Niger ou nigérien à l’étranger sans distinction d’ethnie, d’âge ou de sexe.</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3 id="objectif">Nos Objectifs</h3>
          <p>L’objectif par définition est la raison d’être, le pourquoi de l’existence de toute structure. Les objectifs de l’AEMN, mentionnés au niveau du titre II et article 4 des statuts de l’association, se présente comme suit :</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-6 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="public/img/img1.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Général</a></h2>
              <p>
              L’objectif général est la contribution à la promotion des valeurs islamiques à travers le Coran et la Sounna. Vous conviendrez avec nous que cet objectif est bien réfléchi et est adapté à l’évolution du temps dans ce monde du 21eme Siècle ou malheureusement beaucoup des gens n’arrivent pas à faire la différence entre les faits et la réalité à propos de l’Islam. A cet objectif général sont rattachés des objectifs spécifiques qui concourent tous à l’atteinte du général. Ces derniers sont les suivants :
              </p>
            </div>
          </div>

          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="public/img/img2.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Spécifique</a></h2>
              <p>
                Œuvrer à la formation de ses membres pour une connaissance et une bonne compréhension de l’Islam;
              </p>
              <p>
                Participer au développement social et économique du Niger à travers, entre autres, la formation civique et citoyenne de ses membres ;
              </p>
              <p>
                Promouvoir l’unité, l’entraide et la solidarité entre ses membres ;
              </p>
              <p>
                Promouvoir l’assistance aux personnes défavorisées à travers les activités sociales et culturelles.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3 id="histoire">Historique</h3>
          <p>L’AEMN (Association des Etudiants Musulmans du Niger) est une structure islamique nationale de coordination des activités des étudiants musulmans du Niger. Elle est reconnue officiellement le 21 avril 2010 par Arrêté n°0227/MI/SD/AR/DGAPJ/DLP. Elle est organisée en Bureau Exécutif National(BEN), Sections (dans les universités) et Sous-Sections (dans les écoles et Instituts Supérieurs).</p>
        </header>

        <div class="row">

          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">AEMUN</a></h4>
            <p class="description">L’historique de l’AEMN commence avec la création en 1993 de l’AEMUN (Association des Etudiants Musulmans à l’Université de Niamey) qui sera reconnue officiellement par arrêté n°97/MI en date du 11 juin 1993. L’AEMUN comme toutes les structures scolaires musulmanes, vient compléter l’éducation morale et spirituelle des scolaires en général et celle des scolaires musulmans en particulier. Elle constitue également un cadre d’expression et de pratique de la foi et de la spiritualité de ses membres.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="">AEEMN</a></h4>
            <p class="description">Dissoute en 2001, le souci de la législation viendra renforcer le souci déjà existant depuis sa création de réunir tous les scolaires nigériens musulmans dans une seule structure, l’AEEMN (Association des Elèves et Etudiants Musulmans du Niger). Cette ambition sera matérialisée en 2007 avec la création de l’AEMN, certes plus réduite car excluant les élèves, mais sans aucun doute une avancée majeure.</p>
          </div>
        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>L'AEMN</h3>
        <p> Unis par la foi, Ensemble pour le bien.</p>
        <a class="cta-btn" href="#">Slogan</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->
    <section id="skills">
      <div class="container">

        <header class="section-header">
          <h3>Nos Organes</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
        </header>

        <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Conseil Consultatif <i class="val">Orientation, Conseil, Suivi.</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Bureau Exécutif National <i class="val">BEN</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Les Sections <i class="val">Unviresité, Région, Etranger</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Les sous sections <i class="val">écoles, instituts</i></span>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Nos Bureaux (BE)</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo nbBureau(); ?></span>
            <p>Bureau</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo nbSection(); ?></span>
            <p>Section</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo nbSsection(); ?></span>
            <p>Sous sections</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">11</span>
            <p>Membres / BE</p>
  				</div>

  			</div>

      </div>
    </section><!-- #facts -->

    <section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Hadith</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">
          <?php 
            $datas = getHadiths();
            foreach ($datas as $data)
            {
              ?>
              <div class="testimonial-item">
                <h3><?= $data['titre'] ?></h3>
                <h4><?= $data['rapporteur'] ?></h4>
                <p>
                  <?= $data['hadith'] ?>
                </p>
              </div>
              <?php
            }
          ?>
        </div>

      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Nos Partenaires</h3>
          <p>Ecoles, Instituts et Universités</p>
        </div>

        <div class="row">
        <?php 
              $datas = getLogoBureau();
              foreach ($datas as $data)
              {
                  ?>
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?= $data['logo']?>" class="img-fluid" alt="<?= $data['nom_bureau']?>">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?= $data['nom_bureau']?></h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php 
              }
              ?>
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactez Nous</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Adresse</h3>
              <address>UAM, ancienne grande Mosquée, face Agrymethe NY</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+22796054499">+227 96 05 44 99</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:aemn.niger@gmail.com">aemn.niger@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Votre message a bien été envoyé. Merci!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse mail" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Envoyer</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <?php
    $content = ob_get_clean();
    require('template.php');
  ?>