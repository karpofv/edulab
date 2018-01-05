$('#usuarios').DataTable({
    "language": {
        "url": "<?php echo $ruta_base;?>/assets/widgets/datatable/Spanish.json"
    }
});
  $(document).ready(function() {
    $('select').material_select();
  });