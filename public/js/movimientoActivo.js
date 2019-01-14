function modalEditarMovimiento(id,activoId,Descripcion,fecha,
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
            $("#proveedor").html(" ");
            for(var i = 0; i< res.length; i++){
                $("proveedor").append(`
                    <option value="${res[i].EmpresaId}">${res[i].Empresanombre}</option>
                `);
            }
        },
        error: function(error){
            console.error(error);
        }
    });
}

function cargarMovimientos(){

    $.ajax({
        url:'/obtenermovimientoactivos',
        method:"GET",
        dataType:'json',
        success: function (res) {
            $("tablaMovimientoActivos").html(" ");
            for(var i = 0; i < res.length; i++){
                $("#tablaMovimientoActivos").append(
                    `<tr>
                        <td>${res[i].MovimientoActivoId}</td>
                        <td>${res[i].ActivoId}</td>
                        <td>${res[i].ActivoNombre}</td>
                        <td>${res[i].Descripcion}</td>
                        <td>${res[i].Fecha}</td>
                        <td>${res[i].Cantidad}</td>
                        <td>${res[i].Monto}</td>
                        <td>${res[i].ProveedorId}</td>
                        <td>${res[i].EmpresaNombre}</td>
                        <td>${res[i].MovimientoConceptoId}</td>
                        <td>${res[i].Nombre}</td>
                        <td><a onClick="modalEditarMovimiento(${res[i].MovimientoActivoId},${res[i].ActivoId},${res[i].Descripcion},
                            ${res[i].Fecha},${res[i].Cantidad},
                            ${res[i].Monto},${res[i].ProveedorId},
                            ${res[i].movimientoConceptoId})">
                        <td><a onClick="modalEliminarMovimientoActivo(${res[i].movimientoActivoId})"></td>

                    </tr>`
                )
            }
        },
        error:function(error){
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
        MovimientoConceptoId : $("movimientoConceptoId").val()
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
            cargarMovimientos();
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
            cargarMovimientos();
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
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarMovimientos();
        },
        error: function(error){
            console.error(error);
        }
    });
}
