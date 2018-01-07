<?php
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
    $idperfil=$_POST['eliminar'];
    $dmn = $_POST['dmn'];
    $mody=$_POST['mody'];
    /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*Eliminar un Perfil*/
    if (isset($_POST['eliminar'])) {
        $consulta_nombre_perfil=paraTodos::arrayConsulta("perf_descripcion","perfiles", "perf_codigo=$idperfil");
        foreach($consulta_nombre_perfil as $resultado_nombre){
           $nombre_perfil=$resultado_nombre["perf_descripcion"];
        }
        $verifica_perfil=paratodos::arrayConsultanum("*","usuarios","Nivel='$nombre_perfil'");
        if ($verifica_perfil==0) {
            $consulta_eliminar=paratodos::arrayDelete("IdPerfil=perdet_codigo","perfiles_det");
            $consulta_eliminar=paratodos::arrayDelete("perf_codigo=$idperfil","perfiles");
        } else {
           echo "<h3 class=\"error\">El perfil no puede ser eliminado porque se encuentra en uso</h3>";
        }
    }
    /*Insertar un nuevo perfil*/
    if ($_POST['nuevoperfil']<>'') {
        //Si el texto tiene algo es porque se va a crear un nuevo perfil
        $indicemenu=$_POST['indicemenu'];
        $nuevoperfil=$_POST['nuevoperfil'];
                //Validar si el perfil solapa a otro
        if ($nuevoperfil<>'') {
                    $consulta_nombre_perfil=paraTodos::arrayConsultanum("perf_descripcion","perfiles","perf_descripcion like '%".$nuevoperfil."%'");
                    if ($consulta_nombre_perfil> 0) {
                        die ('<h3 class="error">El nombre de perfil seleccionado no puede usarse, intente con otro</h3>');
                    }
                    $consulta_nombre_perfil=null;
        }
        if ($nuevoperfil<>'') {
            $id=time();
            $insertar_perfil=paraTodos::arrayInserte("perf_codigo,perf_descripcion","perfiles","'0','$nuevoperfil'");
        }

    }
?>
    <script>
    </script>
    <div class="contenedor-formulario">
        <div class="wrap">
            <form action="javascript:void(0);" class="formulario" name="formulario_registro" method="post" onsubmit="controler('ver=2&dmn=<?php echo $dmn;?>&nuevoperfil='+$('#nuevoperfil').val(), 'verContenido'); return false;">
                <div class="col s12 l5" style="display: block;">
                    <label class="control-label" for="nuevoperfil">Crear perfil</label>
                    <input class="form-control" id="nuevoperfil" type="text" value="<?php echo $nuevoperfil;?>" required> 
                </div>                
                <input type="submit" class="btn btn-primary col-md-offset-5" id="btn-submit" value="Enviar">
            </form>
            <div class="divider"></div>
            <div class="input-field col s12 l4">
                <select id="idperfil" required>
                        <option value="">Seleccione un perfil</option>
                        <?php  Combos::CombosSelect($permiso, $id, 'DISTINCT perf_codigo,perf_descripcion', 'perfiles', 'perf_codigo', 'perf_descripcion', "perf_codigo<>'' ORDER BY perf_descripcion");   ?>
                    </select>
                <label class="control-label" for="idperfil">Tipo de usuario</label>
            </div>
        </div>
    </div>
    <div id="perfilver"></div>
    <script type="text/javascript">
        $('#idperfil').change(function() {
            var perf = $('#idperfil').val();
            if (perf != '') {
                controler('idperfil=' + perf + '&ver=2&act=2&dmn=<?php echo $dmn; ?>', 'perfilver');
            }
        });
    </script>