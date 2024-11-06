$(document).ready(function() {
    $.ajax({
        url: "ajax/marca.ajax.php",
        method: "POST",
        data: { mostrarMarcas: true },
        dataType: "json",
        success: function(response) {
            let selectMarca = $("#nuevaMarca");
            response.forEach(function(marca) {
                selectMarca.append(new Option(marca.nombre, marca.id_marca));
            });
        }
    });
});
