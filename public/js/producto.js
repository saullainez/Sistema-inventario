function modalEditarProducto(id, ProductoNombre, ProductoDescripcion, TipoBebida){
    $("#nuevoNombre").val(ProductoNombre);
    $("#NuevaDescripcion").val(ProductoDescripcion);
    $("#nuevoTipo").val(TipoBebida);
    $("#actualizarProducto").attr('onClick', `actualizarProducto(${id})`);
    $("#actualizarProductoModal").modal();
    
};
function modalEliminarProducto(id){
    $("#borrarProducto").attr('onClick', `eliminarProducto(${id})`);
    $("#eliminarProductoModal").modal();
};
function cargarProductos(){
    $.ajax({
        url: `/obtenerproductos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaProducto").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaProducto").append(`
                <tr>
                    <td>${res[i].ProductoId}</td>
                    <td>${res[i].ProductoNombre}</td>
                    <td>${res[i].ProductoDescripcion}</td>
                    <td>${res[i].TipoBebida}</td>
                    <td><a onclick="modalEditarProducto(${res[i].ProductoId}, '${res[i].ProductoNombre}', '${res[i].ProductoDescripcion}', '${res[i].TipoBebidaId}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarProducto(${res[i].ProductoId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function cargarTipoBebida(){
    $.ajax({
        url: `/obtenertipobebida`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tipo").html(" ");
            $("#nuevoTipo").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tipo").append(`
                <option value="${res[i].TipoBebidaId}"><td>${res[i].nombre}</td></option>`);
                $("#nuevoTipo").append(`
                <option value="${res[i].TipoBebidaId}"><td>${res[i].nombre}</td></option>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function crearProducto() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        ProductoNombre: $("#nombre").val(),
        ProductoDescripcion: $("#descripcion").val(),
        TipoBebidaId: $("#tipo").val()
    };
    $.ajax({
        url: `/producto`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarProductos();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function actualizarProducto(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        ProductoId: id,
        ProductoNombre: $("#nuevoNombre").val(),
        ProductoDescripcion: $("#NuevaDescripcion").val(),
        TipoBebidaId: $("#nuevoTipo").val()
    };
    $.ajax({
        url: `/actualizarproducto`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarProductos();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function eliminarProducto(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarproducto`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarProductos();
        },
        error: function(error){
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#producto").addClass("active");
    $("#productoMenu").addClass("active");
    cargarProductos();
    cargarTipoBebida();
});