function modalEditarTipoBebida(id, nombre){
    $("#nombreNuevo").val(nombre);
    $("#actualizarTipoBebida").attr('onClick', `actualizarTipoBebida(${id})`);
    $("#editarTipoBebidaModal").modal();
    
};
function modalEliminarTipoBebida(id){
    $("#borrarTipoBebida").attr('onClick', `eliminarTipoBebida(${id})`);
    $("#eliminarTipoBebidaModal").modal();
};
function crearTipoBebida() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        nombre: $("#nombre").val()
    };
    $.ajax({
        url: `/tipo-bebida`,
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
function actualizarTipoBebida(id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        id: id,
        nombre: $("#nombreNuevo").val(),
    };
    $.ajax({
        url: `/actualizartipobebida`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
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
function eliminarTipoBebida(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminartipobebida`,
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
    $('#tablaTipoBebida').DataTable().ajax.reload();
    $("#actTipoBebida").attr("disabled", "true");
    $("#elTipoBebida").attr("disabled", "true");

}
$(document).ready(function () {
    $('#tablaTipoBebida').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenertipobebida",
            "dataSrc": ""
        },
        "columns": [
            { "data": "TipoBebidaId" },
            { "data": "nombre" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaTipoBebida').dataTable().api();
    
    $('#tablaTipoBebida').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actTipoBebida").attr("disabled", "true");
            $("#elTipoBebida").attr("disabled", "true");
        }
        else{
            $("#actTipoBebida").removeAttr("disabled");
            $("#elTipoBebida").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actTipoBebida").attr('onClick', `modalEditarTipoBebida(${data.TipoBebidaId}, '${data.nombre}')`);
        $("#elTipoBebida").attr('onClick', `modalEliminarTipoBebida(${data.TipoBebidaId})`);
    });
    $("#tb").addClass("active");
    $("#tbMenu").addClass("active");
});