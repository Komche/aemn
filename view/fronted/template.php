<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title;; ?></title>

    <!-- my css file -->

    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

    <link href="public/vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="public/vendor/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="public/vendor/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="public/vendor/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="public/vendor/css/style.css" rel="stylesheet">
    <link href="public/vendor/css/style-responsive.css" rel="stylesheet" />
    <link href="public/vendor/css/daterangepicker.css" rel="stylesheet">

    <!-- animate styles -->
    <link href="public/vendor/css/animate.css" rel="stylesheet" />

    <link href="public/vendor/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="public/vendor/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="public/vendor/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="public/vendor/css/owl.carousel.css" type="text/css">
    <link href="public/vendor/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="public/vendor/css/fullcalendar.css">
    <link href="public/vendor/css/widgets.css" rel="stylesheet">
    <link href="public/vendor/css/xcharts.min.css" rel=" stylesheet">
    <link href="public/vendor/css/jquery-ui-1.10.4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="public/vendor/css/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">



</head>

<body class="login-img3-body">
    <?php
    if ($title == 'Connexion' || $title == 'Inscription') {
      echo $content;
    } else { ?>
    <section id="container" class="">


        <header class="header no-print dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <div>
                <a href="index.php?action=panel" class="logo">AE<span class="lite">MN</span></a>
                <p style="display: inline; color:black;">
                    <?php 
                    if (!empty($_SESSION['id'])) {
                      echo ("Salut " . $_SESSION['last_name'] . " " . $_SESSION['first_name']);
                    }
                    ?>
                </p>
            </div>
            <!--logo end-->

            <div class="top-nav notification-row">

                <a href="model/function/deconnexion.php" style="color: #ededee;"><i class="fa fa-power-off"></i> Deconnecter</a>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside class="no-print">
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="index.php?action=panel">
                            <i class="icon_house_alt"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-pencil"></i>
                            <span>Article</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <?php 
                            if (isset($_SESSION['read_role'])) {
                              if ($_SESSION['read_role'] == 'yes-done') {
                                ?>
                            <!--<li><a class="" href="index.php?action=showVV&amp;vehicle=all">Consulter</a></li>-->
                            <?php 
                          }
                        }
                        if (isset($_SESSION['write_role'])) {
                          if ($_SESSION['write_role'] == 'yes-done') {
                            ?>
                            <li><a class="" href="index.php?action=addAV">Ajouter</a></li>
                            <?php 
                          }
                        }
                        ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-pencil"></i>
                            <span>Bureaux</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <?php 
                            if (isset($_SESSION['read_role'])) {
                              if ($_SESSION['read_role'] == 'yes-done') {
                                ?>
                            <li><a class="" href="index.php?action=showBuro">Liste des bureaux</a></li>
                            <?php 
                          }
                        }
                        if (isset($_SESSION['write_role'])) {
                          if ($_SESSION['write_role'] == 'yes-done') {
                            ?>
                            <li><a class="" href="index.php?action=addBuro">Ajouter</a></li>
                            <?php 
                          }
                        }
                        ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-folder-o"></i>
                            <span>Document</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <?php 
                            if (isset($_SESSION['read_role'])) {
                              if ($_SESSION['read_role'] == 'yes-done') {
                                ?>
                            <li><a class="" href="index.php?action=showGalerie">Consulter Galerie</a></li>
                            <li><a class="" href="index.php?action=showDocumentation">Consulter document</a></li>
                            <?php 
                          }
                        }
                        if (isset($_SESSION['write_role'])) {
                          if ($_SESSION['write_role'] == 'yes-done') {
                            ?>
                            <li><a class="" href="index.php?action=addDocV">Ajouter un document</a></li>
                            <li><a class="" href="index.php?action=addFV">Ajouter un dossier</a></li>
                            <?php 
                          }
                        }
                        ?>


                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-image"></i>
                            <span>Images défilante</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <?php 
                            if (isset($_SESSION['write_role'])) {
                              if ($_SESSION['write_role'] == 'yes-done') {
                                ?>
                            <li><a class="" href="index.php?action=addImg">Ajouter</a></li>
                            <?php 
                          }
                        }
                        if (isset($_SESSION['read_role'])) {
                          if ($_SESSION['read_role'] == 'yes-done') {
                            ?>
                            <li><a class="" href="index.php?action=showSlide">Afficher</a></li>
                            <?php 
                          }
                        }
                        ?>
                        </ul>
                    </li>
                    <!--<li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-bitbucket-square"></i>
                          <span>Chauffeurs</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php 
            if (isset($_SESSION['read_role'])) {
              if ($_SESSION['read_role'] == 'yes-done') {
                ?>
              <li><a class="" href="index.php?action=showDV">Consulter</a></li>
              <?php 
            }
          }

          if (isset($_SESSION['write_role'])) {
            if ($_SESSION['write_role'] == 'yes-done') {
              ?>
              <li><a class="" href="index.php?action=addD">Ajouter</a></li>
              <?php 
            }
          }
          ?>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-money"></i>
                          <span>Payement</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php 
            if (isset($_SESSION['read_role'])) {
              if ($_SESSION['read_role'] == 'yes-done') {
                ?>
              <li><a class="" href="index.php?action=showPV">Consulter</a></li>
              <?php 
            }
          }

          if (isset($_SESSION['write_role'])) {
            if ($_SESSION['write_role'] == 'yes-done') {
              ?>
              <li><a class="" href="index.php?action=addP">Ajouter</a></li>
              <?php 
            }
          }
          ?>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_cogs"></i>
                          <span>Garage</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php 
            if (isset($_SESSION['read_role'])) {
              if ($_SESSION['read_role'] == 'yes-done') {
                ?>
              <li><a class="" href="index.php?action=showG">Consulter</a></li>
            <?php 
          }
        }
        if (isset($_SESSION['write_role'])) {
          if ($_SESSION['write_role'] == 'yes-done') {
            ?>
              <li><a class="" href="index.php?action=addG">Ajouter</a></li>
              <?php 
            }
          }
          ?>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_cogs"></i>
                          <span>Entretient</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
            <?php 
            if (isset($_SESSION['read_role'])) {
              if ($_SESSION['read_role'] == 'yes-done') {
                ?>
              <li><a class="" href="index.php?action=showM">Consulter</a></li>
              <?php 
            }
          }
          if (isset($_SESSION['write_role'])) {
            if ($_SESSION['write_role'] == 'yes-done') {
              ?>
              <li><a class="" href="index.php?action=addM">Ajouter</a></li>
              <?php 
            }
          }
          ?>
            </ul>
          </li>-->
                    <?php 
                    if (isset($_SESSION['types'])) {
                      if ($_SESSION['types'] == 'Admin') {


                        ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-user"></i>
                            <span>Administration</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="index.php?action=showUV">Gérer</a></li>
                            <li><a class="" href="index.php?action=addU">Ajouter</a></li>
                        </ul>
                    </li>
                    <?php 
                  }
                }
                ?>
                    <!--<li>
            <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
          </li>
          <li>
            <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>

                      </a>

          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">Basic Table</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>-->

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <?php
        echo $content;
      }

      ?>
        <script src="public/vendor/js/jquery.js"></script>
        <script src="public/vendor/js/jquery-ui-1.10.4.min.js"></script>
        <script src="public/vendor/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="public/vendor/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="public/vendor/js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="public/vendor/js/jquery.scrollTo.min.js"></script>
        <script src="public/vendor/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="public/vendor/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="public/vendor/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="public/vendor/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="public/vendor/js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <script src="public/vendor/js/fullcalendar.min.js"></script>
        <!-- Full Google Calendar - Calendar -->
        <script src="public/vendor/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="public/vendor/js/calendar-custom.js"></script>
        <script src="public/vendor/js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="public/vendor/js/jquery.customSelect.min.js"></script>
        <script src="assets/chart-master/Chart.js"></script>
        <script src="public/vendor/js/wow.min.js"></script>

        <!--custome script for all page-->
        <script src="public/vendor/js/scripts.js"></script>
        <script src="public/js/script.js"></script>

        <!-- custom script for this page-->
        <script src="public/vendor/js/sparkline-chart.js"></script>
        <script src="public/vendor/js/easy-pie-chart.js"></script>
        <script src="public/vendor/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="public/vendor/js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="public/vendor/js/xcharts.min.js"></script>
        <script src="public/vendor/js/jquery.autosize.min.js"></script>
        <script src="public/vendor/js/jquery.placeholder.min.js"></script>
        <script src="public/vendor/js/gdp-data.js"></script>
        <script src="public/vendor/js/morris.min.js"></script>
        <script src="public/vendor/js/sparklines.js"></script>
        <script src="public/vendor/js/charts.js"></script>
        <script src="public/vendor/js/jquery.slimscroll.min.js"></script>
        <script src="public/vendor/js/daterangepicker.js"></script>
        <script>
            //knob
            $(function() {
                $(".knob").knob({
                    'draw': function() {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function() {
                $("#owl-slider").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true

                });
            });

            //custom select box

            $(function() {
                $('select.styled').customSelect();
            });

            /* ---------- Map ---------- */
            $(function() {
                $('#map').vectorMap({
                    map: 'world_mill_en',
                    series: {
                        regions: [{
                            values: gdpData,
                            scale: ['#000', '#000'],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    backgroundColor: '#eef3f7',
                    onLabelShow: function(e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js">

        </script>


</body>

</html> 