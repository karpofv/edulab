<?php
    $opcion = $_POST[actd];
    $codigo = $_POST[codigo];
    if($opcion!=""){
        if($opcion==1){
            $update = paraTodos::arrayUpdate("cur_estcodigo=1", "curso", "cur_codigo=$codigo");
        }
    } else {
        $consulta = paraTodos::arrayConsulta("*", "curso, persona, categoria", "cur_estcodigo=3 and cur_percodigo=per_codigo and cur_catcodigo=cat_codigo");      
    }
?>