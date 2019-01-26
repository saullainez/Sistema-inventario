function modalEditarMovimientoConcepto(id,nombre,tipoMovimiento){
    $("#nuevoNombre").val(nombre);
    $("#nuevoTipoMovimiento").val(tipoMovimiento);
    $("#actualizarMovmientoConcepto").attr('onClick',`actualizarMovimiento(${id})`);
    $("#actualizarMovimientoConceptoModal").modal();
}

function modalEliminarMovimientoConcepto(id){
    $("#borrarMovimientoConceptoModal").attr('onClick',`eliminarMovimiento(${id})`);
    $("#eliminarMovimientoConcepto").modal();
}

function crearMovimientoConcepto(){
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        Nombre:$("#nombre").val(),
        TipoMovimiento:$("#tipoMovimiento").val(),
    };

    $.ajax({
        url:"/movimiento-concepto",
        headers:{'X-CSRF-TOKEN':tokenAgregar},
        data:data,
        method:"POST",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();   
            limpiar();
        },
        error: function(error){
            console.error(error);
        }
    });
}

function actualizarMovimiento(id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        MovimientoConceptoId:id,
        Nombre:$("#nuevoNombre").val(),
        TipoMovimiento:$("#nuevoTipoMovimiento").val(),
    };

    $.ajax({
        url:"/actualizarmovimientocontepto",
        headers:{'X-CSRF-TOKEN':tokenEditar},
        data:data,
        method:"PUT",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();   
            limpiar();
        },
        error: function(error){
            console.error(error);
        }
    });
}


function eliminarMovimiento(id){
    var tokenEliminar = $("#tokenEliminar").val();
    data = {MovimientoConceptoId:id};
    $.ajax({
        url: `/eliminarmovimientoconcepto`,
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
}
function reload() {
    $('#tablaMovimientoConceptos').DataTable().ajax.reload();
    $("#actMovimientoConcepto").attr("disabled", "true");
    $("#elMovimientoConcepto").attr("disabled", "true");
}
function limpiar(){
    $('.form-control').val(' ');
    $('.form-control').val($('.form-control').val().replace(' ', ''));
}

$(document).ready(function () {
    $('.input-crear').on('keyup', function(){
        if($('#nombre').val().length == 0){
            $("#btn-crear").attr("disabled", "true");
        }else{
            $("#btn-crear").removeAttr("disabled");
        }
    });
    $('.input-editar').on('keyup', function(){
        if($('#nuevoNombre').val().length == 0){
            $("#actualizarMovmientoConcepto").attr("disabled", "true");
        }else{
            $("#actualizarMovmientoConcepto").removeAttr("disabled");
        }
    });
    $('#tablaMovimientoConceptos').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenermovimientoconceptos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "MovimientoConceptoId" },
            { "data": "Nombre" },
            { "data": "TipoMovimiento" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaMovimientoConceptos').dataTable().api();
    
    $('#tablaMovimientoConceptos').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actMovimientoConcepto").attr("disabled", "true");
            $("#elMovimientoConcepto").attr("disabled", "true");
        }
        else{
            $("#actMovimientoConcepto").removeAttr("disabled");
            $("#elMovimientoConcepto").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actMovimientoConcepto").attr('onClick', `modalEditarMovimientoConcepto(${data.MovimientoConceptoId}, '${data.Nombre}','${data.TipoMovimiento}')`);
        $("#elMovimientoConcepto").attr('onClick', `modalEliminarMovimientoConcepto(${data.MovimientoConceptoId})`);
    });
    $("#movimientos").addClass("active");
    $("#movimientosMenu").addClass("active");
});