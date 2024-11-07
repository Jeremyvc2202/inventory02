$(".btnEliminarMarca").on("click", function (e) {
    e.preventDefault();
    var url = $(this).attr("href");

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
});
