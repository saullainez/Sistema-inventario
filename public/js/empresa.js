function modalContacto(EmpresaId, Contacto, ContactoTelefono, ContactoCorreo){
    $("#contacto").val(Contacto);
    $("#Contactotelefono").val(ContactoTelefono);
    $("#Contactocorreo").val(ContactoCorreo);
    $("#editarContacto").attr('onClick', `actualizarContacto(${EmpresaId})`);
    $("#contactoModal").modal();
};
function modalEditarEmpresa(EmpresaId, EmpresaNombre, EmpresaDireccion, EmpresaTelefono, EmpresaCorreo, Contacto, ContactoTelefono, ContactoCorreo, FechaPago, Tipo){
    $("#nuevoNombre").val(EmpresaNombre);
    $("#nuevaDireccion").val(EmpresaDireccion);
    $("#nuevoTelefono").val(EmpresaTelefono);
    $("#nuevoCorreo").val(EmpresaCorreo);
    $("#nuevaFechaPago").val(FechaPago);
    $("#nuevoTipo").val(Tipo);
    $("#nuevoNombreContacto").val(Contacto);
    $("#nuevoTelefonoContacto").val(ContactoTelefono);
    $("#nuevoCorreoContacto").val(ContactoCorreo);
    $("#actualizarEmpresa").attr('onClick', `actualizarEmpresa(${EmpresaId})`);
    $("#editarEmpresaModal").modal();
    
};
function cargarEmpresas(){
    $.ajax({
        url: `/obtenerempresas`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#tablaEmpresa").html(" ");
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
                    <td style="padding-right: -1rem;"><a style="width: 6.499rem;" onclick="modalContacto(${res[i].EmpresaId}, '${res[i].Contacto}', '${res[i].ContactoTelefono}', '${res[i].ContactoCorreo}');" class="btn btn-sm btn-default">Contacto</a></td>
                    <td style="padding-left: 0rem;"><a style="width: 5.317rem;" onclick="modalEditarEmpresa(${res[i].EmpresaId}, '${res[i].EmpresaNombre}', '${res[i].EmpresaDireccion}', '${res[i].EmpresaTelefono}', '${res[i].EmpresaCorreo}', '${res[i].Contacto}', '${res[i].ContactoTelefono}', '${res[i].ContactoCorreo}', '${res[i].FechaPago}', '${res[i].Tipo}');" class="btn btn-sm btn-default">Editar</a></td>
                    <td style="padding-left: 0rem;"><a style="width: 6.086rem;" onclick="modalEliminarEmpresa(${res[i].EmpresaId});" class="btn btn-sm btn-danger">Eliminar</a></td>
                </tr>`);
            }
            
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function crearEmpresa() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        EmpresaNombre: $("#nombre").val(),
        EmpresaDireccion: $("#direccion").val(),
        EmpresaTelefono: $("#telefono").val(),
        EmpresaCorreo: $("#correo").val(),
        Contacto: $("#nombreContacto").val(),
        ContactoTelefono: $("#telefonoContacto").val(),
        ContactoCorreo: $("#correoContacto").val(),
        FechaPago: $("#fechapago").val(),
        Tipo: $("#tipo").val()
    };
    $.ajax({
        url: `/empresa`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarEmpresas();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function actualizarEmpresa(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        EmpresaId: id,
        EmpresaNombre: $("#nuevoNombre").val(),
        EmpresaDireccion: $("#nuevaDireccion").val(),
        EmpresaTelefono: $("#nuevoTelefono").val(),
        EmpresaCorreo: $("#nuevoCorreo").val(),
        Contacto: $("#nuevoNombreContacto").val(),
        ContactoTelefono: $("#nuevoTelefonoContacto").val(),
        ContactoCorreo: $("#nuevoCorreoContacto").val(),
        FechaPago: $("#nuevaFechaPago").val(),
        Tipo: $("#nuevoTipo").val()
    };
    $.ajax({
        url: `/actualizarempresa`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            cargarEmpresas();
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