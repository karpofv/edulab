<?php
    $opcion = $_POST[actd];
    $codigo = $_POST[codigo];
    $estatus = $_POST[estado];
    $editar = $_POST[editar];
    $emulador = $_POST[emulador];
    $titulo = $_POST[titulo];
    $tinymce=$_POST[tinymce];
    $orden = $_POST[orden];
    $clase = $_POST[clase];
    $curso = $_POST[curso];
    $obj = $_POST[obj];
    $url = $_POST[url];
    $eliminar = $_POST[eliminar];
    if($opcion!=""){
        if($opcion==1){
            if($estatus==1){
                $estatus=2;
                $colorst="red";
                $iconst="close";
            } else {
                $estatus=1;
                $colorst="green";
                $iconst="done";
            }
            paraTodos::arrayUpdate("cat_stcodigo=$estatus", "categoria", "cat_codigo=$codigo");
?>
    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $codigo;?>&estado=<?php echo $estatus;?>&ver=1&actd=1&act=20', 'td_<?php echo $codigo;?>_st');" style="color:<?php echo $colorst;?>;"> <i class="material-icons"><?php echo $iconst;?></i> </a>
    <?php
        }
    } else {
        if($editar==1 and $codigo==""){
            $insertar = paraTodos::arrayInserte("cont_titulo, cont_descripcion,cont_compilador, cont_obcodigo, cont_url, cont_orden", "contenido", "'$titulo', '$tinymce',$emulador,$obj, '$url', $orden");
            if($insertar){
                paraTodos::alerta("Registro exitoso", "success");
            }
                $titulo="";
                $tinymce="";
                $orden="";
                $url="";
                $emulador="";
        }
        if($editar==1 and $codigo!="" and $titulo!=""){
            $update = paraTodos::arrayUpdate("cont_titulo='$titulo', cont_descripcion='$tinymce', cont_url='$url', cont_orden='$orden', cont_compilador=$emulador", "contenido", "cont_codigo=$codigo");
            if($update){
                paraTodos::alerta("Edición realizada", "success");               
            }
                $titulo="";
                $resumen="";
                $orden="";                
                $url="";                
                $tinymce="";                
                $codigo="";                
                $emulador=""; 
        }
        if($editar==1 and $codigo!="" and $titulo=="" and $resumen==""){
            $consulta = paraTodos::arrayConsulta("*", "contenido", "cont_codigo=$codigo");
            foreach($consulta as $objetivo){
                $titulo = $objetivo[cont_titulo];
                $tinymce = str_replace("%#37;#39;", "'", $objetivo[cont_descripcion]);
                $tinymce = str_replace("%#37;nbsp;", "  ", $tinymce);
                $tinymce = str_replace("%#37;rsquo;", "'", $tinymce);
                $orden = $objetivo[cont_orden];
                $url = $objetivo[cont_url];
                $emulador = $objetivo[cont_compilador];
            }
        }
        if($eliminar==1 and $codigo!=""){
            $delete = paraTodos::arrayDelete("cont_codigo=$codigo","contenido");
            if($delete){
                paraTodos::alerta("Contenido eliminado", "success");
                $codigo="";
                $eliminar="";
            }
        }
        $consulta = paraTodos::arrayConsulta("*", "contenido c, tools_status ts", "c.cont_stcodigo=st_codigo and cont_obcodigo=$obj");  
    }
?>