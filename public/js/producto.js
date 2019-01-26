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
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
            limpiar();
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
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
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
            reload();
        },
        error: function(error){
            console.error(error);
        }
    });
};
function reload() {
    $('#tablaProducto').DataTable().ajax.reload();
    $("#actProducto").attr("disabled", "true");
    $("#elProducto").attr("disabled", "true");
}
function limpiar(){
    $('.form-control').val(' ');
    $('.form-control').val($('.form-control').val().replace(' ', ''));
}
$(document).ready(function () {
    $('.input-crear').on('keyup', function(){
        if($('#nombre').val().length == 0 || $('#descripcion').val().length == 0){
            $("#btn-crear").attr("disabled", "true");
        }else{
            $("#btn-crear").removeAttr("disabled");
        }
    });
    $('.input-editar').on('keyup', function(){
        if($('#nuevoNombre').val().length == 0 || $('#NuevaDescripcion').val().length == 0){
            $("#actualizarProducto").attr("disabled", "true");
        }else{
            $("#actualizarProducto").removeAttr("disabled");
        }
    });
    $('#tablaProducto').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenerproductos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "ProductoId" },
            { "data": "ProductoNombre" },
            { "data": "ProductoDescripcion" },
            { "data": "TipoBebida" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaProducto').dataTable().api();
    
    $('#tablaProducto').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actProducto").attr("disabled", "true");
            $("#elProducto").attr("disabled", "true");
        }
        else{
            $("#actProducto").removeAttr("disabled");
            $("#elProducto").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actProducto").attr('onClick', `modalEditarProducto(${data.ProductoId}, '${data.ProductoNombre}', '${data.ProductoDescripcion}', '${data.TipoBebidaId}')`);
        $("#elProducto").attr('onClick', `modalEliminarProducto(${data.ProductoId})`);
    });
    $("#producto").addClass("active");
    $("#productoMenu").addClass("active");
    cargarTipoBebida();
});