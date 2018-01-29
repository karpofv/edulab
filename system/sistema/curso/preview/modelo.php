<?php
    $opcion = $_POST[actd];
    $clase = $_POST[clase];
    $codigo = $_POST[codigo];
    $inscrito = $_POST[ins];
if($inscrito==1){
    $mensaje = "Iniciar";
} else {
    $mensaje = "Proseguir";
}
    if($opcion!=""){
        if($opcion==1){
            $consultaclase = paraTodos::arrayConsulta("*", "objetivos", "ob_curccodigo=$clase and ob_stcodigo=1 order by ob_orden");
            $totalcontvis = 0;
            foreach($consultaclase as $rowc){
                /*Se obtiene el total de contenidos para el porcentaje*/
                $totalcont = paraTodos::arrayConsultanum("*", "contenido", "cont_obcodigo=$rowc[ob_codigo]");
                /*Se obtiene el contenido visto por el usuario*/
                $totalcontvis = paraTodos::arrayConsultanum("*", "avance_objetivos", "avano_objcodigo=$rowc[ob_codigo] and avano_percodigo=$_SESSION[codido_persona]");                
                $porcen = ($totalcontvis*100)/$totalcont;
            ?>
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <h5 style="margin: auto;"><?php echo $rowc[ob_orden];?></h5>
                        <h5><?php echo $porcen;?>%</h5>
                    </div>
                    <div class="content">
                        <h5><?php echo $rowc[ob_descripcion];?></h5>
                        <div class="divider"></div>
                        <p><?php echo $rowc[ob_resumen];?></p>
                        <button class="btn" onclick="controler('dmn=12&obj=<?php echo $rowc[ob_codigo];?>&ver=1', 'ventanaCurso');"><?php echo $mensaje;?></button>                        
                    </div>
                </div>
<?php
            }
        }
    } else{
        if($codigo!="" and $inscrito==1){
            paraTodos::arrayInserte("curi_curcodigo,curi_percodigo", "curso_inscrito", "$codigo, $_SESSION[codido_persona]");
        }
        $consulta = paraTodos::arrayConsulta("*", "curso_clase cc", "cc.curc_curcodigo=$codigo and curc_stcodigo=1");   
    }
?>