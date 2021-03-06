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
    cargarRoles();
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
        url: `/agregarrol`,
        headers: {'X-CSRF-TOKEN': tokenAR},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            exitoso(res);
        },
        error: function (error) {
            problema(error);
        }
    });
}
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
                        <input type="checkbox" class="custom-control-input input-AR" id="${res[i].id}" value="${res[i].id}">
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
        url: `/obtenerrolsusuario`,
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
            exitoso(res);
        },
        error: function (error) {
            problema(error);
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
        success: function (res) {
            exitoso(res);
        },
        error: function (error) {
            problema(error);
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
        success: function (res) {
            exitoso(res);
        },
        error: function (error) {
            problema(error);
        }
    });
};

function reload() {
    $('#tablaUsuarios').DataTable().ajax.reload();
    $("#actUsuario").attr("disabled", "true");
    $("#elUsuario").attr("disabled", "true");
    $("#VerRolUsuario").attr("disabled", "true");
    $("#AgregarRolUsuario").attr("disabled", "true");
    $("#actUsuarioM").attr("disabled", "true");
    $("#elUsuarioM").attr("disabled", "true");
    $("#VerRolUsuarioM").attr("disabled", "true");
    $("#AgregarRolUsuarioM").attr("disabled", "true");
    $(".btn-crear").attr("disabled", "true");
}

function limpiar() {
    $('.form-control').val(' ');
    $('.form-control').val($('.form-control').val().replace(' ', ''));
}
function exitoso (res){
    $("#alert").removeClass("alert-danger");
    $("#alert").addClass("alert-success");
    $("#alert").show().fadeOut(3000);
    $("#mensaje").html(res.mensaje);
    reload();
    limpiar();
}
function problema (error){
    $("#alert").removeClass("alert-success");
    $("#alert").addClass("alert-danger");
    $("#alert").show().fadeOut(5000);
    $("#mensaje").html(error.responseJSON.mensaje);
    limpiar();
}
$(document).ready(function () {
    $('.input-crear').on('keyup', function(){
        if($('#pass').val().length == 0 || $('#email').val().length == 0 || $('#nombre').val().length == 0){
            $(".btn-crear").attr("disabled", "true");
        }else{
            $(".btn-crear").removeAttr("disabled");
        }
    });
    $('.input-editar').on('keyup', function(){
        if($('#emailNuevo').val().length == 0 || $('#nombreNuevo').val().length == 0){
            $("#actualizarUsuario").attr("disabled", "true");
        }else{
            $("#actualizarUsuario").removeAttr("disabled");
        }
    });
    $('#listaRoles').on( 'click', '.input-AR', function () {
        if($( "input:checked" ).length == 0){
            $("#agregarRol").attr("disabled", "true");
        }
        else{
            $("#agregarRol").removeAttr("disabled");
        }
    });

    

    limpiar();
    $('#tablaUsuarios').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenerusuarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    var tabla = $('#tablaUsuarios').dataTable().api();
    
    $('#tablaUsuarios').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actUsuario").attr("disabled", "true");
            $("#elUsuario").attr("disabled", "true");
            $("#VerRolUsuario").attr("disabled", "true");
            $("#AgregarRolUsuario").attr("disabled", "true");
            $("#actUsuarioM").attr("disabled", "true");
            $("#elUsuarioM").attr("disabled", "true");
            $("#VerRolUsuarioM").attr("disabled", "true");
            $("#AgregarRolUsuarioM").attr("disabled", "true");
        }
        else{
            $("#actUsuario").removeAttr("disabled");
            $("#elUsuario").removeAttr("disabled");
            $("#VerRolUsuario").removeAttr("disabled");
            $("#AgregarRolUsuario").removeAttr("disabled");
            $("#actUsuarioM").removeAttr("disabled");
            $("#elUsuarioM").removeAttr("disabled");
            $("#VerRolUsuarioM").removeAttr("disabled");
            $("#AgregarRolUsuarioM").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actUsuario").attr('onClick', `modalEditarUsuario(${data.id}, '${data.name}', '${data.email}')`);
        $("#elUsuario").attr('onClick', `modalEliminarUsuario(${data.id})`);
        $("#VerRolUsuario").attr('onClick', `cargarRolesDeUsuario(${data.id})`);
        $("#AgregarRolUsuario").attr('onClick', `modalAgregarRolUsuario(${data.id})`);
        $("#actUsuarioM").attr('onClick', `modalEditarUsuario(${data.id}, '${data.name}', '${data.email}')`);
        $("#elUsuarioM").attr('onClick', `modalEliminarUsuario(${data.id})`);
        $("#VerRolUsuarioM").attr('onClick', `cargarRolesDeUsuario(${data.id})`);
        $("#AgregarRolUsuarioM").attr('onClick', `modalAgregarRolUsuario(${data.id})`);
    });
    $("#usuarios").addClass("active");
    $("#usuariosMenu").addClass("active");
})