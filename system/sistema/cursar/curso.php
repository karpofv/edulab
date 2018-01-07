<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
            <div class="brand-sidebar">
                <h1 class="logo-wrapper">
                    <a href="javscript:void(0);" onclick="controler('dmn=11&clase=<?php echo $clase?>&act=20&actd=1&ver=1', 'verObjetivos5'); $('#ventanaCurso').html('');" class="brand-logo darken-1">
                        <h6 style="float:left;"><i class="material-icons">keyboard_arrow_left</i>
                            <?php echo $consulobjetivo[0][ob_descripcion];?>
                        </h6>
                    </a>
                </h1>
            </div>
            <ul id="slide-out-curso" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="transform: translateX(0%);">
                <?php
        foreach($consulcontenido as $conten){
                ?>
                    <li class="no-padding">
                        <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&content=<?php echo $conten[cont_codigo];?>&obj=<?php echo $consulobjetivo[0][ob_codigo];?>&act=20&actd=1&ver=1', 'containCurso'); $('#editor').addClass('collapsed');">
                            <?php echo $conten[cont_orden];?> .-
                            <?php echo $conten[cont_titulo];?>
                        </a>
                    </li>
                    <?php
        }
                ?>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 889px; right: 3px;">
                            <div class="ps-scrollbar-y" style="top: 0px; height: 638px;"></div>
                        </div>
            </ul>
            <a href="#" data-activates="slide-out-curso" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">menu</i>
            </a>
        </aside>
        <!-- END LEFT SIDEBAR NAVk-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content" style="background-color: #fbfbfb;">
            <!--start container-->
            <div class="container">
                <div class="section">
                    <div id="blog-post-full">
                        <div id="containCurso">
                        </div>
                        <div id="editor" class="card collapsed">
                            <div class="card-content">
                                <div class="row">
                                    <h5 class="header">Editor en tiempo real</h5>
                                    <textarea class="card col s12 l6 innerbox html" placeholder="Ingrese su código HTMl"></textarea>
                                    <textarea class="card col s12 l6 innerbox css" placeholder="Ingrese su código CSS"></textarea>
                                    <div class="card col s12 preview">
                                        <iframe class="col s12" id="live_update">
                                            <!DOCTYPE html>
                                            <html lang="es">
                                                <head>
                                                    <meta charset="utf-8">
                                                </head>
                                                <body>
                                                </body>
                                            </html>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->
</div>