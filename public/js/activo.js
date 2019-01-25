function modalEditarActivo(id, ActivoNombre, ActivoDescripcion, TipoActivo){
    $("#nombreNuevo").val(ActivoNombre);
    $("#descripcionNueva").val(ActivoDescripcion);
    $("#nuevo").val(TipoActivo);
    $("#actualizarActivo").attr('onClick', `actualizarActivo(${id})`);
    $("#editarActivoModal").modal();
    
};
function modalEliminarActivo(id){
    $("#borrarActivo").attr('onClick', `eliminarActivo(${id})`);
    $("#eliminarActivoModal").modal();
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
            reload();
            $('.form-control').val(' ');
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
            reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function eliminarActivo(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminaractivo`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
        },
        error: function(error){
            console.error(error);
        }
    });
};
function reload() {
    $('#tablaActivo').DataTable().ajax.reload();
    $("#actActivo").attr("disabled", "true");
    $("#elActivo").attr("disabled", "true");
}
$(document).ready(function () {
    $('#tablaActivo').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obteneractivos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "ActivoId" },
            { "data": "ActivoNombre" },
            { "data": "ActivoDescripcion" },
            { "data": "TipoActivo" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaActivo').dataTable().api();
    
    $('#tablaActivo').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actActivo").attr("disabled", "true");
            $("#elActivo").attr("disabled", "true");
        }
        else{
            $("#actActivo").removeAttr("disabled");
            $("#elActivo").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actActivo").attr('onClick', `modalEditarActivo(${data.ActivoId}, '${data.ActivoNombre}', '${data.ActivoDescripcion}', '${data.TipoActivo}')`);
        $("#elActivo").attr('onClick', `modalEliminarActivo(${data.ActivoId})`);
    });
    $("#activo").addClass("active");
    $("#activoMenu").addClass("active");
});