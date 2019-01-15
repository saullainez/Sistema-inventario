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

function cargarMovimientos(){

    $.ajax({
        url:"/obtenermovimientoproductos",
        method:"GET",
        dataType:"json",
        success:function(res){
            $("#tablaMovimientoProductos").html(" ");
            for(var i = 0; i < res.length; i++){
               $("#tablaMovimientoProductos").append(`
                    <tr>
                        <td>${res[i].MovimientoProductoId}</td>
                        <td>${res[i].PresentacionId}</td>
                        <td>${res[i].Descripcion}</td>
                        <td>${res[i].Fecha}</td>
                        <td>${res[i].AnioCosecha}</td>
                        <td>${res[i].Cantidad}</td>
                        <td>${res[i].EmpresaNombre}</td>
                        <td>${res[i].MovimientoConceptoNombre}</td>
                        <td>${res[i].Monto}</td>
                        <td><a class="btn btn-sm btn-default" onClick="modalEditarMovimientoProducto(${res[i].MovimientoProductoId},
                            ${res[i].PresentacionId},${res[i].Descripcion},${res[i].Fecha},
                            ${res[i].AnioCosecha}, ${res[i].Cantidad},${res[i].ClienteId},
                            ${res[i].MovimientoConceptoId},${res[i].Monto});">
                        Editar</a><td>
                        <td><a class="btn btn-sm btn-danger" onClick="modalEliminarMovimientoProducto(${res[i].MovimientoProductoId});">eliminar</a></td>
                    </tr>
               `); 
            }
        },
        error:function(error){
            console.error(error);
        }
    });
}

function cargarPresentaciones(){
    $.ajax({
        url:"/obtenerpresentaciones",
        method:"GET",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#presentacionId").html(" ");
            //$("#nuevapresentacionId").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#presentacionId").append(`
                    <option value="${res[i].PresentacionId}">${res[i].envase}</option>
                `);
                /*$("#nuevapresentacionId").append(`
                <option value="${res[i].PresentacionId}">${res[i].envase}</option>
            `)*/;
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
            for(var i = 0; i< res.length; i++){
                $("#cliente").append(`
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
            //$("#NuevoConcepto").html(" ");
            for(var i = 0; i< res.length; i++){
                $("#movimientoConceptoId").append(`
                    <option value="${res[i].MovimientoConceptoId}">${res[i].Nombre}</option>
                `);
                /*$("#NuevoConcepto").append(`
                <option value="${res[i].MovimientoConceptoId}">${res[i].Nombre}</option>
            `);*/
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
            cargarMovimientos();   
        },
        error:function(error){
            console.error(error);
        }
    });
}

function actualizarMovimiento($id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        PresentacionId: $("#NuevapresentacionId").val(),
        Descripcion: $("#NuevaDescripcion").val(),
        Fecha: $("#NuevaFecha"),
        AnioCosecha: $("#NuevoAnio").val(),
        Cantidad:$("#NuevaCantidad"),
        ClienteId:$("#NuevoCiente"),
        MovimientoConceptoId:$("#NuevoConcepto").val(),
        Monto:$("#NuevoMonto")

    };
    $.ajax({
        url:'/actualizarMovimientoProducto',
        headers:{'X-CSRF-TOKEN':tokenEditar},
        data:data,
        method:"PUT",
        dataType:"json",
        success: function(res){
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res);
            cargarMovimientos(); 
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
            cargarMovimientos();
        },
        error: function(error){
            console.error(error);
        }
    });
}

$(document).ready(function () {
    $("#movimientos").addClass("active");
    $("#movimientosMenu").addClass("active");
    cargarMovimientos();
    cargarPresentaciones();
    cargarConceptos();
    cargarClientes();
});
