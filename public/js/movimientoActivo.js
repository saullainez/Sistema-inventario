function modalEditarMovimiento(id,Descripcion,fecha,
    cantidad,monto,proveedor,movimientoConceptoId){

        $("#NuevaDescripcion").val(Descripcion);
        $("#NuevaFecha").val(fecha);
        $("#NuevaCantidad").val(cantidad);
        $("#NuevoMonto").val(monto);
        $("#NuevoProveedor").val(proveedor);
        $("#NuevoConcepto").val(movimientoConceptoId);
        $("#actualizarMovimientoActivo").attr('onClick',`actualizarMovimiento(${id})`);
        $("#actualizarMovimientoActivoModal").modal();
};

function eliminarMovimientoActivo(id){
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
                        <td><a onClick="modalEditarMovimiento(${res[i].ActivoId},${res[i].Descripcion},${res[i].Fecha},${res[i].Cantidad},${res[i].Monto},${res[i].ProveedorId},${res[i].movimientoConceptoId})">
                    </tr>`
                )
            }
        },
        error:function(error){
            console.error(error);
        }
    });

}
