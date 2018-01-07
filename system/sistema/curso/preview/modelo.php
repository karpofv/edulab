<?php
    $opcion = $_POST[actd];
    $clase = $_POST[clase];
    if($opcion!=""){
        if($opcion==1){
            $consultaclase = paraTodos::arrayConsulta("*", "objetivos", "ob_curccodigo=$clase and ob_stcodigo=1 order by ob_orden");
            foreach($consultaclase as $rowc){
            ?>
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <h5 style="margin: auto;"><?php echo $rowc[ob_orden];?></h5>                        
                    </div>
                    <div class="content">
                        <h5><?php echo $rowc[ob_descripcion];?></h5>
                        <div class="divider"></div>
                        <p><?php echo $rowc[ob_resumen];?></p>
                        <button class="btn" onclick="controler('dmn=12&obj=<?php echo $rowc[ob_codigo];?>&ver=1', 'ventanaCurso');"">Iniciar</button>                        
                    </div>
                </div>
<?php
            }
        }
    } else{
        $consulta = paraTodos::arrayConsulta("*", "curso_clase cc", "cc.curc_curcodigo=1 and curc_stcodigo=1");   
    }
?>