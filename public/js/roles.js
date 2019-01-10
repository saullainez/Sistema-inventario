function modalEditarRol(id, nombre, slug, desc, especial){
    $("#nuevoNombre").val(nombre);
    $("#nuevoSlug").val(slug);
    $("#nuevaDescripcion").val(desc);
    $("#nuevoEspecial").val(especial);
    $("#actualizarRol").attr('onClick', `actualizarRol(${id})`);
    $("#editarRolModal").modal();
};
function modalEliminarRol(id){
    $("#borrarRol").attr('onClick', `eliminarRol(${id})`);
    $("#eliminarRolModal").modal();
};
function modalAgregarPermisoRol(id){
    $("#agregarPermisoRolModal").modal();
    $("#agregarPermiso").attr('onClick', `agregarPermiso(${id})`);
}
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
                    <td><a onclick="modalEditarRol(${res[i].id}, '${res[i].name}', '${res[i].slug}', '${res[i].description}', '${res[i].special}');" class="btn btn-sm btn-default" style="padding: 0.5rem 0.8rem;">Editar</a></td>
                    <td><a onclick="cargarPermisosDeRol(${res[i].id});" class="btn btn-sm btn-default" style="width: 7.62rem; padding: 0.5rem 0.8rem;">Ver permisos</a></td>
                    <td><a onclick="modalAgregarPermisoRol(${res[i].id});" class="btn btn-sm btn-default" style="width: 8.736rem; padding: 0.5rem 0.8rem;">Añadir permisos</a></td>
                    <td><a onclick="modalEliminarRol(${res[i].id});" class="btn btn-sm btn-danger" style="padding: 0.5rem 0.8rem;">Eliminar</a></td>
                </tr>`);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
};

function agregarPermiso(id){
    var permisos = [];
    $("input[type=checkbox]:checked").each(function(){
        permisos.push(this.value);
    });
    var tokenAP = $("#tokenAP").val();
    var data = {
        id: id,
        permissions: permisos
    };
    $.ajax({
        url: `/agregarpermisorol`,
        headers: {'X-CSRF-TOKEN': tokenAP},
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

function cargarPermisos(){
    $.ajax({
        url: `/obtenerpermisos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#listaPermisos").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#listaPermisos").append(`
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

function cargarPermisosDeRol(id){
    var data = {
        id: id
    };
    $.ajax({
        url: `/obtenerpermisorol`,
        method: "GET",
        data: data,
        dataType: "json",
        success: function (res) {
            $("#verPermisos").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#verPermisos").append(`
                    <h4>${res[i]}</h4>`);
            };
            $("#verPermisoRolModal").modal();
        },
        error: function (error) {
            console.error(error);
        }
    });
};

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

function actualizarRol(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        id: id,
        name: $("#nuevoNombre").val(),
        slug: $("#nuevoSlug").val(),
        description: $("#nuevaDescripcion").val(),
        special: $("#nuevoEspecial").val()
    };
    $.ajax({
        url: `/actualizarrol`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
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

function eliminarRol(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarrol`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarRoles();
        },
        error: function(error){
            console.error(error);
        }
    });
};

$(document).ready(function () {
    $("#roles").addClass("active");
    cargarRoles();
    cargarPermisos();
})