<?php
    $opcion = $_POST[actd];
    $codigo = $_POST[codigo];
    $editar = $_POST[editar];
    $titulo = $_POST[titulo];
    $catego = $_POST[catego];
    $grado = $_POST[grado];
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
            $insertar = paraTodos::arrayInserte("cur_catcodigo, cur_gracodigo, cur_descripcion, cur_percodigo, cur_resumen, cur_imagen", "curso", "$catego, $grado, '$titulo', $_SESSION[codido_persona], '$resumen', '$imagen'");
            if($insertar){
                paraTodos::alerta("Registro exitoso", "success");
                $catego="";
                $grado="";
                $titulo="";
                $resumen="";
                $imagen="";
            }
        }
        if($editar==1 and $codigo!="" and $titulo!="" and $resumen!=""){
            $update = paraTodos::arrayUpdate("cur_catcodigo=$catego, cur_gracodigo=$grado, cur_descripcion='$titulo', cur_resumen='$resumen'", "curso", "cur_codigo=$codigo");
            if($update){
                paraTodos::alerta("Edición realizada", "success");
                $catego="";
                $grado="";
                $titulo="";
                $resumen="";
                $imagen="";               
                $codigo="";                
            }
        }
        if($editar==1 and $codigo!="" and $titulo=="" and $resumen==""){
            $consulta = paraTodos::arrayConsulta("*", "curso", "cur_codigo=$codigo");
            foreach($consulta as $curso){
                $catego=$curso[cur_catcodigo];
                $grado=$curso[cur_gracodigo];
                $titulo=$curso[cur_descripcion];
                $resumen=$curso[cur_resumen];
            }
        }
        if($eliminar==1 and $codigo!=""){
            $delete = paraTodos::arrayDelete("cur_codigo=$codigo","curso");
            if($delete){
                paraTodos::alerta("Curso Eliminado", "success");
            }
        }
        $consulta = paraTodos::arrayConsulta("c.cur_codigo, cat.cat_descripcion, c.cur_descripcion, c.cur_resumen, g.gra_descripcion, s.st_descripcion", "curso c, categoria cat, tools_grados g, tools_status s", "c.cur_catcodigo=cat.cat_codigo and c.cur_gracodigo=g.gra_codigo and c.cur_estcodigo=s.st_codigo and cur_percodigo=$_SESSION[codido_persona]");   
    }
?>