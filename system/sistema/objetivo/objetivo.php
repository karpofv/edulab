<div class="modal-backdrop">
<div class="modal fade in animated bounceInLeft" id="largeModal" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="cerrar();">Volver a cursos</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="controler('dmn=7&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&ver=1', 'ventanaVer');">Volver a clases</button>                
                <h4 class="modal-title navbar-color gradient-45deg-blue-grey-blue gradient-shadow" id="largeModalLabel" style="padding:10px; color:white;">Objetivos</h4>
            </div>
            <div class="modal-body">
                <div class="row card-panel">
                    <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&titulo='+$('#titulo').val()+'&resumen='+$('#resumen').val()+'&orden='+$('#orden').val()+'&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&editar=1&ver=1', 'ventanaVer'); return false;">
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
                            <div class="col s10 l4" style="display: block;">
                                <label class="control-label" for="orden">Orden</label>
                                <input class="form-control" id="orden" type="number" value="<?php echo $orden; ?>" min="1" required>
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
                    <h5 class="header">Objetivos existentes</h5>
                    <table class="table table-hover" id="tbclase">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Orden</strong></td>                    
                                <td class="text-center"><strong>Objetivo</strong></td>                    
                                <td class="text-center"><strong>Resumen</strong></td>
                                <td class="text-center"><strong>Puntos de estudio</strong></td>
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
                                    <?php echo $row[ob_orden];?>
                                </td>                        
                                <td class="text-center">
                                    <?php echo $row[ob_descripcion];?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row[ob_resumen];?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=9&obj=<?php echo $row[ob_codigo];?>&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&ver=1', 'ventanaVer');"> <i class="material-icons">list</i> </a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[ob_codigo];?>&clase=<?php echo $clase;?>&curso=<?php echo $curso?>&editar=1&ver=1','ventanaVer');"> <i class="material-icons">edit</i> </a>
                                </td>
                                <td class="text-center"> <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[ob_codigo];?>&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&eliminar=1&ver=1', 'ventanaVer');"><i class="material-icons">delete_forever</i>
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
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="controler('dmn=7&clase=<?php echo $clase;?>&curso=<?php echo $curso;?>&ver=1', 'ventanaVer');">Volver a clases</button>       
            </div>
        </div>
    </div>
</div>