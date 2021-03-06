<!DOCTYPE html>
<!-- define angular app -->
<html ng-app="scotchApp">
<head>
  <!-- basic favi icon -->
    <meta charset="utf-8" />
    <title>Oye, lo que te gusta</title>
    <link rel="shortcut icon" href="img/ico/logo.png" type="image/x-icon"/>
  <!-- Bootstrap & FontAwesome CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope-plugin/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet" type="text/css">
    <link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">  
    <link href="css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="css/flexslider.css" rel="stylesheet" type="text/css">
    

  <!-- Temas del CSS Los estilos propios my-->
    <link href="css/theme.css" rel="stylesheet" type="text/css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">

  <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- Solo para chrome css -->
    <link href="css/header/header-1.css" rel="stylesheet">

  <!-- Responsive CSS -->
    <link href="css/theme-responsive.css" rel="stylesheet" type="text/css"> 
    <link href="css/header/header-1-responsive.css" rel="stylesheet" type="text/css"> 
    <link id="link-header-mode-r" href="css/mode/mode-1-header-responsive.css" rel="stylesheet" type="text/css"> 
    <link id="link-footer-mode-r" href="css/mode/mode-1-footer-responsive.css" rel="stylesheet" type="text/css">
    <link href="css/animate.min.css" rel="stylesheet" type="text/css">
    
  <!-- reproductor mp3 player -->
    <link href="css/player/playerconfig.css" rel="stylesheet" type="text/css">
    
  <!-- Custom CSS -->
    <link href="css/custom/custom.css" rel="stylesheet" type="text/css">
    <link href="css/animatepage.css" rel="stylesheet" type="text/css">
  <!-- map -->
    <link href="css/map/leaflet.css" rel="stylesheet" />
    

  <!-- Head SCRIPTS -->
    <!-- <script type="text/javascript" src="js/modernizr.js"></script>  -->

  <!-- SPELLS -->
  <script src="js/angular-1.5.0/angular.js"></script>
  <script src="js/angular-1.5.0/angular-route.js"></script>
  <script src="js/angular-1.5.0/angular-animate.js"></script>
  <script src="js/angular-1.5.0/ui-bootstrap-tpls-1.1.2.min.js"></script>
  <!-- Script del mapa -->
  <script src="js/map/leaflet.js"></script>

  <!-- controlador procesos angular -->
  <script src="controlador/app.js"></script>
  <script src="controlador/home.js"></script>
  <script src="controlador/corporativo.js"></script>
  <script src="controlador/noticias.js"></script>
  <script src="controlador/contactos.js"></script>
  <script src="controlador/podcats.js"></script>
  <script src="controlador/programacion.js"></script>
  <script src="controlador/corporativo.js"></script>
  <script src="controlador/tarifa.js"></script>
  <script src="controlador/programas/programa1.js"></script>
  <script src="js/pace/pace.min.js"></script>
</head>

<!-- define angular controller -->
<body ng-controller="mainController" class="clearfix" data-smooth-scrolling="1">
  <div class="vc_body">
    <!-- Inicio Header -->
      <header data-active="home" class="header-1 mode-1" id="header">
        <!-- Inicio menu principal-->
          <div class="vc_primary-menu-wrapper">
            <div class="container">
              <div class="row">
                <nav class="vc_menu"> 
                  <div class="logo">
                    <a href="#/"> 
                      <img  alt="logo" src="img/logo.png"> 
                    </a>
                  </div>
                  <div class="vc_btn-navbar">
                   <!-- Inicio Botón -->
                    <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".vc_primary-menu">
                    <span class="icon-bar"> </span> 
                    <span class="icon-bar"> </span> 
                    <span class="icon-bar"> </span> 
                    </button>
                   <!-- Fin Botón -->
                  </div>
                  <div class="vc_primary-menu">
                    <ul>
                      <li id="home"> <a href="index-2.html"> Home <i class="fa fa-caret-down"> </i> </a>
                        <div class="vc_menu-open-right vc_menu-2-v">
                          <ul class="clearfix">
                            <li> <a href="index-2.html"> Metro Slider Sketch </a> </li>
                            <li> <a href="index-portfolio.html"> Metro Slider Portfolio </a> </li>
                            <li> <a href="index-revolution.html"> Revolution Slider </a> </li>
                            <li> <a href="index-one-page-parallax.html"> One Page Parallax <span class="vc_bg-orange vc_small-info">NEW</span></a> </li>
                            <li> <a href="index-home-alt-1.html"> Home Alt 1 </a> </li>
                          </ul>
                        </div>
                      </li>

                      <li> 
                        <a href="#/corporativo"> <span class="fa fa-globe"></span> Corporativo </a>
                      </li>
                      <li> 
                        <a href="#/tarifa"> <span class="fa fa-credit-card"></span> Tarífas </a> 
                      </li>
                      <li> 
                        <a href="#/programacion"> <span class="fa fa-bars"></span> Programación </a> 
                      </li>
                      <li> 
                        <a href="#/podcast"> <span class="fa fa-music"></span> Podcast </a> 
                      </li>
                      <li> 
                        <a href="#/noticias"> <span class="fa fa-comment-o"></span> Noticias </a> 
                      </li>
                      <li> 
                        <a href="#/contactos"> <span class="fa fa-envelope"></span> Contactos </a> 
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        <!-- Fin del Container principal -->
        <!-- INICIO submenu telefonos / redes sociales-->
          <div class="vc_secondary-menu-wrapper">
            <div class="container">
              <div class="row">
                <div class="vc_secondary-menu">
                  <div class="vc_contact-top-wrapper col-xs-12 col-sm-7 col-md-8 col-lg-10">
                    <div class="vc_contact-top">
                      <div class="pull-left">
                        <h5> 
                          <i class="fa fa-envelope"></i>
                          <a href="mailto:info@oyefm.com?subject=feedback" "email me">info@oyefm.com</a>
                        </h5>
                      </div>
                      <div class="pull-left">
                        <h5> 
                          <span> 
                            <i class="fa fa-phone"> </i>062-606-027 
                          </span>
                          <span>
                            <i class="fa fa-mobile"></i>0998693535  
                          </span>
                        </h5>
                      </div>
                      <div class="pull-right">
                        <h5> 
                          <a href="" title=""><i class="fa fa-arrow-right"></i> Rendición de cuentas </a>
                          <span>
                          <i class="fa fa-arrow-right"></i> Tarifas y Comercialización 
                        </h5>
                      </div>
                    </div>
                  </div>
                  <!-- Inicio Redes Sociales -->
                  <div class="vc_social-share-wrapper hidden-xs col-sm-5 col-md-4 col-lg-2">
                    <div class="vc_social-share vc_tight pull-right"> 
                      <a title="Twitter" class="twitter" href="https://twitter.com/oyefm931"  target="_blank"> 
                        <i class="fa fa-twitter"></i> 
                      </a> 
                      <a title="Facebook" class="facebook" href="https://www.facebook.com/OYEfmImbabura"  target="_blank"> 
                        <i class="fa fa-facebook"></i> 
                      </a> 
                      <a title="Youtube" class="youtube" href="https://www.youtube.com/channel/UCd3nO-R6N8za5NQZnvsizvA"  target="_blank"> 
                        <i class=" fa fa-youtube-play"></i> 
                      </a> 
                      <a title="Instagram" class="instagram" href="https://www.instagram.com/oyefm/"  target="_blank"> <i class="fa fa-instagram"></i> 
                      </a> 
                    </div>
                  </div>
                  <!-- Fin de Redes Sociales -->
                </div> 
                <div class="vc_sub-menu-bg"><div class="element-1"></div>
                  <div class="element-2"></div>
                </div> 
              </div>
            </div>  
              <!-- container row --> 
          </div>
        <!-- FIN submenu telefonos / redes sociales-->
      </header>
    <!-- Fin header -->
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div ng-view class="view">
      
        </div>        
      </div>
      <div class="col-sm-3 animated slideInRight">
        <!-- Start Top Header -->
          <div id="particles-js">
          <div id="top-header" class="hidden-on-collapse">
            <div id="top-header-toggle" class="small-player-toggle-contract"></div>
            <div class="now-playing-title" amplitude-song-info="name"></div>
            <div class="album-information"><span amplitude-song-info="artist"></span> <span amplitude-song-info="album"></span></div>
          </div>
          <!-- End Top Header -->
          <!-- Start Large Album Art -->
          <div id="top-large-album" class="hidden-on-collapse">
            <img id="large-album-art" amplitude-song-info="cover"/>
          </div>
          <!-- End Large Album Art -->

          <!-- Begin Small Player -->
          <div id="small-player">
           <!-- Begin Small Player Album Art -->
            <img id="small-player-album-art" class="hidden-on-expanded" amplitude-song-info="cover"/>
            <!-- End Small Player Album Art -->

            <!-- Begin Small Player Middle -->
            <div id="small-player-middle" class="hidden-on-expanded"> 
              <div id="small-player-middle-top">
                <!-- Begin Controls Container -->
                <div id="small-player-middle-controls">
                  <div class="amplitude-play-pause amplitude-paused" amplitude-song-index="0"></div>
                </div>
                <!-- End Controls Container -->

                <!-- Begin Meta Container -->
                <div id="small-player-middle-meta">
                  <div class="now-playing-title" amplitude-song-info="name"></div>
                  <div class="album-information"><span amplitude-song-info="artist"></span> <span amplitude-song-info="album"></span></div>
                </div>
                <!-- End Meta Container -->
              </div>
              
              <div id="small-player-middle-bottom">
                <div class="amplitude-song-time-visualization" amplitude-song-index="0" id="song-time-visualization"></div>
              </div>
            </div>
            <!-- End Small Player Right -->

            <!-- Begin Small Player Full Bottom -->
            <div id="small-player-full-bottom" class="hidden-on-collapse">
              <div class="amplitude-play-pause amplitude-paused" amplitude-song-index="0"></div>
              <div id="small-player-full-bottom-info">
                <span class="current-time">
                  <span class="amplitude-current-minutes" amplitude-song-index="0">0</span>:<span class="amplitude-current-seconds" amplitude-song-index="0">00</span>
                </span>
                
                <div class="amplitude-song-time-visualization" amplitude-song-index="0" id="song-time-visualization-large"></div>
                
                <span class="time-duration">
                  <span class="amplitude-duration-minutes" amplitude-song-index="0">0</span>:<span class="amplitude-duration-seconds" amplitude-song-index="0">00</span>
                </span>
              </div>
            </div>
            <!-- End Small Player Full Bottom -->
          </div>
          </div>
          <!-- End Small Player -->
          <hr>
        <!-- redes sociales -->
          <!-- Parte de Facebook -->
            <div class="fb-page" data-href="https://www.facebook.com/oyefm93.1" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/oyefm93.1">
                  <a href="https://www.facebook.com/oyefm93.1">
                    <i class="fa fa-spinner fa-spin"></i>
                  </a>
                </blockquote>
              </div>
            </div>  
          <!-- Fin de la parte de Facebook-->
          <hr>
          <!-- Parte de Twitter -->
          <a class="twitter-timeline" href="https://twitter.com/oyefm931" data-widget-id="695267215843672070">
            <i class="fa fa-spinner fa-spin"></i>
          </a>
          <!-- Fin del Twitter -->  
      </div>
    </div>
    
  </div>
  
  <!-- Inicialización del Footer -->
  <footer class="footer-1 mode-1" id="footer">
    <div class="vc_footer-links">
      <div class="wrapper">
        <div class="container">
          <div class="vc_footer-line"> 
          </div>
          <div class="row">
            <!-- Inicialización de Acerca de la empresa -->
            <div id="vc_footer-about" class="footer-widget widget col-md-2">
              <div class="vc_about">
                <h3 align="center"> Acerca de la Empresa</h3>
                <p> Oye lo que te gusta. </p>
                <div class="vc_address">
                  <table>
                    <tbody>
                        <tr>
                            <td class="icon"><i class="fa fa-map-marker"> </i></td>
                            <td><address>
                             Ibarra-Imbabura <br>
                             Jaime Rivadeneira<br>
                              </address></td>
                        </tr>
                        <tr>
                            <td class="icon"><i class="fa fa-phone"> </i></td>
                            <td> 099 869 3535 </td>
                        </tr>
                        <tr>
                            <td class="icon"><i class="fa fa-envelope"> </i></td>
                            <td> info@oyefm.com </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <div class="vc_social-share vc_tight"> 
                    <a title="Twitter" class="twitter" href="https://twitter.com/oyefm931"  target="_blank"> 
                      <i class="fa fa-twitter"></i> 
                    </a> 
                    <a title="Facebook" class="facebook" href="https://www.facebook.com/OYEfmImbabura"  target="_blank"> 
                      <i class="fa fa-facebook"></i> 
                    </a> 
                    <a title="Youtube" class="youtube" href="https://www.youtube.com/channel/UCd3nO-R6N8za5NQZnvsizvA"  target="_blank"> 
                      <i class=" fa fa-youtube-play"></i> 
                    </a> 
                    <a title="Instagram" class="instagram" href="https://www.instagram.com/oyefm/"  target="_blank"> <i class="fa fa-instagram"></i> </a> 
                </div>
              </div>
            </div>
            <!-- Inicialización Patrocinadores -->
            <div id="vc_footer-gallery" class="footer-widget widget col-md-5">
               <div class="vc_gallery">
                <h3> Patrocinado por: </h3>
                <br>
                  <article class="blog-row clearfix">
                         <div class="blog-left">
                            <div> <a href="#" class="vc_preview"> <img alt="example image" src="img/blog/logo_tuenti2.jpg"  /> </a> </div>
                          </div>
                  </article>
               </div>    
            </div>
            <!-- Inicialización Segmentos Especiales -->
             <div class="footer-widget widget col-md-3">
                <div>
                  <h3> Segmentos Especiales</h3>
                    <div class="tab-pane sidebar-widget" id="posts-tab">
                      <div class="vc_blog-list">
                        <article class="blog-row clearfix">
                          <div class="blog-left">
                             <div> <a href="#" class="vc_preview"> <img alt="example image" src="img/client-logo/conceptual01.png"  /> </a> </div>
                          </div>
                          <div class="blog-right clearfix">
                            <h3> <a href="#">Primer Segmento </a> </h3>                                 
                          </div>
                        </article>
                        <article class="blog-row clearfix">
                          <div class="blog-left">
                            <div> <a href="#" class="vc_preview"> <img alt="example image" src="img/client-logo/Solo-Logo_Tuenti_nuevo.png"  /> </a> </div>
                          </div>
                          <div class="blog-right">
                            <h3> <a href="#"> Segundo Segmento </a> </h3>
                          </div>
                        </article>
                        <article class="blog-row">
                          <div class="blog-left">
                            <div> <a href="#" class="vc_preview"> <img alt="example image" src="img/client-logo/Solo-logo-nextbook.png"  /> </a> </div>
                          </div>
                          <div class="blog-right">
                            <h3> <a href="#"> Tercer Segmento </a> </h3>
                          </div>
                        </article>
                        </div>
                    </div>
                </div>            
             </div>
            <!-- Inicialización de Megusta face -->
             <div class="footer-widget widget col-md-2">                
                <h3> Me Gusta </h3>
                <div>
                     <div class="fb-like" data-href="http://oyefm.com/imbabura/" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true">
                     </div>
                </div>
                <br>
                <div> 
                <a href="https://twitter.com/oyefm" class="twitter-follow-button" data-show-count="false" data-lang="es" data-size="large">Seguir a @oyefm</a>
                </div>
             </div>
         </div>
          <!-- fin del row del footer-->
        </div>
        <!-- fin del container -->        
      </div>
      <!-- fin del wrapper -->      
    </div>
    <!-- fin del vc_footer-links -->  
      
    <div class="vc_bottom">
      <div class="wrapper">
        <div class="container">
          <div class="vc_footer-line"> </div>
          <div class="bg">
            <div class="row">
              <div class=" col-sm-12 col-md-4">
                <div class="copyright pull-left">
                  <h5> Copyright &copy;2016 Oyefm  </h5>
                </div>
              </div>
              <div class=" col-sm-12 col-md-8 pie_pg">
                <div class="menu pull-right"> 
                  <a href="#/corporativo">
                    <i class="fa fa-globe"></i> Corporativo 
                  </a>
                  <a href="#/tarifas"> <i class="fa fa-credit-card"></i> Tarífas </a>
                  <a href="#/programacion"> <i class="fa fa-bars"></i></i> Programación </a>
                  <a href="#podcast"> <i class="fa fa-music"></i> Podcast </a>
                  <a href="#noticias"> <i class="fa fa-comment-o"></i> Noticias </a>
                  <a href="#contactos"> <i class="fa fa-envelope"></i> Contactos </a>              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


<!-- particles.js container -->

<!-- Fin del Footer -->

  <!-- Javascript =============================================== --> 
  <!-- Situado al final del documento para que las páginas se cargen más rápido --> 
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="js/tinyscrollbar.js"></script> 
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/caroufredsel.js"></script>
  <!-- slider -->
  <script type="text/javascript" src="js/jquery.flexslider.js"></script>

  <!-- scripts -->
  <script src="js/particle/particles.min.js"></script>
  <script src="js/particle/js/app.js"></script>

  <!-- stats.js -->
  <script src="js/particle/js/lib/stats.js"></script>

  
  
  <script type="text/javascript" src="plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 
  <!-- <script type="text/javascript" src="plugins/isotope-plugin/js/jquery.isotope.min.js"></script> -->
  <!-- reproductor mp3 player -->
  <script src="js/player/js/amplitude.min.js"></script>

  <script type="text/javascript" src="js/theme.js"></script>
  <script type="text/javascript" src="js/custom/custom.js"></script>

  <!-- Scripts específicos/Página poner aquí -->
  <!-- <script src="js/specific/quick-contact.js"  type="text/javascript"></script> -->

  <!-- config audio player -->
  <script src="js/player/configplayer.js"></script>
  
</body>

</html>
