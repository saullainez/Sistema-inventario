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

function cargarMovimientos(){

    $.ajax({
        url:'/obtenermovimientoactivos',
        method:"GET",
        dataType:'json',
        success: function (res) {
            $("#tablaMovimientoActivos").html(" ");
            for(var i = 0; i < res.length; i++){
                $("#tablaMovimientoActivos").append(
                    `<tr>
                        <td>${res[i].MovimientoActivoId}</td>
                        <td>${res[i].ActivoNombre}</td>
                        <td>${res[i].Descripcion}</td>
                        <td>${res[i].Fecha}</td>
                        <td>${res[i].Cantidad}</td>
                        <td>${res[i].Monto}</td>
                        <td>${res[i].EmpresaNombre}</td>
                        <td>${res[i].Nombre}</td>
                        <td><a class="btn btn-sm btn-default" onClick="modalEditarMovimiento(${res[i].MovimientoActivoId},${res[i].ActivoId},'${res[i].Descripcion}',
                            '${res[i].Fecha}',${res[i].Cantidad},
                            ${res[i].Monto},${res[i].ProveedorId},
                            ${res[i].MovimientoConceptoId})">Editar</a></td>
                        <td><a class="btn btn-sm btn-danger" onClick="modalEliminarMovimientoActivo(${res[i].MovimientoActivoId})">Eliminar</a></td>

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
            console.log(res);
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
    cargarProveedores();
    cargarActivos();
    cargarConceptos();
});
