<div class="modal-backdrop">
<div class="modal fade in animated bounceInLeft" id="largeModal" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="cerrar();">Volver a cursos</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="controler('dmn=8&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&obj=<?php echo $obj;?>&ver=1', 'ventanaVer');">Volver a objetivos</button>                
                <h4 class="modal-title navbar-color gradient-45deg-blue-grey-blue gradient-shadow" id="largeModalLabel" style="padding:10px; color:white;">Contenido</h4>
            </div>
            <div class="modal-body">
                <div class="row card-panel">
                    <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="var contenido = CKEDITOR.instances['tinymce'].getData();content = mapear(contenido); controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&titulo='+$('#titulo').val()+'&emulador='+$('#selstatus').val()+'&orden='+$('#orden').val()+'&url='+$('#url').val()+'&tinymce='+content+'&clase=<?php echo $clase;?>&obj=<?php echo $obj;?>&curso=<?php echo $curso;?>&editar=1&ver=1', 'ventanaVer'); return false;">
                        <div class="row">
                            <div class="col s10 l12" style="display: block;">
                                <label class="control-label" for="titulo">Título</label>
                                <input class="form-control" id="titulo" type="text" value="<?php echo $titulo; ?>" required>
                                <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <textarea id="tinymce"><?php echo $tinymce;?></textarea>
                        </div>
                        <div class="row">
                            <div class="col s12 l4" style="display: block;">
                                <label class="control-label" for="orden">Orden</label>
                                <input class="form-control" id="orden" type="number" value="<?php echo $orden; ?>" min="1" required>
                            </div>
                            <div class="col s12 l4" style="display: block;">
                                <label class="control-label" for="url">Video</label>
                                <input class="form-control" id="url" type="text" value="<?php echo $url; ?>">
                            </div>
                            <div class="input-field col s12 l4">
                                <select id="selstatus" required>
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                    combos::CombosSelect("1", "$emulador", "st_codigo, st_descripcion", "tools_status", "st_codigo", "st_descripcion", "st_codigo=1 or st_codigo=2 order by st_descripcion");
                                    ?>
                                </select>
                                <label class="control-label" for="selstatus">Emulador</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s2 push-s5">
                                <br>
                                <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
                        </div>
                    </form>                    
                </div>
                <div class="row card-panel">
                    <h5 class="header">Contenido cargado</h5>
                    <table class="table table-hover" id="tbclase">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Orden</strong></td>                    
                                <td class="text-center"><strong>Item</strong></td>
                                <td class="text-center"><strong>Editar</strong></td>
                                <td class="text-center"><strong>Eliminar</strong></td>
                            </tr>
                        </thead>
                        <tbody>
<?php    
                            foreach($consulta as $row){
?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $row[cont_orden];?>
                                </td>                        
                                <td class="text-center">
                                    <?php echo $row[cont_titulo];?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cont_codigo];?>&clase=<?php echo $clase;?>&curso=<?php echo $curso?>&obj=<?php echo $obj;?>&editar=1&ver=1','ventanaVer');"> <i class="material-icons">edit</i> </a>
                                </td>
                                <td class="text-center"> <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cont_codigo];?>&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&obj=<?php echo $obj;?>&eliminar=1&ver=1', 'ventanaVer');"><i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            </tr>
<?php
                            }?>
                        </tbody>
                    </table>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="cerrar();">Volver a cursos</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="controler('dmn=8&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&obj=<?php echo $obj;?>&ver=1', 'ventanaVer');">Volver a objetivos</button>                
            </div>
        </div>
    </div>
</div>