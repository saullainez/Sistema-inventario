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
function modalAgregarRolUsuario(id){
    $("#agregarRolUsuarioModal").modal();
    $("#agregarRol").attr('onClick', `agregarRol(${id})`);
}
function agregarRol(id){
    var roles = [];
    $("input[type=checkbox]:checked").each(function(){
        roles.push(this.value);
    });
    var tokenAR = $("#tokenAR").val();
    var data = {
        id: id,
        roles: roles
    };
    $.ajax({
        url: `/agregarrolusuario`,
        headers: {'X-CSRF-TOKEN': tokenAR},
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
                    <td><a style="width:7.3rem;"  onclick="cargarRolesDeUsuario(${res[i].id});" class="btn btn-sm btn-default">Ver roles</a></td>
                    <td><a style="width:7.3rem;"  onclick="modalAgregarRolUsuario(${res[i].id});" class="btn btn-sm btn-default">Asignar rol</a></td>
                    <td><a onclick="modalEliminarUsuario(${res[i].id});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function cargarRoles(){
    $.ajax({
        url: `/obtenerroles`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#listaRoles").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#listaRoles").append(`
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="${res[i].id}" value="${res[i].id}">
                        <label class="custom-control-label" for="${res[i].id}">${res[i].name}</label>
                    </div>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function cargarRolesDeUsuario(id){
    var data = {
        id: id
    };
    $.ajax({
        url: `/obtenerrolesusuario`,
        method: "GET",
        data: data,
        dataType: "json",
        success: function (res) {
            $("#verRoles").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#verRoles").append(`
                    <h4>${res[i]}</h4>`);
            };
            $("#verRolUsuarioModal").modal();
            //console.log(res[0]);
        },
        error: function (error) {
            console.error(error);
        }
    });
};
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
    cargarRoles()
})