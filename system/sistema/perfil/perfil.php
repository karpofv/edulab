<div id="profile-page" class="section">
    <!-- profile-page-header -->
    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?php echo $ruta_base?>/assets/img/23.png" alt="user background">
        </div>
        <figure class="card-profile-image">
            <img src="<?php echo $ruta_base;?>/assets/img/avatar/<?php echo $FOTO;?>" alt="profile image" class="circle z-depth-2 responsive-img activator gradient-45deg-light-blue-cyan gradient-shadow">
        </figure>
        <div class="card-content">
            <div class="row pt-2">
                <div class="col s12 m3 offset-m2">
                    <h4 class="card-title grey-text text-darken-4">
                        <?php echo $apellidos." ".$nombres;?>
                    </h4>
                    <p class="medium-small grey-text">
                        <?php echo $oficio;?>
                    </p>
                </div>
                <div class="col s12 m2 center-align">
                </div>
                <div class="col s12 m2 center-align">
                </div>
                <div class="col s12 m2 center-align">
                </div>
                <div class="col s12 m1 right-align">
                    <a class="btn-floating activator waves-effect waves-light rec accent-2 right">
                        <i class="material-icons">perm_identity</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-reveal">
            <p>
                <span class="card-title grey-text text-darken-4"><?php echo $apellidos." ".$nombres;?>
                      <i class="material-icons right">close</i>
                    </span>
                <span>
                      <i class="material-icons cyan-text text-darken-2">perm_identity</i><?php echo $oficio;?></span>
            </p>
            <p>
                <?php echo $me;?>
            </p>
            <p>
                <i class="material-icons cyan-text text-darken-2">perm_phone_msg</i>
                <?php echo $telefono;?>
            </p>
            <p>
                <i class="material-icons cyan-text text-darken-2">email</i>
                <?php echo $correo;?>
            </p>
            <p>
                <i class="material-icons cyan-text text-darken-2">cake</i>
                <?php echo paraTodos::convertDate($fecnac);?>
            </p>
            <button type="button" class="btn" onclick="editar();">Editar</button>
        </div>
    </div>
</div>
<div id="profile-page-edit" class="section" style="display:none;">
    <!-- profile-page-header -->
    <div id="profile-page-header" class="card">
        <div class="card-content">
            <hr>
            <hr>
            <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&nombre='+$('#nombre').val()+'&apellido='+$('#apellido').val()+'&telefono='+$('#telefono').val()+'&correo='+$('#correo').val()+'&fecha='+$('#fecha').val()+'&oficio='+$('#oficio').val()+'&about='+$('#about').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                <div class="row">
                    <div class="col s12 l6" style="display: block;">
                        <label class="control-label" for="nombre">Nombres</label>
                        <input class="form-control" id="nombre" type="text" value="<?php echo $nombres;?>" required> </div>
                    <div class="col s12 l6" style="display: block;">
                        <label class="control-label" for="apellido">Apellidos</label>
                        <input class="form-control" id="apellido" type="text" value="<?php echo $apellidos;?>" required> </div>
                    <div class="col s12 l5" style="display: block;">
                        <label class="control-label" for="telefono">Telefono</label>
                        <input class="form-control" id="telefono" type="tel" value="<?php echo $telefono;?>" required> </div>
                    <div class="col s12 l5" style="display: block;">
                        <label class="control-label" for="correo">Correo</label>
                        <input class="form-control" id="correo" type="email" value="<?php echo $correo;?>" required> </div>
                    <div class="col s12 l2" style="display: block;">
                        <label class="control-label" for="fecha">Fecha de nacimiento</label>
                        <input class="form-control" id="fecha" type="date" value="<?php echo $fecnac;?>" required> </div>
                    <div class="col s12 l12" style="display: block;">
                        <label class="control-label" for="oficio">Oficio</label>
                        <input class="form-control" id="oficio" type="text" value="<?php echo $oficio;?>" required> </div>
                    <div class="col s12 l12" style="display: block;">
                        <label class="control-label" for="about">Acerca de mi</label>
                        <textarea class="form-control" id="about"><?php echo $me;?></textarea> </div>
                </div>
                <div class="row">
                    <div class="col s2 push-s5">
                        <br>
                        <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
                </div>
            </form>
        </div>
    </div>
</div>