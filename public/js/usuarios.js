function modalEditarUsuario(id, nombre, correo){
    $("#nombreNuevo").val(nombre);
    $("#emailNuevo").val(correo);
    $("#actualizarUsuario").attr('onClick', `actualizarUsuario(${id})`);
    $("#editarUsuarioModal").modal();
};
function modalEliminarUsuario(id){
    $("#borrarUsuario").attr('onClick', `eliminarUsuario(${id})`);
    $("#eliminarUsuarioModal").modal();
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
                    <td><a onclick="modalEliminarUsuario(${res[i].id});" class="btn btn-sm btn-danger">Eliminar</a></td>
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
};

function actualizarUsuario(id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        id: id,
        name: $("#nombreNuevo").val(),
        email: $("#emailNuevo").val()
    };
    $.ajax({
        url: `/actualizarusuario`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarUsuarios();
        },
        error: function(error){
            console.error(error);
        }
    });
};

function eliminarUsuario(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarusuario`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarUsuarios();
        },
        error: function(error){
            console.error(error);
        }
    });
};

$(document).ready(function () {
    $("#usuarios").addClass("active");
    cargarUsuarios();
})