<header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left" style="display:flex">
        <a href="#intro"><img src="public/img/bg_photo.jpg" alt="" title="" width="50" height="50" /></a>
        <h1><a href="#intro" class="scrollto">AEMN</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Accueil</a></li>
          <li class="menu-has-children"><a href="index.php?action=activite">Activités</a></li>
          <li class="menu-has-children"><a href="#">Galérie</a>
            <ul>
              <li><a href="index.php?action=photo">Photo</a></li>
              <li><a href="index.php?action=video">Vidéo</a></li>
              <li><a href="index.php?action=document">Documentation</a></li>
              <li><a href="index.php?action=coran">Lecture du Saint Coran</a></li>
            </ul>
          </li>
          <!-- <li><a href="#team">Memebres</a></li> -->
          <li class="menu-has-children"><a href="#">Fonctionnement</a>
            <ul>
              <li><a href="index.php?action=organe">Organe</a></li>
              <li><a href="index.php?action=organigramme">Organigramme</a></li>
              <li><a href="index.php?action=be">Bureau Exécutif</a></li>
            </ul>
          </li>
          <?php 
            if($title == "Accueil")
            {
              ?>
              <li><a href="#contact">Contact</a></li>
              <li class="menu-has-children"><a href="#">Présentation</a>
                <ul>
                  <li><a href="#histoire">Historique</a></li>
                  <li><a href="#objectif">Objectif</a></li>
                  <li><a href="index.php?action=Section">Section</a></li>
                  <li><a href="index.php?action=Ssection">Sous Section</a></li>
                </ul>
              </li>
              <li><a href="#clients">Nos partenaire</a></li>
              <?php
            }
          ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
