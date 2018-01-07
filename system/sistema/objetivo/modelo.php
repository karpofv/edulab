<?php
    $opcion = $_POST[actd];
    $codigo = $_POST[codigo];
    $estatus = $_POST[estado];
    $editar = $_POST[editar];
    $titulo = $_POST[titulo];
    $resumen = $_POST[resumen];
    $orden = $_POST[orden];
    $clase = $_POST[clase];
    $curso = $_POST[curso];
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
            $insertar = paraTodos::arrayInserte("ob_orden, ob_curccodigo,ob_descripcion, ob_resumen", "objetivos", "$orden, $clase,'$titulo', '$resumen'");
            if($insertar){
                paraTodos::alerta("Registro exitoso", "success");
                $titulo="";
                $resumen="";
                $orden="";
            }
        }
        if($editar==1 and $codigo!="" and $titulo!=""){
            $update = paraTodos::arrayUpdate("ob_descripcion='$titulo', ob_orden='$orden', ob_resumen='$resumen'", "objetivos", "ob_codigo=$codigo");
            if($update){
                paraTodos::alerta("Edición realizada", "success");
                $titulo="";
                $resumen="";
                $orden="";                
                $codigo="";                
            }
        }
        if($editar==1 and $codigo!="" and $titulo=="" and $resumen==""){
            $consulta = paraTodos::arrayConsulta("*", "objetivos", "ob_codigo=$codigo");
            foreach($consulta as $objetivo){
                $titulo = $objetivo[ob_descripcion];
                $resumen = $objetivo[ob_resumen];
                $orden = $objetivo[ob_orden];
            }
        }
        if($eliminar==1 and $codigo!=""){
            $delete = paraTodos::arrayDelete("ob_codigo=$codigo","objetivos");
            if($delete){
                paraTodos::alerta("Objetivo eliminado", "success");
                $codigo="";
                $eliminar="";
            }
        }
        $consulta = paraTodos::arrayConsulta("*", "objetivos c, tools_status ts", "c.ob_stcodigo=st_codigo and ob_curccodigo=$clase");  
    }
?>