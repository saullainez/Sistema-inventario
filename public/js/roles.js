function modalEditarRol(id, nombre, slug, desc, especial){
    if(especial == "null"){
        especial = " ";
    }
    
    $("#nuevoNombre").val(nombre);
    $("#nuevoSlug").val(slug);
    $("#nuevaDescripcion").val(desc);
    $("#nuevoEspecial").val(especial);
    $("#actualizarRol").attr('onClick', `actualizarRol(${id})`);
    $("#editarRolModal").modal();
};
function modalEliminarRol(id){
    $("#borrarRol").attr('onClick', `eliminarRol(${id})`);
    $("#eliminarRolModal").modal();
};

function agregarPermiso(id){
    var permisos = [];
    $("input[type=checkbox]:checked").each(function(){
        permisos.push(this.value);
    });
    var tokenAP = $("#tokenAP").val();
    var data = {
        id: id,
        permissions: permisos
    };
    $.ajax({
        url: `/agregarpermiso`,
        headers: {'X-CSRF-TOKEN': tokenAP},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            exitoso(res);
        },
        error: function (error) {
            problema(error);
        }
    });
}

function cargarPermisos(){
    $.ajax({
        url: `/obtenerpermisos`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            $("#listaPermisos").html(" ");
            for (var i = 0; i < res.length; i++) {
                $("#listaPermisos").append(`
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input input-AP" id="${res[i].id}" value="${res[i].id}" name="${res[i].slug}">
                        <label class="custom-control-label" for="${res[i].id}">${res[i].name}</label>
                    </div>`);
            }

        },
        error: function (error) {
            console.error(error);
        }
    });
};

function cargarPermisosDeRol(id){
    var data = {
        id: id
    };
    $.ajax({
        url: `/obtenerpermisorol`,
        method: "GET",
        data: data,
        dataType: "json",
        success: function (res) {
            $("#verPermisos").html(" ");
            for (var i = 0; i < res.length; i++) {

                $("#verPermisos").append(`
                    <h4>${res[i]}</h4>`);
            };
            $("#verPermisoRolModal").modal();
        },
        error: function (error) {
            console.error(error);
        }
    });
};
function llenarPermisosDeRol(id){
    limpiar();
    var permisos = [];
    var data = {
        id: id
    };
    $.ajax({
        url: `/obtenerpermisorol`,
        method: "GET",
        data: data,
        dataType: "json",
        success: function (res) {
            for (var i = 0; i < res.length; i++) {
                permisos.push(res[i]);
                /*permisos.push(res[i]);
                alert(permisos[i]);*/
            };
            $(`input[type=checkbox]`).each(function(index){
                for (var i = 0; i < permisos.length; i++){
                    if(this.name == permisos[i]){
                        $(`input:checkbox[name="${permisos[i]}"]`).attr('checked', 'true');
                        //$(`input[type=checkbox name="${permisos[index]}"]`).attr('checked', 'true');
                        //$("input[type=checkbox]").attr('checked', 'true');
                    }
                }
                


                    
                //$("input[type=checkbox]").attr('checked', 'true');
            });
            $("#agregarPermisoRolModal").modal();
            $("#agregarPermiso").attr('onClick', `agregarPermiso(${id})`);
        },
        error: function (error) {
            console.error(error);
        }
    });
};

function crearRol() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        name: $("#nombre").val(),
        slug: $("#slug").val(),
        description: $("#descripcion").val(),
        special: $("#especial").val()
    };
    $.ajax({
        url: `/roles`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            exitoso(res);
        },
        error: function (error) {
            problema(error);
        }
    });
};

function actualizarRol(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        id: id,
        name: $("#nuevoNombre").val(),
        slug: $("#nuevoSlug").val(),
        description: $("#nuevaDescripcion").val(),
        special: $("#nuevoEspecial").val()
    };
    $.ajax({
        url: `/actualizarrol`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            exitoso(res);
        },
        error: function (error) {
            problema(error);
        }
    });
};

function eliminarRol(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarrol`,
        headers: {'X-CSRF-TOKEN': tokenEliminar},
        method: "DELETE",
        data: data,
        dataType: "json",
        success: function(res){
            exitoso(res);
        },
        error: function(error){
            problema(error);
        }
    });
};

function reload() {
    $('#tablaRoles').DataTable().ajax.reload();
    $("#actRol").attr("disabled", "true");
    $("#elRol").attr("disabled", "true");
    $("#VerPermisoRol").attr("disabled", "true");
    $("#AgregarPermisoRol").attr("disabled", "true");
    $("#actRolM").attr("disabled", "true");
    $("#elRolM").attr("disabled", "true");
    $("#VerPermisoRolM").attr("disabled", "true");
    $("#AgregarPermisoRolM").attr("disabled", "true");
}
function limpiar(){
    $('.form-control').val(' ');
    $('.form-control').val($('.form-control').val().replace(' ', ''));
    $(`input:checkbox`).each(function(){
        if($(this).is(':checked')){
            $(this).attr('checked', false);
        }
    });
}
function exitoso (res){
    $("#alert").removeClass("alert-danger");
    $("#alert").addClass("alert-success");
    $("#alert").show().fadeOut(3000);
    $("#mensaje").html(res.mensaje);
    reload();
    limpiar();
}
function problema (error){
    $("#alert").removeClass("alert-success");
    $("#alert").addClass("alert-danger");
    $("#alert").show().fadeOut(5000);
    $("#mensaje").html(error.responseJSON.mensaje);
    limpiar();
}


$(document).ready(function () {
    $('.input-crear').on('keyup', function(){
        if($('#nombre').val().length == 0 || $('#slug').val().length == 0 || $('#descripcion').val().length == 0){
            $("#btn-crear").attr("disabled", "true");
        }else{
            $("#btn-crear").removeAttr("disabled");
        }
    });
    $('.input-editar').on('keyup', function(){
        if($('#nuevoNombre').val().length == 0 || $('#nuevoSlug').val().length == 0 || $('#nuevaDescripcion').val().length == 0){
            $("#actualizarRol").attr("disabled", "true");
        }else{
            $("#actualizarRol").removeAttr("disabled");
        }
    });
    $('#listaPermisos').on( 'click', '.input-AP', function () {
        if($( "input:checked" ).length == 0){
            $("#agregarPermiso").attr("disabled", "true");
        }
        else{
            $("#agregarPermiso").removeAttr("disabled");
        }
    });
    $('#tablaRoles').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenerroles",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "slug" },
            { "data": "description" },
            { "data": "special" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    var tabla = $('#tablaRoles').dataTable().api();
    
    $('#tablaRoles').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actRol").attr("disabled", "true");
            $("#elRol").attr("disabled", "true");
            $("#VerPermisoRol").attr("disabled", "true");
            $("#AgregarPermisoRol").attr("disabled", "true");
            $("#actRolM").attr("disabled", "true");
            $("#elRolM").attr("disabled", "true");
            $("#VerPermisoRolM").attr("disabled", "true");
            $("#AgregarPermisoRolM").attr("disabled", "true");
        }
        else{
            $("#actRol").removeAttr("disabled");
            $("#elRol").removeAttr("disabled");
            $("#VerPermisoRol").removeAttr("disabled");
            $("#AgregarPermisoRol").removeAttr("disabled");
            $("#actRolM").removeAttr("disabled");
            $("#elRolM").removeAttr("disabled");
            $("#VerPermisoRolM").removeAttr("disabled");
            $("#AgregarPermisoRolM").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actRol").attr('onClick', `modalEditarRol(${data.id}, '${data.name}', '${data.slug}', '${data.description}', '${data.special}')`);
        $("#elRol").attr('onClick', `modalEliminarRol(${data.id})`);
        $("#VerPermisoRol").attr('onClick', `cargarPermisosDeRol(${data.id})`);
        $("#AgregarPermisoRol").attr('onClick', `llenarPermisosDeRol(${data.id})`);
        $("#actRolM").attr('onClick', `modalEditarRol(${data.id}, '${data.name}', '${data.slug}', '${data.description}', '${data.special}')`);
        $("#elRolM").attr('onClick', `modalEliminarRol(${data.id})`);
        $("#VerPermisoRolM").attr('onClick', `cargarPermisosDeRol(${data.id})`);
        $("#AgregarPermisoRolM").attr('onClick', `llenarPermisosDeRol(${data.id})`);
    });
    $("#roles").addClass("active");
    $("#rolesMenu").addClass("active");
    cargarPermisos();
})