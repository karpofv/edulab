<?php
foreach($consulta as $row){
    $porcenc = 0;
    $totalobjvist = 0;
    $totalobj = 0;
    /*Se buscan los objetivos de la clase*/
    $consul_objetivos = paraTodos::arrayConsulta("*", "objetivos", "ob_curccodigo=$row[curc_codigo]");
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
    $porcenc = ($totalobjvist*100)/$totalobj;
?>
    <div class="wrap">
        <div class="row">
            <h5 class="col s10">
                <?php echo $porcenc."% ".$row[curc_descripcion];?>
            </h5>
            <button class="btn col s2" onclick="controler('dmn=11&clase=<?php echo $row[curc_codigo];?>&act=20&actd=1&ver=1', 'verObjetivos<?php echo $row[curc_codigo];?>');">Ver contenido</button>
        </div>
        <div class="row">
            <div id="verObjetivos<?php echo $row[curc_codigo];?>">
            </div>
        </div>
    </div>
    <?php
                          }
?>