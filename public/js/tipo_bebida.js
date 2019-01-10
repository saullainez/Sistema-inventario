function cargarTipoBebida(){
    $.ajax({
        url: `/obtenertipobebida`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaTipoBebida").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#tablaTipoBebida").append(`
                <tr>
                    <td>${res[i].TipoBebidaId}</td>
                    <td>${res[i].nombre}</td>
                    <td><a onclick="modalEditarTipoBebida(${res[i].TipoBebidaId}, '${res[i].nombre}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarTipoBebida(${res[i].TipoBebidaId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function crearTipoBebida() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        nombre: $("#nombre").val()
    };
    $.ajax({
        url: `/tipo-bebida`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarTipoBebida();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#tb").addClass("active");
    $("#tbMenu").addClass("active");
    cargarTipoBebida();
});