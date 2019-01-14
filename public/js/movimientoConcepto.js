function modalEditarMovimientoConcepto(id,nombre,tipoMovimiento){
    $("#NuevoNombre").val(nombre);
    $("#NuevoTipoMovimiento").val(tipoMovimiento);
    $("#actualizarMovmientoConcepto").attr('onClick',`actualizarMovimiento(${id})`);
    $("#actualizarMovimientoConceptoModal").modal();
}

function modalEliminarMovimientoConcepto(id){
    $("#eliminarMovimientoConcepto").attr('onClick',`eliminarMovimiento(${id})`);
    $("#borrarMovimientoConceptoModal").modal();
}

function cargarMovimientos(){
    $.ajax({
        url:"/obtenermovimientoconceptos",
        method:"GET",
        dataType:"json",
        success: function(res){
            $("#tablaMovimientoConceptos").html(" ");
            for (var i = 0; i < res.length; i++){
                $("#tablaMovimientoConceptos").append(`
                    <tr>
                        <td>${res[i].MovimientoConceptoId}</td>
                        <td>${res[i].Nombre}</td>
                        <td>${res[i].TipoMovimiento}</td>
                        <td><a class="btn btn-sm btn-default" onClick="modalEditarMovimientoConcepto(${res[i].MovimientoConceptoId},
                            ${res[i].Nombre},${res[i].TipoMovimiento});">Editar</a></td>
                        <td><a class="btn btn-sm btn-danger" onClick="modalEliminarMovimientoConcepto(${res[i].MovimientoConceptoId});">Eliminar</a></td>
                    </tr>
                `);
            }
        },
        error:function(error){
            console.error(error);
        }
    });
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
            cargarMovimientos();   
        },
        error: function(error){
            console.error(error);
        }
    });
}

function actualizarMovimiento(id){
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        Nombre:$("#NuevoNombre").val(),
        TipoMovimientoId:$("#NuevoTipoMovimiento").val(),
    };

    $.ajax({
        url:"/actualizarmovimientoconcepto",
        headers:{'X-CSRF-TOKEN':tokenEditar},
        data:data,
        method:"PUT",
        dataType:"json",
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
});