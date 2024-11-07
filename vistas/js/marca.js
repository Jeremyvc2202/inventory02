$(".btnEditarMarca").on("click", function() {
    var idMarca = $(this).attr("idMarca");
    var descripcion = $(this).closest("tr").find("td:eq(1)").text();

    $("#editarDescripcionMarca").val(descripcion);
    $("#idMarca").val(idMarca);
});
