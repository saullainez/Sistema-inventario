function modalEditarActivo(id, ActivoNombre, ActivoDescripcion, TipoActivo){
    $("#nombreNuevo").val(ActivoNombre);
    $("#descripcionNueva").val(ActivoDescripcion);
    $("#nuevo").val(TipoActivo);
    $("#actualizarActivo").attr('onClick', `actualizarActivo(${id})`);
    $("#editarActivoModal").modal();
    
};
function cargarActivos(){
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
function crearActivo() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        ActivoNombre: $("#nombre").val(),
        ActivoDescripcion: $("#descripcion").val(),
        TipoActivo: $("#tipo").val()
    };
    $.ajax({
        url: `/activo`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarActivos();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function actualizarActivo(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        ActivoId: id,
        ActivoNombre: $("#nombreNuevo").val(),
        ActivoDescripcion: $("#descripcionNueva").val(),
        TipoActivo: $("#nuevo").val()
    };
    $.ajax({
        url: `/actualizaractivo`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarActivos();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#activo").addClass("active");
    $("#activoMenu").addClass("active");
    cargarActivos();
});