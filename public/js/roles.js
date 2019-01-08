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
                    <td><a onclick="modalEditarRol(${res[i].id}, '${res[i].name}', '${res[i].slug}', '${res[i].description}', '${res[i].special}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarRol(${res[i].id});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}

function crearRol() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        name: $("#nombre").val(),
        slug: $("#slug").val(),
        description: $("#descripcion").val(),
        special: $("#especial").val()
    };
    $.ajax({
        url: `/roles`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarRoles();
        },
        error: function (error) {
            console.error(error);
        }
    });
};

$(document).ready(function () {
    $("#roles").addClass("active");
    cargarRoles();
})