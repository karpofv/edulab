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
            <main id="verContenido">
<?php
                    if($_SESSION['usuario_perfil']==3){
     $cursos_comp = 0;
    $consul_datos_per = paraTodos::arrayConsulta("*", "persona", "per_codigo=$_SESSION[codido_persona]");
    foreach($consul_datos_per as $post){
        $nombres = $post['per_nombres'];
        $apellidos = $post['per_apellidos'];
        $oficio = $post['per_oficio'];
        $me = $post['per_about'];
        $telefono = $post['per_telefono'];
        $correo = $post['per_correo'];
        $fecnac = paraTodos::convertDate($post['per_fecnac']);
    }
?>
<div id="profile-page" class="section">
    <!-- profile-page-header -->
    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?php echo $ruta_base?>/assets/img/23.png" alt="user background">
        </div>
        <figure class="card-profile-image">
            <img src="<?php echo $ruta_base;?>/assets/img/avatar/<?php echo $FOTO;?>" alt="profile image" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan gradient-shadow">
        </figure>
        <div class="card-content">
            <div class="row pt-2">
                <div class="col s12 m3 offset-m2">
                    <h4 class="card-title grey-text text-darken-4"><?php echo $apellidos." ".$nombres;?></h4>
                    <p class="medium-small grey-text"><?php echo $oficio;?></p>
                </div>
                <div class="col s12 m2 center-align">
                </div>
                <div class="col s12 m2 center-align">
                </div>
                <div class="col s12 m2 center-align">
                </div>
                <div class="col s12 m1 right-align">
                    <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
                        <i class="material-icons">perm_identity</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-reveal">
            <p>
                <span class="card-title grey-text text-darken-4"><?php echo $apellidos." ".$nombres;?>
                      <i class="material-icons right">close</i>
                    </span>
                <span>
                      <i class="material-icons cyan-text text-darken-2">perm_identity</i><?php echo $oficio;?></span>
            </p>
            <p><?php echo $me;?></p>
            <p>
                <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i><?php echo $telefono;?></p>
            <p>
                <i class="material-icons cyan-text text-darken-2">email</i><?php echo $correo;?></p>
            <p>
                <i class="material-icons cyan-text text-darken-2">cake</i><?php echo $fecnac?></p>
        </div>
    </div>
    <!--/ profile-page-header -->
    <!-- profile-page-content -->
    <div id="profile-page-content" class="row">
        <!-- profile-page-sidebar-->
        <div id="profile-page-sidebar" class="col s12 m4">
            <!-- Profile About  -->
            <div class="card cyan">
                <div class="card-content white-text">
                    <span class="card-title">Este soy YO!</span>
                    <p><?php echo $me;?></p>
                </div>
            </div>
            <!-- Profile About  -->
            <!-- Profile About Details  -->
            <ul id="profile-page-about-details" class="collection z-depth-1">
<?php
    $consul_cursos = paraTodos::arrayConsulta("*", "curso, curso_inscrito", "cur_codigo=curi_curcodigo and curi_percodigo=$_SESSION[codido_persona]");
    foreach($consul_cursos as $curso){
        $porcenc = 0;
        $porcenob = 0;
        $totalobjvist = 0;
        $totalclavist = 0;
        /*Se buscan las clases que posee el curso*/
        $consul_clases = paraTodos::arrayConsulta("*", "curso_clase", "curc_curcodigo=$curso[cur_codigo]");
        foreach($consul_clases as $clases){
            $totalclases=$totalclases+1;            
            /*Se buscan los objetivos de la clase*/
            $consul_objetivos = paraTodos::arrayConsulta("*", "objetivos", "ob_curccodigo=$clases[curc_codigo]");
            foreach($consul_objetivos as $bjetivos){
                $totalobj=$totalobj+1;
                /*Se obtiene el total de contenidos para el porcentaje*/
                $totalcont = paraTodos::arrayConsultanum("*", "contenido", "cont_obcodigo=$bjetivos[ob_codigo]");
                /*Se obtiene el contenido visto por el usuario*/
                $totalcontvis = paraTodos::arrayConsultanum("*", "avance_objetivos", "avano_objcodigo=$bjetivos[ob_codigo] and avano_percodigo=$_SESSION[codido_persona]");                
                $porcen = ($totalcontvis*100)/$totalcont;
                if($porcen==100){
                    $totalobjvist=$totalobjvist+1;
                }
            }
            $porcenob = ($totalobjvist*100)/$totalobj;
            if($porcenob==100){
                $totalclavist=$totalclavist+1;
            }            
        }
        $porcenc = ($totalclavist*100)/$totalclases;        
        $mensaje="";
        /*Se verifica si el usuario ya esta en el curso*/
        $inscrito = paraTodos::arrayConsultanum("*", "curso_inscrito", "curi_percodigo=$_SESSION[codido_persona] and curi_curcodigo=$curso[cur_codigo]");
        if($inscrito>0){
            $inscrito=0;
            $mensaje = "Proseguir";
        } else {
            $inscrito=1;
            $mensaje = "Iniciar";
        }
        if($porcenob==100){
            $mensaje = "Repasar";
        }
?>
                <li class="collection-item">
                    <div class="row">
                        <div class="col s5">
                            <i class="material-icons left">card_travel</i> <?php echo $curso[cur_descripcion]?></div>
                        <div class="col s7 right-align"><?php echo $porcenc;?>%</div>
                    </div>
                </li>
<?php
    }
?>
            </ul>
            <!--/ Profile About Details  -->
        </div>
        <!-- profile-page-sidebar-->
        <!-- profile-page-wall -->
        <div id="profile-page-wall" class="col s12 m8">
            <!-- profile-page-wall-share -->
            <div id="profile-page-wall-share" class="row">
                <div class="col s12">
                    <ul class="tabs tab-profile z-depth-1 deep-orange accent-2">
                        <li class="tab col s3">
                            <a class="white-text waves-effect waves-light active" href="#UpdateStatus">
                                <i class="material-icons">border_color</i> Mis cursos</a>
                        </li>
                    </ul>
                    <!-- UpdateStatus-->
                    <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
<?php
    $consul_cursos = paraTodos::arrayConsulta("*", "curso, curso_inscrito", "cur_codigo=curi_curcodigo and curi_percodigo=$_SESSION[codido_persona]");
    foreach($consul_cursos as $curso){
?>
                        <div class="col s12 m6 l6">
                            
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="<?php echo $ruta_base?>/assets/img/cursos/<?php echo $curso[cur_imagen];?>" alt="sample">
                                    <span class="card-title"><?php echo $curso[cur_descripcion];?></span>
                                </div>
                                <div class="card-content">
                                    <p><?php echo $curso[cur_resumen];?></p>
                                </div>
                                <div class="card-action">
                                    <a href="javascript:void(0);" onclick="controler('dmn=11&ver=1&codigo=<?php echo $curso[cur_codigo];?>&ins=<?php echo $inscrito;?>','verContenido')"><?php echo $mensaje;?></a>
                                    <a href="javascript:void(0);" class="pull-right"><?php echo $porcenob;?>%</a>
                                </div>
                            </div>
                        </div>
<?php
                                     }
?>
                    </div>
                </div>
            </div>
            <!--/ profile-page-wall-share -->
        </div>
        <!--/ profile-page-wall -->
    </div>
</div>
<?php
                    }
?>
            </main>