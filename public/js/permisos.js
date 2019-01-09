function cargarPermisos(){
    $.ajax({
        url: `/obtenerpermisos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaPermisos").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaPermisos").append(`
                <tr>
                    <td>${res[i].id}</td>
                    <td>${res[i].name}</td>
                    <td>${res[i].slug}</td>
                    <td>${res[i].description}</td>
                    <td><a onclick="modalEditarPermiso(${res[i].id}, '${res[i].name}', '${res[i].slug}', '${res[i].description}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarPermiso(${res[i].id});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
};

$(document).ready(function () {
    $("#permisos").addClass("active");
    cargarPermisos();
});