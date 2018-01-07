<div class="contenedor-formulario">
    <div class="wrap">
        <h5 class="header">Cursos pendientes por publicación</h5>
        <table class="table table-hover" id="tbcursos">
            <thead>
                <tr>
                    <td class="text-center"><strong>Tutor</strong></td>
                    <td class="text-center"><strong>Categoria</strong></td>
                    <td class="text-center"><strong>Curso</strong></td>
                    <td class="text-center"><strong>Publicar</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php
                        foreach($consulta as $row){
                        ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $row[per_apellidos]." ".$row[per_nombres];?>
                        </td>
                        <td class="text-center">
                            <?php echo utf8_decode($row[cur_descripcion]);?>
                        </td>
                        <td class="text-center">
                            <?php echo utf8_decode($row[cat_descripcion]);?>
                        </td>
                        <td class="text-center"> 
                            <a style="color:green;" href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cur_codigo];?>&publicar=1&act=20&actd=1&ver=1', 'verContenido');controler('dmn=<?php echo $idMenu;?>&ver=1', 'verContenido');"><i class="material-icons">publish</i>        
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