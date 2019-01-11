function modalContacto(EmpresaId, Contacto, ContactoTelefono, ContactoCorreo){
    $("#contacto").val(Contacto);
    $("#telefono").val(ContactoTelefono);
    $("#correo").val(ContactoCorreo);
    $("#editarContacto").attr('onClick', `actualizarContacto(${EmpresaId})`);
    $("#contactoModal").modal();
}
function cargarEmpresas(){
    $.ajax({
        url: `/obtenerempresas`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaEmpresa").html(" ");
            /*for (var i = 0; i < res.length; i++) {
                $("#tablaEmpresa").append(`
                <tr>
                    <td>${res[i].EmpresaId, 
                    <td>${res[i].EmpresaNombre}</td>
                    <td>${res[i].EmpresaDireccion}</td>
                    <td>${res[i].EmpresaTelefono}</td>
                    <td>${res[i].EmpresaCorreo}</td>
                    <td>${res[i].Contacto}</td>
                    <td>${res[i].ContactoTelefono}</td>
                    <td>${res[i].ContactoCorreo}</td>
                    <td>${res[i].FechaPago}</td>
                    <td>${res[i].Tipo}</td>
                    <td><a onclick="modalEditarEmpresa(${res[i].EmpresaId}, '${res[i].EmpresaNombre}', '${res[i].EmpresaDireccion}', '${res[i].EmpresaTelefono}', '${res[i].EmpresaCorreo}', '${res[i].Contacto}', '${res[i].ContactoTelefono}', '${res[i].ContactoCorreo}', '${res[i].FechaPago}', '${res[i].Tipo}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a onclick="modalEliminarEmpresa(${res[i].EmpresaId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }*/
            for (var i = 0; i < res.length; i++) {
                $("#tablaEmpresa").append(`
                <tr>
                    <td>${res[i].EmpresaId}</td>
                    <td>${res[i].EmpresaNombre}</td>
                    <td>${res[i].EmpresaDireccion}</td>
                    <td>${res[i].EmpresaTelefono}</td>
                    <td>${res[i].EmpresaCorreo}</td>
                    <td>${res[i].FechaPago}</td>
                    <td>${res[i].Tipo}</td>
                    <td><a style="width: 6.499rem;" onclick="modalContacto(${res[i].EmpresaId}, '${res[i].Contacto}', '${res[i].ContactoTelefono}', '${res[i].ContactoCorreo}');" class="btn btn-sm btn-default">Contacto</a></td>
                    <td><a style="width: 5.317rem;" onclick="modalEditarEmpresa(${res[i].EmpresaId}, '${res[i].EmpresaNombre}', '${res[i].EmpresaDireccion}', '${res[i].EmpresaTelefono}', '${res[i].EmpresaCorreo}', '${res[i].Contacto}', '${res[i].ContactoTelefono}', '${res[i].ContactoCorreo}', '${res[i].FechaPago}', '${res[i].Tipo}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td><a style="width: 6.086rem;" onclick="modalEliminarEmpresa(${res[i].EmpresaId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
$(document).ready(function () {
    $("#empresa").addClass("active");
    $("#empresaMenu").addClass("active");
    cargarEmpresas();
});