function cargarProductos(){
    $.ajax({
        url: `/obtenerproductos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaProducto").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaProducto").append(`
                <tr>
                    <td>${res[i].ProductoId}</td>
                    <td>${res[i].ProductoNombre}</td>
                    <td>${res[i].ProductoDescripcion}</td>
                    <td>${res[i].TipoBebida}</td>
                    <td><a onclick="modalEditarProducto(${res[i].ProductoId}, '${res[i].ProductoNombre}', '${res[i].ProductoDescripcion}', '${res[i].TipoBebida}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarProducto(${res[i].ProductoId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#producto").addClass("active");
    $("#productoMenu").addClass("active");
    cargarProductos();
});