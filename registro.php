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
                            <form method="post" action="/account" id="create_customer" accept-charset="UTF-8">
                                <input type="hidden" value="create_customer" name="form_type" />
                                <input type="hidden" name="utf8" value="✓" />
                                <h4 class="center">Crear cuenta</h4>
                                <div class="input-field">
                                    <label for="FirstName"> Nombres </label>
                                    <input type="text" name="customer[first_name]" id="FirstName" autofocus> </div>
                                <div class="input-field">
                                    <label for="LastName"> Apellidos </label>
                                    <input type="text" name="customer[last_name]" id="LastName"> </div>
                                <div class="input-field">
                                    <label for="Email"> Correo electrónico </label>
                                    <input type="email" name="customer[email]" id="Email" class="" value="" spellcheck="false" autocomplete="off" autocapitalize="off"> </div>
                                <div class="input-field">
                                    <label for="CreatePassword"> Contraseña </label>
                                    <input type="password" name="customer[password]" id="CreatePassword" class=""> </div>
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
