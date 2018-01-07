<div class="contenedor-formulario">
    <div class="wrap">
        <h5 class="header">Cursos</h5>
        <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&titulo='+$('#titulo').val()+'&resumen='+$('#resumen').val()+'&grado='+$('#selgrado').val()+'&catego='+$('#selcatego').val()+'&editar=1&ver=1', 'verContenido'); return false;">
            <div class="row">
                <div class="col s12 l12" style="display: block;">
                    <label class="control-label" for="titulo">Título</label>
                    <input class="form-control" id="titulo" type="text" value="<?php echo $titulo; ?>" required>
                    <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>">
                </div>
                <div class="col s12 l12" style="display: block;">
                    <label class="control-label" for="resumen">Resumen</label>
                    <textarea class="form-control txtresumen" id="resumen" required><?php echo $resumen;?></textarea>
                </div>
                <div class="input-field col s12 l4">
                    <select id="selgrado" required>
                        <option value="">Seleccione una opción</option>
                        <?php
                        combos::CombosSelect("1", "$grado", "gra_codigo, gra_descripcion", "tools_grados", "gra_codigo", "gra_descripcion", "1=1");
                        ?>
                    </select>
                    <label class="control-label" for="selgrado">Grado de complejidad</label>
                </div>
                <div class="input-field col s12 l4">
                    <select id="selcatego" required>
                        <option value="">Seleccione una opción</option>
                        <?php
                        combos::CombosSelect("1", "$catego", "cat_codigo, cat_descripcion", "categoria", "cat_codigo", "cat_descripcion", "cat_stcodigo=1 order by cat_descripcion");
                        ?>
                    </select>
                    <label class="control-label" for="selcatego">Categoría</label>
                </div>
            </div>
            <div class="row">
                <div class="col s2 push-s5">
                    <br>
                    <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
            </div>
        </form>
    </div>
</div>
<div class="contenedor-formulario">
    <div class="row">    
    <?php
        foreach($consulta as $curso) {
    ?>
        <div class="col s12 l4 bg-white">
            <h5 class="titulo_curso">
                <?php echo $curso[cur_descripcion];?>
                <a title="Vista previa" style="color:white; float:right;" class="push-right" href="javascript:void(0);" onclick="controler('dmn=11&codigo=<?php echo $curso[cur_codigo];?>&ver=1', 'verContenido');"><i class="material-icons">aspect_ratio</i></a>
                <a title="Eliminar" style="color:white;float: right;" class="push-right" href="javascript:void(0)" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $curso[cur_codigo];?>&eliminar=1&ver=1', 'verContenido');"><i class="material-icons">close</i></a>
                <a title="Editar" style="color:white;float: right;" href="javascript:void(0)" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $curso[cur_codigo];?>&ver=1&editar=1', 'verContenido')"><i class="material-icons">mode_edit</i></a>
            </h5>
            <h6 style="color:blue; text-align:right;">
                <?php echo ucfirst($curso[gra_descripcion]);?>
            </h6>
            <p style="text-align:justify; font-size: 12px;">
                <?php echo $curso[cur_resumen];?>
            </p>
            <h6 style="color:gray; float:left;">
                <?php echo ucfirst($curso[cat_descripcion]);?>
            </h6>
            <h6 style="color:green; float:right;">
                <?php echo ucfirst($curso[st_descripcion]);?>
            </h6>
            <br>
            <br>
            <button class="btn btn_curso" onclick="controler('dmn=7&curso=<?php echo $curso[cur_codigo];?>&ver=1', 'ventanaVer');">Ir al contenido</button>
        </div>
        <?php
        }
    ?>
    </div>
</div>