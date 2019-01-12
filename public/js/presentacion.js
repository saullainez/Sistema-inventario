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
$(document).ready(function () {
    $("#presentacion").addClass("active");
    $("#presentacionMenu").addClass("active");
    cargarPresentaciones();
    //cargarTipoBebida();
});