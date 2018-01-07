<?php
    $opcion = $_POST[actd];
    $codigo = $_POST[codigo];
    $estatus = $_POST[estado];
    $editar = $_POST[editar];
    $titulo = $_POST[titulo];
    $resumen = $_POST[resumen];
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
            if($imagen==""){
                $imagen="standar.png";
            }
            $insertar = paraTodos::arrayInserte("cat_descripcion, cat_resumen, cat_imagen", "categoria", "'$titulo', '$resumen', '$imagen'");
            if($insertar){
                paraTodos::alerta("Registro exitoso", "success");
                $titulo="";
                $resumen="";
                $imagen="";
            }
        }
        if($editar==1 and $codigo!="" and $titulo!="" and $resumen!=""){
            $update = paraTodos::arrayUpdate("cat_descripcion='$titulo', cat_resumen='$resumen'", "categoria", "cat_codigo=$codigo");
            if($update){
                paraTodos::alerta("Edición realizada", "success");
                $titulo="";
                $resumen="";                
                $codigo="";                
            }
        }
        if($editar==1 and $codigo!="" and $titulo=="" and $resumen==""){
            $consulta = paraTodos::arrayConsulta("*", "categoria", "cat_codigo=$codigo");
            foreach($consulta as $catego){
                $titulo = $catego[cat_descripcion];
                $resumen = $catego[cat_resumen];
            }
        }
        if($eliminar==1 and $codigo!=""){
            $delete = paraTodos::arrayDelete("cat_codigo=$codigo","categoria");
            if($delete){
                paraTodos::alerta("Categoría Eliminada", "success");
            }
        }
        $consulta = paraTodos::arrayConsulta("*", "categoria c, tools_status ts", "c.cat_stcodigo=st_codigo");   
    }
?>