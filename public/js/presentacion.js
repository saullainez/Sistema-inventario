function modalEditarPresentacion(PresentacionId, producto, envase){
    $("#nuevoProductoP").val(producto);
    $("#nuevoEnvase").val(envase);
    $("#actualizarPresentacion").attr('onClick', `actualizarPresentacion(${PresentacionId})`);
    $("#actualizarPresentacionModal").modal();
    
};
function modalEliminarPresentacion(id){
    $("#borrarPresentacion").attr('onClick', `eliminarPresentacion(${id})`);
    $("#eliminarPresentacionModal").modal();
};
function cargarActivos(){
    $.ajax({
        url: `/obtenerconsumibles`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#envase").html(" ");
            $("#nuevoEnvase").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#envase").append(`
                <option value="${res[i].ActivoId}"><td>${res[i].ActivoNombre}</td></option>`);
                $("#nuevoEnvase").append(`
                <option value="${res[i].ActivoId}"><td>${res[i].ActivoNombre}</td></option>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function cargarProductos(){
    $.ajax({
        url: `/obtenerproductos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#productoP").html(" ");
            $("#nuevoProductoP").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#productoP").append(`
                <option value="${res[i].ProductoId}"><td>${res[i].ProductoNombre}</td></option>);`);
                $("#nuevoProductoP").append(`
                <option value="${res[i].ProductoId}"><td>${res[i].ProductoNombre}</td></option>);`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function crearPresentacion() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        ActivoId: $("#envase").val(),
        ProductoId: $("#productoP").val()
    };
    $.ajax({
        url: `/presentacion`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            verificar(res)
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function actualizarPresentacion(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        pId: id,
        ActivoId: $("#nuevoEnvase").val(),
        ProductoId: $("#nuevoProductoP").val()
    };
    $.ajax({
        url: `/actualizarpresentacion`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            verificarAct(res);
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function eliminarPresentacion(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarpresentacion`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            $("#alert").removeClass("alert-danger");
            $("#alert").addClass("alert-success");
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
    $('#tablaPresentacion').DataTable().ajax.reload();
    $("#actPresentacion").attr("disabled", "true");
    $("#elPresentacion").attr("disabled", "true");
}
function verificar (res){
    var e = {
        mensaje: "Ya existe ese producto final, por favor elija otro"
    };
    if(res[0].error){
        if(res[0].error.indexOf("for key 'PRIMARY'") != -1){
            $("#alert").removeClass("alert-success");
            $("#alert").addClass("alert-danger");
            $("#alert").show().fadeOut(5000);
            $("#mensaje").html(e.mensaje);
        }
    }
    else{
        $("#alert").removeClass("alert-danger");
        $("#alert").addClass("alert-success");
        $("#alert").show().fadeOut(3000);
        $("#mensaje").html(res.mensaje);
        reload();
    }
}
function verificarAct (res){
    var e = {
        mensaje: "Ya existe ese producto final, por favor elija otro"
    };
    if(res.error){
        if(res.error.indexOf("1761 Foreign key constraint for table 'presentaciones'") != -1){
            $("#alert").removeClass("alert-success");
            $("#alert").addClass("alert-danger");
            $("#alert").show().fadeOut(5000);
            $("#mensaje").html(e.mensaje);
        }
    }
    else{
        $("#alert").removeClass("alert-danger");
        $("#alert").addClass("alert-success");
        $("#alert").show().fadeOut(3000);
        $("#mensaje").html(res.mensaje);
        reload();
    }
}
function problema (error){
    $("#alert").removeClass("alert-success");
    $("#alert").addClass("alert-danger");
    $("#alert").show().fadeOut(5000);
    $("#mensaje").html(error.mensaje);
}
$(document).ready(function () {
    $('#tablaPresentacion').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenerpresentaciones",
            "dataSrc": ""
        },
        "columns": [
            { "data": "PresentacionId" },
            { "data": "producto" },
            { "data": "envase" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaPresentacion').dataTable().api();
    
    $('#tablaPresentacion').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actPresentacion").attr("disabled", "true");
            $("#elPresentacion").attr("disabled", "true");
        }
        else{
            $("#actPresentacion").removeAttr("disabled");
            $("#elPresentacion").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actPresentacion").attr('onClick', `modalEditarPresentacion(${data.PresentacionId}, '${data.ProductoId}', '${data.ActivoId}')`);
        $("#elPresentacion").attr('onClick', `modalEliminarPresentacion(${data.PresentacionId})`);
    });
    $("#presentacion").addClass("active");
    $("#presentacionMenu").addClass("active");
    cargarActivos();
    cargarProductos();
});