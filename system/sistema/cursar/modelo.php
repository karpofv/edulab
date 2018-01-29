<?php
    $obj = $_POST[obj];
    $clase = $_POST[clase];
    $opcion = $_POST[actd];
    $content = $_POST[content];
    if($opcion!=""){
        if($opcion==1){
            paraTodos::arrayInserte("avano_objcodigo,avano_contenido,avano_percodigo", "avance_objetivos", "$obj,$content,$_SESSION[codido_persona]");
            $contenido = paraTodos::arrayConsulta("*", "contenido","cont_codigo=$content and cont_stcodigo=1");            
            $contenido_descrip = str_replace("%#37;#39;", "'", $contenido[0][cont_descripcion]);
            $contenido_descrip = str_replace("%#37;nbsp;", "  ", $contenido_descrip);            
            $contenido_descrip = str_replace("%#37;rsquo;", "'", $contenido_descrip);            
            $url_c = $contenido[0][cont_url];
            $url = "https://www.youtube.com/embed/$url_c?rel=0&amp;controls=0&amp;showinfo=0";
            $orden = $contenido[0][cont_orden];
            /*Se busca si existe mas contenido y cual es el siguiente*/
            $proximo = paraTodos::arrayConsulta("cont_codigo", "contenido c", "c.cont_obcodigo=$obj and cont_orden>$orden and cont_stcodigo=1 limit 1");
            $proximo_cont = $proximo[0][cont_codigo];
?>
    <div class="container">
        <div class="row">
            <div class="col s10">
                <h5 class="breadcrumbs-title">
                    <?php echo $contenido[0][cont_titulo];?>
                </h5>
            </div>
            <?php
                if($proximo_cont!=""){
            ?>
                <div class="col s2">
                    <a class="btn waves-effect waves-light breadcrumbs-btn right" href="javascript:void(0);" onclick="controler('dmn=12&content=<?php echo $proximo_cont;?>&act=20&actd=1&ver=1', 'containCurso');">
                        <i class="material-icons hide-on-med-and-up">settings</i>
                        <span class="hide-on-small-onl">Siguiente</span>
                        <i class="material-icons right">keyboard_arrow_right</i>
                    </a>

                </div>
                <?php
                }
            ?>
        </div>
    </div>
    <div class="card">
        <?php
            if($url_c!=""){
        ?>
            <div class="card-image">
                <div class="video-container no-controls">
                    <iframe width="520" height="260" src="<?php echo $url;?>" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
            <?php
            }
        ?>
                <div class="card-content">
                    <p style="text-align:justify">
                        <?php echo $contenido_descrip;?>
                    </p>
                    <?php
            if($contenido[0][cont_compilador]==1){
            ?>
                <a class="btn waves-effect waves-light breadcrumbs-btn right" href="javascript:void(0);" onclick="$('#editor').removeClass('collapsed');">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Editor en tiempo real</span>
                    <i class="material-icons right">keyboard_arrow_right</i>
                </a>
                        <?php
            }
                    ?>
                </div>
    </div>
    <div class="row">
        <?php
                if($proximo_cont!=""){
            ?>
            <div class="col s2">
                <a class="btn waves-effect waves-light breadcrumbs-btn right" href="javascript:void(0);" onclick="controler('dmn=12&content=<?php echo $proximo_cont;?>&act=20&actd=1&ver=1', 'containCurso');">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Siguiente</span>
                    <i class="material-icons right">keyboard_arrow_right</i>
                </a>

            </div>
            <?php
                }
            ?>
    </div>
    <?php
        }
    } else {
        /*Se consulta el titulo del objetivo*/
        $consulobjetivo = paraTodos::arrayConsulta("*", "objetivos", "ob_codigo=$obj");
        /*Se obtiene el contenido del objetivo*/
        $consulcontenido = paraTodos::arrayConsulta("*", "contenido","cont_obcodigo=$obj and cont_stcodigo=1");
    }
?>