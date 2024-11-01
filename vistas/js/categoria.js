// Llenar formulario de edición con datos de la categoría seleccionada
$(".tablas").on("click", ".btnEditarCategoria", function() {
    var idCategoria = $(this).attr("idCategoria");

    // Realizar una petición AJAX para obtener los datos de la categoría
    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categoria.ajax.php", // Archivo que procesa la petición
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarCategoria").val(respuesta["nombre"]);
            $("#idCategoria").val(respuesta["id"]);
            $("#estadoCategoria").val(respuesta["estado"]);
            $("#fechaCategoria").val(respuesta["fecha"]);
        }
    });
});
