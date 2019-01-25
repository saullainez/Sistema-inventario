function modalEditarMovimientoActivo(id,activoId,Descripcion,fecha,
    cantidad,monto,proveedor,movimientoConceptoId){
        $("#NuevoActivoId").val(activoId);
        $("#NuevaDescripcion").val(Descripcion);
        $("#NuevaFecha").val(fecha);
        $("#NuevaCantidad").val(cantidad);
        $("#NuevoMonto").val(monto);
        $("#NuevoProveedor").val(proveedor);
        $("#NuevoConcepto").val(movimientoConceptoId);
        $("#actualizarMovimientoActivo").attr('onClick',`actualizarMovimiento(${id})`);
        $("#actualizarMovimientoActivoModal").modal();
};

function modalEliminarMovimientoActivo(id){
    $("#borrarMovimientoActivo").attr('onClick',`eliminarMovimiento(${id})`);
    $("#eliminarMovimientoActivoModal").modal();
}

//funcion que deberia cagar en un select los proveedores
function cargarProveedores(){
    $.ajax({
        url:"/proveedor",
        method:"GET",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#proveedorId").html(" ");
            $("#NuevoProveedor").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#proveedorId").append(`
                    <option value="${res[i].EmpresaId}">${res[i].EmpresaNombre}</option>
                `);
                $("#NuevoProveedor").append(`
                <option value="${res[i].EmpresaId}">${res[i].EmpresaNombre}</option>
            `);
            }
        },
        error: function(error){
            console.error(error);
        }
    });
}

function cargarActivos(){
    $.ajax({
        url:"/obteneractivos",
        method:"GET",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#activoId").html(" ");
            $("#NuevoActivoId").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#activoId").append(`
                    <option value="${res[i].ActivoId}">${res[i].ActivoNombre}</option>
                `);
                $("#NuevoActivoId").append(`
                <option value="${res[i].ActivoId}">${res[i].ActivoNombre}</option>
            `);
            }
        },
        error: function(error){
            console.error(error);
        }
    });
}
function cargarConceptos(){
    $.ajax({
        url:"/obtenermovimientoconceptos",
        method:"GET",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#movimientoConceptoId").html(" ");
            $("#NuevoConcepto").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#movimientoConceptoId").append(`
                    <option value="${res[i].MovimientoConceptoId}">${res[i].Nombre}</option>
                `);
                $("#NuevoConcepto").append(`
                <option value="${res[i].MovimientoConceptoId}">${res[i].Nombre}</option>
            `);
            }
        },
        error: function(error){
            console.error(error);
        }
    });
}

function crearMovimientoActivo(){
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        ActivoId : $("#activoId").val(),
        Descripcion : $("#descripcion").val(),
        Fecha : $("#fecha").val(),
        Cantidad : $("#cantidad").val(),
        Monto : $("#monto").val(),
        ProveedorId : $("#proveedorId").val(),
        MovimientoConceptoId : $("#movimientoConceptoId").val()
    };
    
    $.ajax({
        url:"/movimiento-activo",
        headers:{'X-CSRF-TOKEN':tokenAgregar},
        method:"POST",
        data:data,
        dataType:"json",
        success:function(res){
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
            $('.form-control').val(' ');
        },
        error:function(error){
            console.error(error);
        }
    });

}

function actualizarMovimiento(id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        MovimientoActivoId : id,
        ActivoId : $("#NuevoActivoId").val(),
        Descripcion : $("#NuevaDescripcion").val(),
        Fecha : $("#NuevaFecha").val(),
        Cantidad : $("#NuevaCantidad").val(),
        Monto : $("#NuevoMonto").val(),
        ProveedorId : $("#NuevoProveedor").val(),
        MovimientoConceptoId : $("#NuevoConcepto").val()
    };
    $.ajax({
        url:"/actualizarmovimientoactivo",
        headers:{'X-CSRF-TOKEN':tokenEditar},
        method:"PUT",
        data:data,
        dataType:"json",
        success:function(res){
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
        },
        error:function(error){
            console.error(error);
        }
    });

}

function eliminarMovimiento(id){

    var tokenEliminar = $("#tokenEliminar").val();
    data = {MovimientoActivoId:id};

    $.ajax({
        url: `/eliminarmovimientoactivo`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            console.log(res);
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
    $('#tablaMovimientoActivos').DataTable().ajax.reload();
    $("#actMovimientoActivo").attr("disabled", "true");
    $("#elMovimientoActivo").attr("disabled", "true");
}

$(document).ready(function () {
    $('#tablaMovimientoActivos').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenermovimientoactivos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "MovimientoActivoId" },
            { "data": "ActivoNombre" },
            { "data": "Descripcion" },
            { "data": "Fecha" },
            { "data": "Cantidad" },
            { "data": "Monto" },
            { "data": "EmpresaNombre" },
            { "data": "Nombre" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaMovimientoActivos').dataTable().api();
    
    $('#tablaMovimientoActivos').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actMovimientoActivo").attr("disabled", "true");
            $("#elMovimientoActivo").attr("disabled", "true");
        }
        else{
            $("#actMovimientoActivo").removeAttr("disabled");
            $("#elMovimientoActivo").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actMovimientoActivo").attr('onClick', `modalEditarMovimientoActivo(${data.MovimientoActivoId},${data.ActivoId},'${data.Descripcion}',
        '${data.Fecha}',${data.Cantidad},
        ${data.Monto},${data.ProveedorId},
        ${data.MovimientoConceptoId})`);
        $("#elMovimientoActivo").attr('onClick', `modalEliminarMovimientoActivo(${data.MovimientoActivoId})`);
    });
    $("#movimientos").addClass("active");
    $("#movimientosMenu").addClass("active");
    cargarProveedores();
    cargarActivos();
    cargarConceptos();
});
