<div class="row section">
<?php
    foreach($consul_catego as $catego){
?>
    <div class="col s12 m6 l6">
        <div class="card medium">
            <div class="card-image">
                <img src="<?php echo $ruta_base?>/assets/img/cursos/categoria/<?php echo $catego[cat_imagen];?>" alt="sample">
                <span class="card-title"><?php echo $catego[cat_descripcion];?></span>
            </div>
            <div class="card-content">
                <p><?php echo $catego[cat_resumen];?></p>
            </div>
            <div class="card-action">
                <a href="javascript:void(0);" onclick="controler('dmn=17&ver=1&c=<?php echo $catego[cat_codigo];?>','verContenido')">Ver cursos</a>
            </div>
        </div>
    </div>
<?php
    }
?>
</div>