function controler(xdata, xventana, xsuccess) {
    $.ajax({
        url: 'control.php'
        , type: 'POST'
        , data: xdata
        , ajaxSend: $('#' + xventana).html(cargando)
        , success: function (html) {
            $('#'+xventana).html(html);
            xsuccess;
        }
    });
}
function cerrar(){
    $("#ventanaVer").html("");
}
var cargando = '<center><img style="margin-top: 10px;height:30px;width:30px;" src="../assets/img/cargando.gif" border="0"> Cargando...</center>';
