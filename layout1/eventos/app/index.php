<?php
include ("conect.php");
include ("autenticacion.php");

if(isset($_GET['link'])){
    $link=$_GET['link'];
    if ($link == '1'){
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
if(isset($_GET['link2'])){
   
    $link=$_GET['link2'];
    if ($link == '2'){
        $_SESSION["lockscreen_eventos"]= "SI";
        header("Location: lockscreen.php");
        exit();
    }
}
if ($_SESSION["lockscreen_eventos"] == "SI") {
    //si no existe, va a la página de autenticacion
    header("Location: lockscreen.php");
    //salimos de este script
    exit();
}
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.3, maximum-scale=1.0">
        <meta name="description" content="admin-themes-lab">
        <meta name="author" content="themes-lab">
        <link rel="shortcut icon" href="../../../assets/global/images/favicon.png" type="image/png">
        <title>Teatro Sanchez Aguilar</title>
        <link href="../../../assets/global/css/style.css" rel="stylesheet">
        <link href="../../../assets/global/css/theme.css" rel="stylesheet">
        <link href="../../../assets/global/css/ui.css" rel="stylesheet">
        <link href="../../../assets/global/css/select/multi-select.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/slick/slick.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/icheck/skins/all.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/bootstrap-tags-input/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/rateit/rateit.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/colorpicker/spectrum.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/step-form-wizard/css/step-form-wizard.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/step-form-wizard/plugins/parsley/parsley.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/ion-slider/style.min.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet" />
        
        <link href="../../../assets/global/plugins/cke-editor/skins/bootstrapck/editor.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/summernote/summernote.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/cropper/cropper.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/magnific/magnific-popup.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/hover-effects/hover-effects.min.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/prettify/prettify.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/jstree/dist/themes/default/style.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/datatables/dataTables.min.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/input-text/style.min.css" rel="stylesheet" />
        <link href="../../../assets/global/plugins/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet" />
        <!--BOLETO STYLE -->    

        
        <link rel="stylesheet" href="../../../assets/boleto/css/animate.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/flaticon.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/magnific-popup.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/odometer.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/nice-select.css">
        <link rel="stylesheet" href="../../../assets/boleto/css/main.css">
        <!-- BEGIN ANGULARJS STYLE -->
        <link href="../css/angular-theme.css" rel="stylesheet">
        <!-- END ANGULARJS STYLE -->
        <!-- BEGIN LAYOUT STYLE -->
        <link href="../../../assets/admin/layout1/css/layout.css" rel="stylesheet">
        <!-- END LAYOUT STYLE -->
         <!--CRONOMETRO STYLE -->    
        <link rel="stylesheet" href="../../../assets/cronometro/css/jquery.countdown.timer.css" type="text/css" />
        <script src="../../../assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body ng-app="newApp" class="fixed-topbar fixed-sidebar theme-sdtl color-default" ng-controller="mainCtrl">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- BEGIN PAGE SPINNER -->
        <div ng-spinner-loader class="page-spinner-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
        <!-- END PAGE SPINNER -->

        <section>
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar">
                <!--div class="logopanel">
                    <h1>
                        <a href="#/"></a>
                    </h1>
                </div-->
                <div class="sidebar-inner">
                    <div class="sidebar-top">
                        <!--form action="search-result.html" method="post" class="searchform" id="search-results">
                            <input type="text" class="form-control" name="keyword" placeholder="Search...">
                        </form-->
                        <div class="userlogged clearfix">
                            <i class="icon icons-faces-users-01"></i>
                            <div class="user-details">
                                <h4><?php echo $_SESSION["nombres_eventos"]; ?></h4>
                                <div class="dropdown user-login">
                                    <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                                    <i class="online"></i><span><?php echo $_SESSION["usuario_eventos"]; ?></span><i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-title">
                        MENU
                        <div class="pull-right menu-settings">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                          <i class="icon-settings"></i>
                          </a>
                          <ul class="dropdown-menu">
                            <!--li><a href="#" id="reorder-menu" class="reorder-menu">Editar Menu</a></li-->
                            <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Ocultar usuario</a></li>
                          </ul>
                        </div>
                      </div>
                    <ul class="nav nav-sidebar">
                        <li  ng-class="{ active  : isActive('/reporte-eventos-venta')}"><a href="#reporte-eventos-venta"> Reporte Evento Ventas</a></li>
                    </ul>
                    <!-- SIDEBAR WIDGET FOLDERS -->
                    
                    <div class="sidebar-footer clearfix">
                        
                        <a class="pull-left footer-settings builder-toggle" data-target="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
                        <i class="icon-settings"></i>
                        </a>
                        <a class="pull-left toggle_fullscreen" data-target="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
                        <i class="icon-size-fullscreen"></i>
                        </a>
                        <a href="?link2=2" name="link2" id="link2" class="pull-left"  data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
                        <i class="icon-lock"></i>
                        </a>
                        <a href="?link=1" name="link1" id="link1" class="pull-left btn-effect" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
                        <i class="icon-power"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <div class="main-content">
                <!-- BEGIN TOPBAR -->
                <div class="topbar">
                    <div class="header-left">
                        <div class="topnav">
                            <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                            <ul class="nav nav-icons">
                                <li><a href="#" class="toggle-sidebar-top"><span class="icon-user-following"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="header-menu nav navbar-nav">
                            <!-- BEGIN USER DROPDOWN -->
                            <li class="dropdown" id="language-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-globe"></i>
                                <span data-translate="Language">Idioma</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a data-target="#" data-lang="es"><img src="../../../assets/global/images/flags/spanish.png" alt="flag-english"> <span>Español</span></a>
                                    </li>

                                </ul>
                            </li>
                            <!-- END USER DROPDOWN -->
                            <!-- BEGIN NOTIFICATION DROPDOWN >
                            <li class="dropdown" id="notifications-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-danger badge-header">6</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header clearfix">
                                        <p class="pull-left">12 Pending Notifications</p>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list withScroll" data-height="220">
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                                                Steve have rated your photo
                                                <span class="dropdown-time">Just now</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                                                John added you to his favs
                                                <span class="dropdown-time">15 mins</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-file-text p-r-10 f-18"></i>
                                                New document available
                                                <span class="dropdown-time">22 mins</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                                New picture added
                                                <span class="dropdown-time">40 mins</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                                                Meeting in 1 hour
                                                <span class="dropdown-time">1 hour</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-bell p-r-10 f-18"></i>
                                                Server 5 overloaded
                                                <span class="dropdown-time">2 hours</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                                                Bill comment your post
                                                <span class="dropdown-time">3 hours</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                                New picture added
                                                <span class="dropdown-time">2 days</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-footer clearfix">
                                        <a data-target="#" class="pull-left">See all notifications</a>
                                        <a data-target="#" class="pull-right">
                                        <i class="icon-settings"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li-->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN MESSAGES DROPDOWN -->
                            <!--li class="dropdown" id="messages-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-paper-plane"></i>
                                <span class="badge badge-primary badge-header">
                                8
                                </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header clearfix">
                                        <p class="pull-left">
                                            You have 8 Messages
                                        </p>
                                    </li>
                                    <li class="dropdown-body">
                                        <ul class="dropdown-menu-list withScroll" data-height="220">
                                            <li class="clearfix">
                                                <span class="pull-left p-r-5">
                                                <img src="../../../assets/global/images/avatars/avatar3.png" alt="avatar 3">
                                                </span>
                                                <div class="clearfix">
                                                    <div>
                                                        <strong>Alexa Johnson</strong>
                                                        <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                                                        </small>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <span class="pull-left p-r-5">
                                                <img src="../../../assets/global/images/avatars/avatar4.png" alt="avatar 4">
                                                </span>
                                                <div class="clearfix">
                                                    <div>
                                                        <strong>John Smith</strong>
                                                        <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                                                        </small>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <span class="pull-left p-r-5">
                                                <img src="../../../assets/global/images/avatars/avatar5.png" alt="avatar 5">
                                                </span>
                                                <div class="clearfix">
                                                    <div>
                                                        <strong>Bobby Brown</strong>
                                                        <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                                                        </small>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <span class="pull-left p-r-5">
                                                <img src="../../../assets/global/images/avatars/avatar6.png" alt="avatar 6">
                                                </span>
                                                <div class="clearfix">
                                                    <div>
                                                        <strong>James Miller</strong>
                                                        <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                                                        </small>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-footer clearfix">
                                        <a href="mailbox.html" class="pull-left">See all messages</a>
                                        <a href="#" class="pull-right">
                                        <i class="icon-settings"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li-->
                            <!-- END MESSAGES DROPDOWN -->
                            <!-- BEGIN USER DROPDOWN -->
                            <li class="dropdown" id="user-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="../../../assets/global/images/avatars/avatar1.png" alt="user image">
                                <span class="username"><?php echo $_SESSION["nombres_eventos"]; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a data-target="#"><i class="icon-user"></i><span>Perfil</span></a>
                                    </li>
                                    <li>
                                    <a href="?link=1" data-target="#" data-original-title="Logout"><i class="icon-logout"></i><span>Salir</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER DROPDOWN -->
                            <!-- CHAT BAR ICON -->
                            <!--li id="quickview-toggle"><a href="#"><i class="icon-bubbles"></i></a></li-->
                        </ul>
                    </div>
                    <!-- header-right -->
                </div>
                <!-- END TOPBAR -->
                <!-- BEGIN PAGE CONTENT -->
                <div ng-view class="at-view-slide-in-left page-content" ng-view-class=" page-wizard : /forms-wizard , page-thin : / , page-contact : /pages-contact, 
                    page-profil : /user-profile, page-app : /user-profile" >
                </div>
                <!-- END PAGE CONTENT -->
            </div>
            <!-- END MAIN CONTENT -->
            <!-- BEGIN BUILDER -->
            <div class="builder hidden-sm hidden-xs" id="builder">
                <a class="builder-toggle"><i class="icon-wrench"></i></a>
                <div class="inner">
                  <div class="builder-container">
                    <a href="#" class="btn btn-sm btn-default" id="reset-style">Resetear Ajustes</a>
                    <h4>Editar Estilos</h4>
                    <h3 class="ajustes">Barra Lateral</h3>
                    <div class="layout-option layout-option-sidebar-fixed">
                      <span> Fija</span>
                      <label class="switch pull-right">
                      <input data-layout="sidebar" id="switch-sidebar" type="checkbox" class="switch-input" checked>
                      <span class="switch-label" data-on="On" data-off="Off"></span>
                      <span class="switch-handle"></span>
                      </label>
                    </div>
                    <div class="layout-option layout-option-sidebar-hover">
                      <span> Oculta</span>
                      <label class="switch pull-right">
                      <input data-layout="sidebar-hover" id="switch-sidebar-hover" type="checkbox" class="switch-input">
                      <span class="switch-label" data-on="On" data-off="Off"></span>
                      <span class="switch-handle"></span>
                      </label>
                    </div>
                    <h3 class="ajustes">Submenu</h3>
                    <div class="layout-option layout-option-submenu-hover">
                      <span>Desplegable</span>
                      <label class="switch pull-right">
                      <input data-layout="submenu-hover" id="switch-submenu-hover" type="checkbox" class="switch-input">
                      <span class="switch-label" data-on="On" data-off="Off"></span>
                      <span class="switch-handle"></span>
                      </label>
                    </div>
                    <h3 class="ajustes">Barra Superior</h3>
                    <div class="layout-option layout-option-fixed-topbar">
                      <span>Fija</span>
                      <label class="switch pull-right">
                      <input data-layout="topbar" id="switch-topbar" type="checkbox" class="switch-input" checked>
                      <span class="switch-label" data-on="On" data-off="Off"></span>
                      <span class="switch-handle"></span>
                      </label>
                    </div>
                    <h4 class="border-top">Color</h4>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="theme-color bg-dark" data-main="default" data-color="#2B2E33"></div>
                        <div class="theme-color background-primary" data-main="primary" data-color="#319DB5"></div>
                        <div class="theme-color bg-red" data-main="red" data-color="#C75757"></div>
                        <div class="theme-color bg-green" data-main="green" data-color="#1DA079"></div>
                        <div class="theme-color bg-orange" data-main="orange" data-color="#D28857"></div>
                        <div class="theme-color bg-purple" data-main="purple" data-color="#B179D7"></div>
                        <div class="theme-color bg-blue" data-main="blue" data-color="#4A89DC"></div>
                      </div>
                    </div>
                    <h4 class="border-top">Estilo</h4>
                    <div class="row row-sm">
                      <div class="col-xs-6">
                        <div class="theme clearfix sdtl" data-theme="sdtl">
                          <div class="header theme-left"></div>
                          <div class="header theme-right-light"></div>
                          <div class="theme-sidebar-dark"></div>
                          <div class="bg-light"></div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="theme clearfix sltd" data-theme="sltd">
                          <div class="header theme-left"></div>
                          <div class="header theme-right-dark"></div>
                          <div class="theme-sidebar-light"></div>
                          <div class="bg-light"></div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="theme clearfix sdtd" data-theme="sdtd">
                          <div class="header theme-left"></div>
                          <div class="header theme-right-dark"></div>
                          <div class="theme-sidebar-dark"></div>
                          <div class="bg-light"></div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="theme clearfix sltl" data-theme="sltl">
                          <div class="header theme-left"></div>
                          <div class="header theme-right-light"></div>
                          <div class="theme-sidebar-light"></div>
                          <div class="bg-light"></div>
                        </div>
                      </div>
                    </div>
                    <h4 class="border-top">Fondo</h4>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="bg-color bg-clean" data-bg="clean" data-color="#F8F8F8"></div>
                        <div class="bg-color bg-lighter" data-bg="lighter" data-color="#EFEFEF"></div>
                        <div class="bg-color bg-light-default" data-bg="light-default" data-color="#E9E9E9"></div>
                        <div class="bg-color bg-light-blue" data-bg="light-blue" data-color="#E2EBEF"></div>
                        <div class="bg-color bg-light-purple" data-bg="light-purple" data-color="#E9ECF5"></div>
                        <div class="bg-color bg-light-dark" data-bg="light-dark" data-color="#DCE1E4"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- END BUILDER -->
        </section>
        <!-- BEGIN QUICKVIEW SIDEBAR -->
        <!--div id="quickview-sidebar">
            <div class="quickview-header">
                <ul class="nav nav-tabs">
                    <li><a href="#notes" data-toggle="tab">Notas</a></li>
                </ul>
            </div>
            <div class="quickview">
                <div class="tab-content">
                    <div class="tab-pane fade" id="notes">
                        <div class="list-notes current withScroll">
                            <div class="notes ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="add-note">
                                            <i class="fa fa-plus"></i>Agregar Nota
                                        </div>
                                    </div>
                                </div>
                                <div id="notes-list">
                                    <div class="note-item media current fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Reset my account password</p>
                                            </div>
                                            <p class="note-desc hidden">Break security reasons.</p>
                                            <p><small>Tuesday 6 May, 3:52 pm</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Call John</p>
                                            </div>
                                            <p class="note-desc hidden">He have my laptop!</p>
                                            <p><small>Thursday 8 May, 2:28 pm</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Buy a car</p>
                                            </div>
                                            <p class="note-desc hidden">I'm done with the bus</p>
                                            <p><small>Monday 12 May, 3:43 am</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Don't forget my notes</p>
                                            </div>
                                            <p class="note-desc hidden">I have to read them...</p>
                                            <p><small>Wednesday 5 May, 6:15 pm</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media current fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Reset my account password</p>
                                            </div>
                                            <p class="note-desc hidden">Break security reasons.</p>
                                            <p><small>Tuesday 6 May, 3:52 pm</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Call John</p>
                                            </div>
                                            <p class="note-desc hidden">He have my laptop!</p>
                                            <p><small>Thursday 8 May, 2:28 pm</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Buy a car</p>
                                            </div>
                                            <p class="note-desc hidden">I'm done with the bus</p>
                                            <p><small>Monday 12 May, 3:43 am</small></p>
                                        </div>
                                    </div>
                                    <div class="note-item media fade in">
                                        <button class="close">×</button>
                                        <div>
                                            <div>
                                                <p class="note-name">Don't forget my notes</p>
                                            </div>
                                            <p class="note-desc hidden">I have to read them...</p>
                                            <p><small>Wednesday 5 May, 6:15 pm</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail-note note-hidden-sm">
                            <div class="note-header clearfix">
                                <div class="note-back">
                                    <i class="icon-action-undo"></i>
                                </div>
                                <div class="note-edit">Editar Nota</div>
                            </div>
                            <div id="note-detail">
                                <div class="note-write">
                                    <textarea class="form-control" placeholder="Escribir tu nota aqui"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <div class="loader-overlay">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <!-- BEGIN ANGULARJS SCRIPTS -->
        <script src="../plugins/angular/angular.js"></script>
        <script src="../plugins/json3/lib/json3.js"></script>
        <script src="../plugins/angular-resource/angular-resource.js"></script>
        <script src="../plugins/angular-cookies/angular-cookies.js"></script>
        <script src="../plugins/angular-sanitize/angular-sanitize.js"></script>
        <script src="../plugins/angular-animate/angular-animate.js"></script>
        <script src="../plugins/angular-touch/angular-touch.js"></script>
        <script src="../plugins/angular-route/angular-route.js"></script>
        <script src="../plugins/angular-bootstrap/ui-bootstrap-tpls-0.12.1.js"></script>
        <script src="app.js"></script>
        <script src="../directives/ngViewClass.js"></script>
        <!-- END ANGULARJS SCRIPTS -->

        <script src="../../../assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../../assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
        <script src="../../../assets/global/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../../../assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="../../../assets/global/plugins/tether/js/tether.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../assets/global/plugins/appear/jquery.appear.js"></script>
        <script src="../../../assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script>
        <script src="../../../assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script>
        <script src="../../../assets/global/plugins/bootbox/bootbox.min.js"></script>
        <script src="../../../assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
        <script src="../../../assets/global/plugins/charts-sparkline/sparkline.min.js"></script>
        <script src="../../../assets/global/plugins/select2/dist/js/select2.full.min.js"></script> <!-- Select Inputs -->                    
        <script src="../../../assets/global/plugins/icheck/icheck.min.js"></script>
        <script src="../../../assets/global/plugins/backstretch/backstretch.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="../../../assets/global/js/sidebar_hover.js"></script>
        <script src="../../../assets/global/js/widgets/notes.js"></script>
        <script src="../../../assets/global/js/pages/search.js"></script>
        <script src="../../../assets/global/plugins/quicksearch/quicksearch.js"></script>
        <script src="../../../assets/global/plugins/slick/slick.js"></script> 
        <script src="../../../assets/global/plugins/icheck/icheck.js"></script>
        <script src="../../../assets/global/plugins/switchery/switchery.js"></script>
        
        <script src="../../../assets/global/plugins/timepicker/jquery-ui-timepicker-addon.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../../../assets/global/plugins/colorpicker/spectrum.js"></script>
        <script src="../../../assets/global/plugins/touchspin/jquery.bootstrap-touchspin.js"></script>
        <script src="../../../assets/global/plugins/step-form-wizard/js/step-form-wizard.js"></script>
        <script src="../../../assets/global/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script>
        <script src="../../../assets/global/plugins/jquery-validation/jquery.validate.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-slider/bootstrap-slider.js"></script>
        <script src="../../../assets/global/plugins/ion-slider/ion.rangeSlider.js"></script>
        <script src="../../../assets/global/plugins/bootstrap/js/jasny-bootstrap.js"></script>
        <script src="../../../assets/global/plugins/isotope/isotope.pkgd.min.js"></script>
        <script src="../../../assets/global/plugins/magnific/jquery.magnific-popup.js"></script>
        <script src='../../../assets/global/plugins/fullcalendar/lib/moment.min.js'></script>
        <script src="../../../assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="../../../assets/global/plugins/fullcalendar/locale/es.js"></script>
        <script src="../../../assets/global/plugins/countup/countUp.js"></script>
        
        <script src="../../../assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="../../../assets/global/plugins/jstree/jstree.js"></script>
        <script src="../../../assets/global/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../../assets/global/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="../../../assets/global/plugins/typed/typed.js"></script>
        <script src="../../../assets/global/plugins/cke-editor/ckeditor.js"></script>
        <script src="../../../assets/global/plugins/cke-editor/config.js"></script>
        <script src="../../../assets/global/plugins/cke-editor/styles.js"></script>
        <script src="../../../assets/global/plugins/cke-editor/adapters/jquery.js"></script>
        <script src="../../../assets/global/plugins/cke-editor/lang/en.js"></script>
        <script src="../../../assets/global/plugins/cke-editor/skins/bootstrapck/skin.js"></script>
        <script src="../../../assets/global/plugins/summernote/summernote.js"></script>
        <script src="../../../assets/global/plugins/prettify/prettify.js"></script>
        <script src="../../../assets/global/plugins/dropzone/dropzone.min.js"></script>
        <script src="../../../assets/global/plugins/idle-timeout/jquery.idletimeout.min.js"></script>
        <script src="../../../assets/global/plugins/idle-timeout/jquery.idletimer.min.js"></script>
        <script src="../../../assets/global/plugins/cropper/cropper.js"></script>
        <script src="../../../assets/global/plugins/noty/jquery.noty.packaged.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script>
        <script src="../../../assets/global/plugins/multidatepicker/multidatespicker.min.js"></script>
        <script src="../../../assets/global/js/widgets/todo_list.js"></script>
        <script src="../../../assets/global/plugins/metrojs/metrojs.min.js"></script>
        <script src="../../../assets/global/plugins/charts-chartjs/Chart.min.js"></script>
        <script src="../../../assets/global/plugins/charts-highstock/js/highstock.js"></script>
        <script src="../../../assets/global/plugins/charts-highstock/js/modules/exporting.js"></script>
        <script src="../../../assets/global/plugins/skycons/skycons.min.js"></script>
        <script src="../../../assets/global/plugins/simple-weather/jquery.simpleWeather.js"></script> 
        <script src="../../../assets/global/plugins/bootstrap-tags-input/bootstrap-tagsinput.js"></script>
        <script src="../../../assets/global/plugins/rateit/jquery.rateit.min.js"></script>
        <script src="../../../assets/global/plugins/charts-highstock/js/highcharts-more.js"></script>
        <script src="../../../assets/global/plugins/charts-highstock/js/modules/exporting.js"></script>
        <script src="../../../assets/global/plugins/autosize/autosize.min.js"></script>
       
        <!-- BEGIN CUSTOM ANGULARJS SCRIPTS -->
        <script src="../js/pages/dashboard.js"></script>
        <script src="../js/pages/charts.js"></script>
        <script src="../js/pages/charts_finance.js"></script>
        <script src="../js/pages/layouts_api.js"></script>
        <script src="../js/builder.js"></script>
        <script src="../js/application.js"></script>
        <script src="../js/plugins.js"></script> 
        <script src="../js/quickview.js"></script>
        <script src="dashboard/dashboardCtrl.js"></script>
        <script src="mainCtrl.js"></script>

        <script src="tables/usuarios/usuariosCtrl.js"></script>
        <script src="tables/usuarios/permisosCtrl.js"></script>
        <script src="tables/mantenimiento/mantenimientoCtrl.js"></script>
        <script src="tables/imagenes/imagenesCtrl.js"></script>
        <script src="tables/evento/eventoCtrl.js"></script>
        <script src="tables/procesos/bloqueosCtrl.js"></script>
        <script src="tables/procesos/promocionesCtrl.js"></script>
        <script src="tables/procesos/procesosCtrl.js"></script>
        <script src="tables/reportes/reportesCtrl.js"></script>
        <script src="tables/web/webCtrl.js"></script>
        <script src="tables/facturacion/facturacionCtrl.js"></script>
        <script src="tables/correos/correosCtrl.js"></script>
        <!-- BOLETO SCRIPS -->
        <script src="../../../assets/boleto/js/modernizr-3.6.0.min.js"></script>
        <script src="../../../assets/boleto/js/plugins.js"></script>
        <script src="../../../assets/boleto/js/isotope.pkgd.min.js"></script>
        <script src="../../../assets/boleto/js/magnific-popup.min.js"></script>
        <script src="../../../assets/boleto/js/owl.carousel.min.js"></script>
        <script src="../../../assets/boleto/js/wow.min.js"></script>
        <script src="../../../assets/boleto/js/countdown.min.js"></script>
        <script src="../../../assets/boleto/js/odometer.min.js"></script>
        <script src="../../../assets/boleto/js/viewport.jquery.js"></script>
        <script src="../../../assets/boleto/js/nice-select.js"></script>
        <script src="../../../assets/boleto/js/main.js"></script>

        <script src="../../../assets/lib-js-src-thrift.js"   ></script>
        <script src="../../../assets/CRUDServer.js"      ></script>
        <script src="../../../assets/php_types.js"    ></script>
        <!-- CRONOMETRO -->
        <script src="../../../assets/cronometro/js/jquery.timeout.interval.idle.js" type="text/javascript"></script>
        <script src="../../../assets/cronometro/js/jquery.countdown.counter.js" type="text/javascript"></script>

        <script src="user/profile/profileCtrl.js"></script>
        <script src="user/sessionTimeout/sessionTimeoutCtrl.js"></script>
        
        <!-- END CUSTOM ANGULARJS SCRIPTS -->
    </body>
</html>
