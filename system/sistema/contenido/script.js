$('#tbclase').DataTable({
    "language": {
        "url": "<?php echo $ruta_base;?>/assets/widgets/datatable/Spanish.json"
    }
});
    //CKEditor
    CKEDITOR.replace('tinymce');
    CKEDITOR.config.height = 300;
function mapear(x){
    x = x.replace(/'/g, "%quot;");
    x = x.replace(/"/g, "%#38;");
    x = x.replace(/&/g, "%#37;");
    return x;
}
  $(document).ready(function() {
    $('select').material_select();
  });