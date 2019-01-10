function cargarActivo(){
    $.ajax({
        url: `/obteneractivos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaActivo").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaActivo").append(`
                <tr>
                    <td>${res[i].ActivoId}</td>
                    <td>${res[i].ActivoNombre}</td>
                    <td>${res[i].ActivoDescripcion}</td>
                    <td>${res[i].TipoActivo}</td>
                    <td><a onclick="modalEditarActivo(${res[i].ActivoId}, '${res[i].ActivoNombre}', '${res[i].ActivoDescripcion}', '${res[i].TipoActivo}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarActivo(${res[i].ActivoId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#activo").addClass("active");
    $("#activoMenu").addClass("active");
    cargarActivo();
});