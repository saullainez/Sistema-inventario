<div class="modal fade" id="agregarPermisoRolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar permiso a rol</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-plus-circle fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <h3>Lista de permisos</h3>
                        <hr>
                        <div id="listaPermisos" class="control-group">

                        </div>

                        <input type="hidden" name="_tokenAP" value="{{ csrf_token() }}" id="tokenAP">

                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="agregarPermiso">Guardar</button>
            </div>
        </div>
    </div>
</div>