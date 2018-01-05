<?php
include("includes/conf/parametros.php");
include("includes/layout/headp.php");
include("includes/layout/headerp.php");
?>
<div class="row container-login">
    <div class="col-sm-12">
        <?php
    if($_GET[info]!=""){
        $error_msg = $info[$_GET[info]];
    ?>
            <div class="row animated flipInY">
                <div class="alert alert-error-login alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $error_msg;?>
                </div>
            </div>
            <?php
    }
    ?>
    </div>
    <div class="col-xs-12 col-sm-6">
        <form action="http://lavitrinaonline.com/inicio-sesion" method="post" id="create-account_form" class="box">
            <h3 class="page-subheading">Crear una cuenta</h3>
            <div class="form_content clearfix">
                <p>Escriba su dirección de correo electrónico para crear una cuenta.</p>
                <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                <div class="form-group">
                    <label for="email_create">Dirección de correo electrónico</label>
                    <input type="email" class="is_required validate account_input form-control" data-validate="isEmail" id="email_create" name="email_create" value="">
                </div>
                <div class="submit">
                    <input type="hidden" class="hidden" name="back" value="my-account"> <button class="btn btn-default button button-medium exclusive" type="submit" id="SubmitCreate" name="SubmitCreate">
							<span>
								<i class="icon-user left"></i>
								Crear una cuenta
							</span>
						</button>
                    <input type="hidden" class="hidden" name="SubmitCreate" value="Crear una cuenta">
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-6">
        <form action="index2.php" method="post" id="login_form" class="box">
            <h3 class="page-subheading">¿Ya está registrado?</h3>
            <div class="form_content clearfix">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="user" name="user" value="">
                </div>
                <div class="form-group">
                    <label for="passwd">Contraseña</label>
                    <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="pass" name="pass" value="">
                </div>
                <p class="lost_password form-group"><a href="http://lavitrinaonline.com/recuperacion-contraseña" title="Recuperar la contraseña" rel="nofollow">¿Olvidó su contraseña?</a></p>
                <p class="submit">
                    <input type="hidden" class="hidden" name="back" value="my-account"> <button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium">
							<span>
								<i class="icon-lock left"></i>
								Iniciar sesión
							</span>
						</button>
                </p>
            </div>
        </form>
    </div>
</div>
<?php
include("includes/layout/footp.php");
?>