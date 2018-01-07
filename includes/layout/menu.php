<?php
    $consuldatospersonales = paraTodos::arrayConsulta("*", "persona", "per_cedula=$_SESSION[ci]");
    foreach($consuldatospersonales as $datospersonales){
        $nombre_perfil = $datospersonales[per_nombres];
        $apellido_perfil = $datospersonales[per_apellidos];
    }
?>
    <!-- START LEFT SIDEBAR NAV-->
    <aside id="left-sidebar-nav" class="nav-expanded nav-collapsible">
        <div class="brand-sidebar">
            <h1 class="logo-wrapper">
                <a href="control.php" class="brand-logo darken-1">
                <img src="<?php echo $ruta_base;?>/assets/img/logo/edulab-logo.png" alt="edulab logo">
                <span class="logo-text hide-on-med-and-down">EduLab</span>
              </a>
                <a href="#" class="navbar-toggler">
                    <i class="material-icons">radio_button_checked</i>
                </a>
            </h1>
        </div>
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="no-padding">
                <ul class="collapsible" data-collapsible="accordion">
                    <?php
                    $menu = new Menu();
                    $menu->menuprinc(1);
                ?>
                </ul>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
            <i class="material-icons">menu</i>
        </a>
    </aside>
    <!-- END LEFT SIDEBAR NAV-->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <div id="ventanaVer"></div>
            <div id="ventanaCurso"></div>
            <main id="verContenido"></main>