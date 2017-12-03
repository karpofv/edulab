<?php
include("includes/conf/parametros.php");
include("includes/layout/headp.php");
?>
    <main role="main" id="MainContent">
        <div class="section container">
            <div class="row">
                <div class="col s12 m6 offset-m3">
                    <div class="card login-wrapper">
                        <div class="card-content">
                            <div id="CustomerLoginForm">
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
                                        <form method="post" action="index2.php" id="customer_login" accept-charset="UTF-8">
                                            <input type="hidden" value="customer_login" name="form_type" />
                                            <input type="hidden" name="utf8" value="✓" />
                                            <h4 class="center">Ingreso</h4>
                                            <div class="input-field">
                                                <label for="CustomerEmail">Usuario</label>
                                                <input type="text" name="user" id="user" class="" spellcheck="false" autocomplete="off" autocapitalize="off" autofocus> </div>
                                            <div class="input-field">
                                                <label for="CustomerPassword">Contraseña</label>
                                                <input type="password" name="pass" id="pass" class=""> </div>
                                            <input type="submit" class="btn-large z-depth-0" value="Ingresa"> <a href="#recover" id="RecoverPassword">¿Olvidaste tu contraseña?</a> </form>
                            </div>
                            <div id="RecoverPasswordForm" class="hide">
                                <h4 class="center">Recuperar contraseña</h4>
                                <p>Te enviaremos un correo con los datos para cambiar tu contraseña.</p>
                                <form method="post" action="/account/recover" accept-charset="UTF-8">
                                    <input type="hidden" value="recover_customer_password" name="form_type" />
                                    <input type="hidden" name="utf8" value="✓" />
                                    <div class="input-field">
                                        <label for="RecoverEmail">Correo electrónico</label>
                                        <input type="email" name="email" id="RecoverEmail" spellcheck="false" autocomplete="off" autocapitalize="off"> </div>
                                    <input type="submit" class="btn-large z-depth-0" value="Enviar"> <a href="#" id="HideRecoverPasswordLink">Cancelar</a> </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-success hide" id="ResetSuccess"> We&#39;ve sent you an email with a link to update your password. </div>
    </main>
    <?php
    include("includes/layout/footp.php");
    ?>
