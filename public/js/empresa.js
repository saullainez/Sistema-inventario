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
function modalEliminarEmpresa(id){
    $("#borrarEmpresa").attr('onClick', `eliminarEmpresa(${id})`);
    $("#eliminarEmpresaModal").modal();
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
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function eliminarEmpresa(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        EmpresaId: id
    };
    $.ajax({
        url: `/eliminarempresa`,
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
    $('#tablaEmpresa').DataTable().ajax.reload();
    $("#actEmpresa").attr("disabled", "true");
    $("#elEmpresa").attr("disabled", "true");
    $("#verContacto").attr("disabled", "true");
}
function limpiar(){
    $('.form-control').val(' ');
    $('.form-control').val($('.form-control').val().replace(' ', ''));
}
$(document).ready(function () {
    $('#tablaEmpresa').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenerempresas",
            "dataSrc": ""
        },
        "columns": [
            { "data": "EmpresaId" },
            { "data": "EmpresaNombre" },
            { "data": "EmpresaDireccion" },
            { "data": "EmpresaTelefono" },
            { "data": "EmpresaCorreo" },
            { "data": "FechaPago" },
            { "data": "Tipo" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $('.dataTables_length').addClass('bs-select');
    var tabla = $('#tablaEmpresa').dataTable().api();
    
    $('#tablaEmpresa').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actEmpresa").attr("disabled", "true");
            $("#elEmpresa").attr("disabled", "true");
            $("#verContacto").attr("disabled", "true");
        }
        else{
            $("#actEmpresa").removeAttr("disabled");
            $("#elEmpresa").removeAttr("disabled");
            $("#verContacto").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actEmpresa").attr('onClick', `modalEditarEmpresa(${data.EmpresaId}, '${data.EmpresaNombre}', '${data.EmpresaDireccion}', '${data.EmpresaTelefono}', '${data.EmpresaCorreo}', '${data.Contacto}', '${data.ContactoTelefono}', '${data.ContactoCorreo}', '${data.FechaPago}', '${data.Tipo}')`);
        $("#elEmpresa").attr('onClick', `modalEliminarEmpresa(${data.EmpresaId})`);
        $("#verContacto").attr('onClick', `modalContacto(${data.EmpresaId}, '${data.Contacto}', '${data.ContactoTelefono}', '${data.ContactoCorreo}')`);
    });
    $("#empresa").addClass("active");
    $("#empresaMenu").addClass("active");
});