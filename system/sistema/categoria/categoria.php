<div class="contenedor-formulario">
    <div class="wrap">
        <h5 class="header">Categorías</h5>
        <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&titulo='+$('#titulo').val()+'&resumen='+$('#resumen').val()+'&editar=1&ver=1', 'verContenido'); return false;">
            <div class="row">
                <div class="col s10 l12" style="display: block;">
                    <label class="control-label" for="titulo">Título</label>
                    <input class="form-control" id="titulo" type="text" value="<?php echo $titulo; ?>" required>
                    <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>">
                </div>
                <div class="col s12 l12" style="display: block;">
                    <label class="control-label" for="resumen">Resumen</label>
                    <textarea class="form-control txtresumen" id="resumen" required><?php echo $resumen;?></textarea>
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
    <div class="wrap">
        <h5 class="header">Categorías existentes</h5>
        <table class="table table-hover" id="tbcategoria">
            <thead>
                <tr>
                    <td class="text-center"><strong>Título</strong></td>
                    <td class="text-center"><strong>Resumen</strong></td>
                    <td class="text-center"><strong>Activa</strong></td>
                    <td class="text-center"><strong>Editar</strong></td>
                    <td class="text-center"><strong>Eliminar</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($consulta as $row){
                    if($row[st_codigo]==1){
                        $iconst="done";
                        $colorst = "green";
                    }
                    else {
                        $iconst="close";
                        $colorst = "red";
                    }
                ?>
                <tr>
                    <td class="text-center">
                        <?php echo $row[cat_descripcion];?>
                    </td>
                    <td style="text-align: justify;">
                        <?php echo $row[cat_resumen];?>
                    </td>
                    <td class="text-center" id="td_<?php echo $row[cat_codigo];?>_st">
                        <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cat_codigo];?>&estado=<?php echo $row[st_codigo];?>&ver=1&act=20&actd=1', 'td_<?php echo $row[cat_codigo];?>_st');" style="color:<?php echo $colorst;?>;"> <i class="material-icons"><?php echo $iconst;?></i> </a>
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cat_codigo];?>&editar=1&ver=1', 'verContenido');"> <i class="material-icons">edit</i> </a>
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cat_codigo];?>&eliminar=1&ver=1', 'verContenido');"><i   class="material-icons">delete_forever</i>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>