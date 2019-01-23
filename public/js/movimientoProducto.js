function modalEditarMovimientoProducto(id,presentacionId,descripcion,fecha,
    anioCosecha,cantidad,cliente,movimientoConcepto,monto){

        $("#NuevaPresentacionId").val(presentacionId);
        $("#NuevaDescripcion").val(descripcion);
        $("#NuevaFecha").val(fecha);
        $("#NuevoAnio").val(anioCosecha);
        $("#NuevaCantidad").val(cantidad);
        $("#NuevoCliente").val(cliente);
        $("#NuevoConcepto").val(movimientoConcepto);
        $("#NuevoMonto").val(monto);
        $("#actualizarMovimientoProducto").attr("onClick",`actualizarMovimiento(${id})`);
        $("#actualizarMovimientoProductoModal").modal();
}

function modalEliminarMovimientoProducto(id){
    $("#borrarMovimientoProducto").attr("onClick",`eliminarMovimiento(${id})`);
    $("#eliminarMovimientoProductoModal").modal();
}

function cargarPresentaciones(){
    $.ajax({
        url:"/obtenerpresentaciones",
        method:"GET",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#presentacionId").html(" ");
            $("#NuevapresentacionId").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#presentacionId").append(`
                    <option value="${res[i].PresentacionId}">${res[i].producto} ${res[i].envase}</option>
                `);
                $("#NuevapresentacionId").append(`
                <option value="${res[i].PresentacionId}">${res[i].producto} ${res[i].envase}</option>
            `);
            }
        },
        error: function(error){
            console.error(error);
        }
    });
}

function cargarClientes(){
    $.ajax({
        url:"/clientes",
        method:"GET",
        dataType:"json",
        success: function(res){
            $("#cliente").html(" ");
            $("#NuevoCliente").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#cliente").append(`
                    <option value="${res[i].EmpresaId}">${res[i].EmpresaNombre}</option>
                `);
                $("#NuevoCliente").append(`
                <option value="${res[i].EmpresaId}">${res[i].EmpresaNombre}</option>
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

function crearMovimientoProducto(){
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        PresentacionId: $("#presentacionId").val(),
        Descripcion: $("#descripcion").val(),
        Fecha: $("#fecha").val(),
        AnioCosecha: $("#anioCosecha").val(),
        Cantidad:$("#cantidad").val(),
        ClienteId:$("#cliente").val(),
        MovimientoConceptoId:$("#movimientoConceptoId").val(),
        Monto:$("#monto").val()
    };

    $.ajax({
        url:`/movimiento-producto`,
        headers:{'X-CSRF-TOKEN':tokenAgregar},
        data:data,
        dataType:"json",
        method:"POST",
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

function actualizarMovimiento(id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        MovimientoProductoId:id,
        PresentacionId: $("#NuevapresentacionId").val(),
        Descripcion: $("#NuevaDescripcion").val(),
        Fecha: $("#NuevaFecha").val(),
        AnioCosecha: $("#NuevoAnio").val(),
        Cantidad:$("#NuevaCantidad").val(),
        ClienteId:$("#NuevoCliente").val(),
        MovimientoConceptoId:$("#NuevoConcepto").val(),
        Monto:$("#NuevoMonto").val()
    };
    $.ajax({
        url:'/actualizarmovimientoproducto',
        headers:{'X-CSRF-TOKEN':tokenEditar},
        data:data,
        method:"PUT",
        dataType:"json",
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


function eliminarMovimiento(id){

    var tokenEliminar = $("#tokenEliminar").val();
    data = {MovimientoProductoId:id};

    $.ajax({
        url: `/eliminarmovimientoproducto`,
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
    $('#tablaMovimientoProductos').DataTable().ajax.reload();
    $("#actMovimientoProducto").attr("disabled", "true");
    $("#elMovimientoProducto").attr("disabled", "true");
}

$(document).ready(function () {
    $('#tablaMovimientoProductos').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenermovimientoproductos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "MovimientoProductoId" },
            { "data": "PresentacionId" },
            { "data": "Descripcion" },
            { "data": "Fecha" },
            { "data": "AnioCosecha" },
            { "data": "Cantidad" },
            { "data": "EmpresaNombre" },
            { "data": "MovimientoConceptoNombre" },
            { "data": "Monto" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaMovimientoProductos').dataTable().api();
    
    $('#tablaMovimientoProductos').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actMovimientoProducto").attr("disabled", "true");
            $("#elMovimientoProducto").attr("disabled", "true");
        }
        else{
            $("#actMovimientoProducto").removeAttr("disabled");
            $("#elMovimientoProducto").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actMovimientoProducto").attr('onClick', `modalEditarMovimientoProducto(${data.MovimientoProductoId},
            ${data.PresentacionId},'${data.Descripcion}','${data.Fecha}',
            ${data.AnioCosecha}, ${data.Cantidad},${data.ClienteId},
            ${data.MovimientoConceptoId},${data.Monto})`);
        $("#elMovimientoProducto").attr('onClick', `modalEliminarMovimientoProducto(${data.MovimientoProductoId})`);
    });
    $("#movimientos").addClass("active");
    $("#movimientosMenu").addClass("active");
    cargarPresentaciones();
    cargarConceptos();
    cargarClientes();
});
