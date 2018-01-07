<?php
foreach($consulta as $row){
?>
    <div class="wrap">
        <div class="row">
            <h5 class="col s10">
                <?php echo $row[curc_descripcion];?>
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