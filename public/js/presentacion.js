function cargarPresentaciones(){
    $.ajax({
        url: `/obtenerpresentaciones`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaPresentacion").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaPresentacion").append(`
                <tr>
                    <td>${res[i].PresentacionId}</td>
                    <td>${res[i].producto}</td>
                    <td>${res[i].envase}</td>
                    <td><a onclick="modalEditarPresentacion(${res[i].PresentacionId}, '${res[i].producto}', '${res[i].envase}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarPresentacion(${res[i].PresentacionId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function cargarActivos(){
    $.ajax({
        url: `/obteneractivos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#envase").html(" ");
            //$("#nuevoEnvase").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#envase").append(`
                <option value="${res[i].ActivoId}"><td>${res[i].ActivoNombre}</td></option>`);
                /*$("#nuevoEnvase").append(`
                <option value="${res[i].ActivoId}"><td>${res[i].Activonombre}</td></option>`);*/
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
            //$("#nuevoProducto").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#productoP").append(`
                <option value="${res[i].ProductoId}"><td>${res[i].ProductoNombre}</td></option>);`);
                /*$("#nuevoProducto").append(`
                <option value="${res[i].ProductoId}"><td>${res[i].Productonombre}</td></option>);`);*/
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
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            console.log(res);
            cargarPresentaciones();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#presentacion").addClass("active");
    $("#presentacionMenu").addClass("active");
    cargarPresentaciones();
    cargarActivos();
    cargarProductos();
});