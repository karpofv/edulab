<?php
    include("includes/conf/parametros.php");
    include("includes/layout/headp.php");
	error_reporting(E_ALL);
	ini_set('display_errors', false);
	ini_set('display_startup_errors', false);
	require_once ('includes/conf/db.php');
	require_once ('includes/conexion.php');
	require_once ('system/clases/usuarios/class.usuarios.php');
    $nombre = $_POST[nombre];
    $apellido = $_POST[apellido];
    $correo = $_POST[correo];
    $pass = $_POST[pass];
    $user = $_POST[user];
    $cedula = $_POST[cedula];
    if($pass!=""){
        $registro = UsuariosModel::registrarUsuario($user,$pass,$nombre,$apellido, $correo, $cedula);
    }
?>
    <main role="main" id="MainContent">
        <div class="section container">
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <div class="card login-wrapper">
                        <div class="card-content">
<?php
    if($registro!=""){
?>
                            <div class="card-content">
                                <h4><?php echo $registro; ?></h4>
                            </div>
<?php
    }
?>
                            <form method="post" action="registro.php" id="create_customer" accept-charset="UTF-8">
                                <input type="hidden" value="create_customer" name="form_type" />
                                <input type="hidden" name="utf8" value="✓" />
                                <h4 class="center">Crear cuenta</h4>
                                <div class="input-field">
                                    <label for="cedula"> Cédula </label>
                                    <input type="number" name="cedula" id="cedula" autofocus required>
                                </div>
                                <div class="input-field">
                                    <label for="nombre"> Nombres </label>
                                    <input type="text" name="nombre" id="nombre" autofocus required>
                                </div>
                                <div class="input-field">
                                    <label for="apellido"> Apellidos </label>
                                    <input type="text" name="apellido" id="apellido" required>
                                </div>
                                <div class="input-field">
                                    <label for="correo"> Correo electrónico </label>
                                    <input type="email" name="correo" id="correo" class="" value="" spellcheck="false" autocomplete="off" autocapitalize="off" required>
                                </div>
                                <div class="input-field">
                                    <label for="user"> Usuario </label>
                                    <input type="text" name="user" id="user" class="" value="" spellcheck="false" autocomplete="off" autocapitalize="off" required>
                                </div>
                                <div class="input-field">
                                    <label for="pass"> Contraseña </label>
                                    <input type="password" name="pass" id="pass" class="" required>
                                </div>
                                <p>
                                    <input type="submit" value="Crear" class="btn-large z-depth-0"> </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include("includes/layout/footp.php");
    ?>
