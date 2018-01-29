<?php
    $categoria = $_POST[c];
    $consul_cursos = paraTodos::arrayConsulta("*", "curso", "cur_catcodigo=$categoria and cur_estcodigo=1");
?>