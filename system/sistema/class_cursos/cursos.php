<div class="row section">
<?php
    foreach($consul_cursos as $curso){
        $porcenc = 0;
        $porcenob = 0;
        $totalobjvist = 0;
        $totalclavist = 0;
        /*Se buscan las clases que posee el curso*/
        $consul_clases = paraTodos::arrayConsulta("*", "curso_clase", "curc_curcodigo=$curso[cur_codigo]");
        foreach($consul_clases as $clases){
            $totalclases=$totalclases+1;            
            /*Se buscan los objetivos de la clase*/
            $consul_objetivos = paraTodos::arrayConsulta("*", "objetivos", "ob_curccodigo=$clases[curc_codigo]");
            foreach($consul_objetivos as $bjetivos){
                $totalobj=$totalobj+1;
                /*Se obtiene el total de contenidos para el porcentaje*/
                $totalcont = paraTodos::arrayConsultanum("*", "contenido", "cont_obcodigo=$bjetivos[ob_codigo]");
                /*Se obtiene el contenido visto por el usuario*/
                $totalcontvis = paraTodos::arrayConsultanum("*", "avance_objetivos", "avano_objcodigo=$bjetivos[ob_codigo] and avano_percodigo=$_SESSION[codido_persona]");                
                $porcen = ($totalcontvis*100)/$totalcont;
                if($porcen==100){
                    $totalobjvist=$totalobjvist+1;
                }
            }
            $porcenob = ($totalobjvist*100)/$totalobj;
            if($porcenob==100){
                $totalclavist=$totalclavist+1;
            }            
        }
        $porcenc = ($totalclavist*100)/$totalclases;        
        $mensaje="";
        /*Se verifica si el usuario ya esta en el curso*/
        $inscrito = paraTodos::arrayConsultanum("*", "curso_inscrito", "curi_percodigo=$_SESSION[codido_persona] and curi_curcodigo=$curso[cur_codigo]");
        if($inscrito>0){
            $inscrito=0;
            $mensaje = "Proseguir";
        } else {
            $inscrito=1;
            $mensaje = "Iniciar";
        }
        if($porcenob==100){
            $mensaje = "Repasar";
        }
?>
    <div class="col s12 m6 l6">
        <div class="card medium">
            <div class="card-image">
                <img src="<?php echo $ruta_base?>/assets/img/cursos/<?php echo $curso[cur_imagen];?>" alt="sample">
                <span class="card-title"><?php echo $curso[cur_descripcion];?></span>
            </div>
            <div class="card-content">
                <p><?php echo $curso[cur_resumen];?></p>
            </div>
            <div class="card-action">
                <a href="javascript:void(0);" onclick="controler('dmn=11&ver=1&codigo=<?php echo $curso[cur_codigo];?>&ins=<?php echo $inscrito;?>','verContenido')"><?php echo $mensaje;?></a>
                <a href="javascript:void(0);" class="pull-right"><?php echo $porcenob;?>%</a>
            </div>
        </div>
    </div>
<?php
    }
?>
</div>