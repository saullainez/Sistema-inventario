function modalEditarPermiso(id, nombre, slug, desc){
    $("#nuevoNombre").val(nombre);
    $("#nuevoSlug").val(slug);
    $("#nuevaDescripcion").val(desc);
    $("#actualizarPermiso").attr('onClick', `actualizarPermiso(${id})`);
    $("#editarPermisoModal").modal();
};
function modalEliminarPermiso(id){
    $("#borrarPermiso").attr('onClick', `eliminarPermiso(${id})`);
    $("#eliminarPermisoModal").modal();
};

function crearPermiso() {
    var tokenAgregar = $("#tokenAgregar").val();
    var data = {
        name: $("#nombre").val(),
        slug: $("#slug").val(),
        description: $("#descripcion").val()
    };
    $.ajax({
        url: `/permisos`,
        headers: {'X-CSRF-TOKEN': tokenAgregar},
        method: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
};

function actualizarPermiso(id) {
    var tokenEditar = $("#tokenEditar").val();
    var data = {
        id: id,
        name: $("#nuevoNombre").val(),
        slug: $("#nuevoSlug").val(),
        description: $("#nuevaDescripcion").val()
    };
    $.ajax({
        url: `/actualizarpermiso`,
        headers: {'X-CSRF-TOKEN': tokenEditar},
        method: "PUT",
        data: data,
        dataType: "json",
        success: function (res) {
            console.log(res);
            $("#alert").show().fadeOut(3000);
            $("#mensaje").html(res.mensaje);
            reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
};

function eliminarPermiso(id){
    var tokenEliminar = $("#tokenEliminar").val();
    var data = {
        id: id
    };
    $.ajax({
        url: `/eliminarpermiso`,
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
    $('#tablaPermisos').DataTable().ajax.reload();
    $("#actPermiso").attr("disabled", "true");
    $("#elPermiso").attr("disabled", "true");

}

$(document).ready(function () {
    $('#tablaPermisos').DataTable({
        responsive: true,
        select: {
            style: 'single'
        },
        "ajax": {
            "url": "/obtenerpermisos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "slug" },
            { "data": "description" }
        ],
        "language": {
            "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    var tabla = $('#tablaPermisos').dataTable().api();
    
    $('#tablaPermisos').on( 'click', 'tbody tr', function () {
        if (tabla.row(this, { selected: true }).any()){
            $("#actPermiso").attr("disabled", "true");
            $("#elPermiso").attr("disabled", "true");
        }
        else{
            $("#actPermiso").removeAttr("disabled");
            $("#elPermiso").removeAttr("disabled");
        }
        data = tabla.row(this).data();
        $("#actPermiso").attr('onClick', `modalEditarPermiso(${data.id}, '${data.name}', '${data.slug}', '${data.description}')`);
        $("#elPermiso").attr('onClick', `modalEliminarPermiso(${data.id})`);
    });
    $('.dataTables_length').addClass('bs-select');
    $("#permisos").addClass("active");
    $("#permisosMenu").addClass("active");
});