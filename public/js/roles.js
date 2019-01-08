function cargarRoles(){
    $.ajax({
        url: `/obtenerroles`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaRoles").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaRoles").append(`
                <tr>
                    <td>${res[i].id}</td>
                    <td>${res[i].name}</td>
                    <td>${res[i].slug}</td>
                    <td>${res[i].description}</td>
                    <td>${res[i].special}</td>
                    <td><a onclick="modalEditarRol(${res[i].id}, '${res[i].name}', '${res[i].email}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarRol(${res[i].id});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}
$(document).ready(function () {
    $("#roles").addClass("active");
    cargarRoles();
})