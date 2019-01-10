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
$(document).ready(function () {
    $("#tb").addClass("active");
    $("#tbMenu").addClass("active");
    cargarTipoBebida();
});