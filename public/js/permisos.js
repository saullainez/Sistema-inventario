function modalEditarPermiso(id, nombre, slug, desc){
    $("#nuevoNombre").val(nombre);
    $("#nuevoSlug").val(slug);
    $("#nuevaDescripcion").val(desc);
    $("#actualizarPermiso").attr('onClick', `actualizarPermiso(${id})`);
    $("#editarPermisoModal").modal();
};
function modalEliminarPermiso(id){
    $("#borrarPermiso").attr('onClick', `eliminarPermiso(${id})`);
    $("#eliminarPermisoModal").modal();
};
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

function crearPermiso() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        name: $("#nombre").val(),
        slug: $("#slug").val(),
        description: $("#descripcion").val()
    };
    $.ajax({
        url: `/permisos`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarPermisos();
        },
        error: function (error) {
            console.error(error);
        }
    });
};

function actualizarPermiso(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        id: id,
        name: $("#nuevoNombre").val(),
        slug: $("#nuevoSlug").val(),
        description: $("#nuevaDescripcion").val()
    };
    $.ajax({
        url: `/actualizarpermiso`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarPermisos();
        },
        error: function (error) {
            console.error(error);
        }
    });
};

function eliminarPermiso(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarpermiso`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarPermisos();
        },
        error: function(error){
            console.error(error);
        }
    });
};

$(document).ready(function () {
    $("#permisos").addClass("active");
    $("#permisosMenu").addClass("active");
    cargarPermisos();
});