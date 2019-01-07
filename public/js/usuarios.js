function modalEditarUsuario(id, nombre, correo){
    alert("Editar" + id + nombre + correo);
};
function modalEliminarProyecto(id){
    alert("Eliminar" + id);
};
function cargarUsuarios(){
    $.ajax({
        url: `/obtenerusuarios`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaUsuarios").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaUsuarios").append(`
                <tr>
                    <td>${res[i].id}</td>
                    <td>${res[i].name}</td>
                    <td>${res[i].email}</td>
                    <td><a onclick="modalEditarUsuario(${res[i].id}, '${res[i].name}', '${res[i].email}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarProyecto(${res[i].id});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}
function crearUsuario() {
    var token = $("#token").val();
    var data = {
        name: $("#nombre").val(),
        email: $("#email").val(),
        password: $("#pass").val()
    };
    $.ajax({
        url: `/usuarios`,
        headers: {'X-CSRF-TOKEN': token},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarUsuarios();
        },
        error: function (error) {
            console.error(error);
        }
    });
}

$(document).ready(function () {
    $("#usuarios").addClass("active");
    cargarUsuarios();
})