$(document).ready(function() {
    $('#tablaCategorias').DataTable({
        "pageLength": 10,
        "lengthMenu": [10, 25, 30, 50],
        "language": {
            "search": "Buscar categoría:",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});
