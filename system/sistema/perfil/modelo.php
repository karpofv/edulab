<?php
$cursos_comp = 0;
$nombres = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$oficio = $_POST['oficio'];
$me = $_POST['about'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$fecnac = $_POST['fecha'];
$editar = $_POST['editar'];
if($editar==1){
    paraTodos::arrayUpdate("per_nombres='$nombres', per_apellidos='$apellidos', per_oficio='$oficio', per_about='$me', per_telefono='$telefono', per_correo='$correo', per_fecnac='$fecnac'", "persona", "per_codigo=$_SESSION[codido_persona]");
}
$consul_datos_per = paraTodos::arrayConsulta("*", "persona", "per_codigo=$_SESSION[codido_persona]");
foreach($consul_datos_per as $post){
        $nombres = $post['per_nombres'];
        $apellidos = $post['per_apellidos'];
        $oficio = $post['per_oficio'];
        $me = $post['per_about'];
        $telefono = $post['per_telefono'];
        $correo = $post['per_correo'];
        $fecnac = $post['per_fecnac'];
    }
?>