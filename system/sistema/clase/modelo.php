<?php
    $opcion = $_POST[actd];
    $codigo = $_POST[codigo];
    $estatus = $_POST[estado];
    $editar = $_POST[editar];
    $titulo = $_POST[titulo];
    $orden = $_POST[orden];
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
            $insertar = paraTodos::arrayInserte("curc_curcodigo, curc_descripcion,curc_orden", "curso_clase", "$curso, '$titulo', $orden");
            if($insertar){
                paraTodos::alerta("Registro exitoso", "success");
                $titulo="";
                $orden="";
            }
        }
        if($editar==1 and $codigo!="" and $titulo!=""){
            $update = paraTodos::arrayUpdate("curc_descripcion='$titulo', curc_orden='$orden'", "curso_clase", "curc_codigo=$codigo");
            if($update){
                paraTodos::alerta("Edición realizada", "success");
                $titulo="";
                $orden="";                
                $codigo="";                
            }
        }
        if($editar==1 and $codigo!="" and $titulo=="" and $resumen==""){
            $consulta = paraTodos::arrayConsulta("*", "curso_clase", "curc_codigo=$codigo");
            foreach($consulta as $clase){
                $titulo = $clase[curc_descripcion];
                $orden = $clase[curc_orden];
            }
        }
        if($eliminar==1 and $codigo!=""){
            $delete = paraTodos::arrayDelete("curc_codigo=$codigo","curso_clase");
            if($delete){
                paraTodos::alerta("Clase eliminada", "success");
                $codigo="";
                $eliminar="";
            }
        }
        $consulta = paraTodos::arrayConsulta("*", "curso_clase c, tools_status ts", "c.curc_stcodigo=st_codigo and curc_curcodigo=$curso");   
    }
?>